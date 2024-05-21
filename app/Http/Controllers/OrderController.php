<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index():View
    {
        $orders = Order::with('items')->get();
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order):View
    {
        return view('orders.show', compact('order'));
    }

    public function create():View
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $order = Order::create($request->all());
        return redirect()->route('orders.show', $order);
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        return redirect()->route('orders.show', $order);
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index');
    }
}
