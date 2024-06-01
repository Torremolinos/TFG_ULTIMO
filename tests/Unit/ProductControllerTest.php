<?php
namespace Tests\Unit;

use Tests\TestCase;
use Mockery;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductControllerTest extends TestCase{
    use RefreshDatabase;

    public function testIndexProductSuccess()
    {
        // Manually create a product
        Product::create([
            'name' => 'Test Product',
            'description' => 'This is a test product',
            'price' => 100,
        ]);
    
        $response = $this->get('/products');
    
        $response->assertStatus(200)
                 ->assertViewHas('products');
    }


    public function testIndexProductFailure()
{
    $response = $this->get('/products');

    $response->assertStatus(200)
             ->assertViewHas('products', function($products) {
                 return $products->isEmpty();
             });
}

// public function testAddToCartSuccess()
// {
//     // Manually create a product
//     $product = Product::create([
//         'name' => 'Test Product',
//         'description' => 'This is a test product',
//         'price' => 100,
//     ]);

//     $response = $this->postJson('/cart/add', ['id' => $product->id]);

//     $response->assertStatus(200)
//              ->assertJson([
//                  'message' => "{$product->name} ha sido agregado al carrito",
//                  'cart' => [
//                      $product->id => [
//                          'id' => $product->id,
//                          'name' => $product->name,
//                          'price' => $product->price,
//                          'quantity' => 1,
//                      ],
//                  ],
//              ]);
// }
public function testAddToCartFailure()
{
    $response = $this->postJson('/cart/add', ['id' => 9999]); // 9999 is a non-existent product ID

    $response->assertStatus(405); // 405 Method Not Allowed
}
}