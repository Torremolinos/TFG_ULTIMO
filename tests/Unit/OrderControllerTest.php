<?php
namespace Tests\Unit;

use Tests\TestCase;
use Mockery;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_empty_cart()
    {
        $user = Mockery::mock(User::class);
        $user->shouldReceive('getAttribute')->with('id')->andReturn(1);
        
        $this->actingAs($user);

        $response = $this->postJson(route('orders.store'), ['cart' => []]);

        $response->assertStatus(400)
                 ->assertJson(['message' => 'El carrito está vacío']);
    }

    
    public function testStoreOrder()
    {
        // Manually create a user
        $user = User::create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => Hash::make('password'),
        ]);

        // Manually create a product
        $product = Product::create([
            'name' => 'Test Product',
            'description' => 'This is a test product',
            'price' => 100,
        ]);

        $cart = [
            [
                'id' => $product->id,
                'price' => $product->price,
                'quantity' => 2,
            ],
        ];

        $response = $this->actingAs($user)
                         ->postJson('/orders', ['cart' => $cart]);

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Pedido realizado con éxito']);
    }

    public function testStoreOrderFailure()
{
    // Manually create a user
    $user = User::create([
        'name' => 'Test User',
        'email' => 'testuser@example.com',
        'password' => Hash::make('password'),
    ]);

    $cart = [];

    $response = $this->actingAs($user)
                     ->postJson('/orders', ['cart' => $cart]);

    $response->assertStatus(400)
             ->assertJson(['message' => 'El carrito está vacío']);
}

    public function testIndexOrder()
    {
        // Manually create a user
        $user = User::create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => Hash::make('password'),
        ]);

        // Manually create an order for the user
        Order::create([
            'user_id' => $user->id,
            'total_price' => 200,
            'status' => 'pending',
        ]);

        $response = $this->actingAs($user)
                         ->get('/orders');

        $response->assertStatus(200)
                 ->assertViewHas('orders');
    }
    
    public function testGraciasOrder()
    {
        // Manually create a user
        $user = User::create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => Hash::make('password'),
        ]);

        // Manually create an order for the user
        $order = Order::create([
            'user_id' => $user->id,
            'total_price' => 200,
            'status' => 'pending',
        ]);

        $response = $this->actingAs($user)
                         ->get('/orders/gracias/' . $order->id);

        $response->assertStatus(200)
                 ->assertViewHas('order');
    }

    public function testGraciasOrderFailure()
{
    // Manually create a user
    $user = User::create([
        'name' => 'Test User',
        'email' => 'testuser@example.com',
        'password' => Hash::make('password'),
    ]);

    $response = $this->actingAs($user)
                     ->get('/orders/gracias/9999'); // 9999 is a non-existent order ID

    $response->assertStatus(404);
}
}
