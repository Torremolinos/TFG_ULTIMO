<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Pedidos;
use Illuminate\Support\Facades\Auth;

/**
 * Clase OrderController
 * 
 * Controlador para gestionar órdenes.
 */
class OrderController extends Controller
{
    /**
     * Almacena una nueva orden.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $cart = $request->input('cart', []);

        if (empty($cart)) {
            return response()->json(['message' => 'El carrito está vacío'], 400);
        }

        $total_price = array_reduce($cart, function ($carry, $item) {
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

    /**
     * Muestra la página de agradecimiento para un pedido específico.
     * 
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function gracias($id)
    {
        $pedidos = Pedidos::findOrFail($id);
        return view('orders.gracias', compact('pedidos'));
    }

    /**
     * Muestra una lista de órdenes del usuario autenticado.
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('orders.index', compact('orders'));
    }

    public function myOrders()
    {
        $userId = Auth::id();
        $orders = Pedidos::where('user_id', $userId)->with(['order', 'orderItems.product'])->get();

        return view('orders.misOrdenes', compact('orders'));
    }

    public function storeContact(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:30',
        ]);
    
        // Guardar los datos en la base de datos
        $contacto = new Contacto();
        $contacto->nombre = $request->input('name');
        $contacto->telefono = $request->input('phone');
        $contacto->email = $request->input('email');
        $contacto->mensaje = $request->input('message');
        $contacto->save();
    
        // Redirigir con mensaje de éxito
        return redirect()->route('contacto')->with('success', 'Hemos recibido tu mensaje, pronto nos pondremos en contacto contigo. ¡Gracias!');
    }
}
