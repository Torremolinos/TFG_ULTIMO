<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function checkout(Request $request)
    {
        $cart = $request->input('cart');

        if (!$cart || count($cart) === 0) {
            return response()->json(['message' => 'Carrito vacío'], 400);
        }

        $order = new Order();
        $order->user_id = Auth::id();
        $order->total_price = array_reduce($cart, function ($sum, $item) {
            $product = \App\Models\Product::find($item['id']);
            return $sum + ($product->price * $item['quantity']);
        }, 0);
        $order->status = 'pending';
        $order->save();

        foreach ($cart as $item) {
            $product = \App\Models\Product::find($item['id']);
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item['id'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->unit_amount = $product->price;
            $orderItem->total_amount = $product->price * $item['quantity'];
            $orderItem->save();
        }

        return response()->json(['message' => 'Pedido realizado con éxito']);
    }
}
