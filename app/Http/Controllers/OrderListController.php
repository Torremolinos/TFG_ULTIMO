<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderItem;
class OrderListController extends Controller
{
    public function index()
    {
        $orderItems = OrderItem::all();
        return view('orderItems.index', compact('orderItems'));
    }

    public function show(OrderItem $orderItem)
    {
        return view('orderItems.show', compact('orderItem'));
    }

    public function create()
    {
        return view('orderItems.create');
    }

    public function store(Request $request)
    {
        $orderItem = OrderItem::create($request->all());
        return redirect()->route('orderItems.show', $orderItem);
    }

    public function edit(OrderItem $orderItem)
    {
        return view('orderItems.edit', compact('orderItem'));
    }

    public function update(Request $request, OrderItem $orderItem)
    {
        $orderItem->update($request->all());
        return redirect()->route('orderItems.show', $orderItem);
    }

    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();
        return redirect()->route('orderItems.index');
    }
}
