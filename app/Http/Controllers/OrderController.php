<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = Product::find($request->input('id'));

        if (!$product) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['message' => 'Producto añadido al carrito']);
    }

    public function store(Request $request)
    {
     
        $cart = $request->input('cart', []);


        if (empty($cart)) {
            return response()->json(['message' => 'El carrito está vacío'], 400);
        }

        $total_price = array_reduce($cart, function($carry, $item) {
            return $carry + $item['price'] * $item['quantity'];
        }, 0);

        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $total_price,
            'status' => 'pending'
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'unit_amount' => $item['price'],
                'total_amount' => $item['price'] * $item['quantity']
            ]);
        }

        return response()->json(['id' => $order->id, 'message' => 'Pedido realizado con éxito']);
    }

    public function gracias($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.gracias', compact('order'));
    }
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $this->authorize('view', $order);
        return view('orders.show', compact('order'));
    }
}



