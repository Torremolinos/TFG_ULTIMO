<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Pedidos; // Asegúrate de incluir el modelo Pedidos
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
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

        // Crear el número de pedido aleatorio
        $orderNumber = 'INV' . strtoupper(uniqid());

        // Guardar en la tabla Pedidos
        $pedido = Pedidos::create([
            'user_id' => Auth::id(),
            'order_number' => $orderNumber,
            'order_id' => $order->id
        ]);

        return response()->json(['id' => $order->id, 'message' => 'Pedido realizado con éxito']);
    }

    public function gracias($id)
    {
        $pedidos = Pedidos::findOrFail($id);
        return view('orders.gracias', compact('pedidos'));
    }

    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('orders.index', compact('orders'));
    }

    // public function show(Order $order)
    // {
    //     $this->authorize('view', $order);
    //     return view('orders.show', compact('order'));
    // }
}
