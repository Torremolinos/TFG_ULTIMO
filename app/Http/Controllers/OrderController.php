<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;



class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('orders.index', compact('orders'));
    }

    public function store(Request $request)
    {
        $cart = json_decode($request->input('cart'), true);
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

        return redirect()->route('orders.show', $order->id);
    }

    public function show(Order $order)
    {
        $this->authorize('view', $order);
        return view('orders.show', compact('order'));
    }


}
