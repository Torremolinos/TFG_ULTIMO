<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class OrderListController extends Controller
{
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

    public function edit(OrderItem $orderItem)
    {
        return view('orderItems.edit', compact('orderItem'));
    }

    public function update(Request $request, OrderItem $orderItem)
    {
        $orderItem->update($request->all());
        return redirect()->route('orders.show', $orderItem->order_id);
    }

    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();
        return redirect()->route('orders.show', $orderItem->order_id);
    }

    public function thankYou(Order $order)
    {
        // Generar un número de factura aleatorio
        $receiptCode = mt_rand(100000, 999999);

        // Obtener los datos del pedido con los detalles de los productos
        $order = Order::with('orderItems.product')->find($order->id);

        // Cambiar el estado del pedido a 'complete'
        $order->status = 'complete';
        $order->save();

        return view('orders.gracias', compact('order', 'receiptCode'));
    }
}
