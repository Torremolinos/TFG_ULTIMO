<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

/**
 * Clase ProductController
 * 
 * Controlador para gestionar productos.
 */
class ProductController extends Controller
{
    /**
     * Muestra una lista paginada de productos.
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $products = Product::paginate(3);
        return view('products.index', compact('products'));
    }

    /**
     * Muestra un producto específico.
     * 
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id) 
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    /**
     * Muestra la vista para crear un nuevo producto.
     * 
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Almacena un nuevo producto.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return redirect()->route('products.show', $product);
    }

    /**
     * Muestra la vista para editar un producto existente.
     * 
     * @param \App\Models\Product $product
     * @return \Illuminate\View\View
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Actualiza un producto existente.
     * 
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('products.show', $product);
    }

    /**
     * Elimina un producto.
     * 
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    /**
     * Agrega un producto al carrito.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addToCart(Request $request)
    {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:products,id',
        ]);

        $product = Product::findOrFail($request->id);

        // Create cart item array
        $cartItem = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1, // Default quantity to 1
        ];

        // Retrieve current cart from session or create a new one
        $cart = session()->get('cart', []);

        // Add item to cart
        $cart[$product->id] = $cartItem;

        // Store cart in session
        session()->put('cart', $cart);

        return response()->json([
            'message' => "{$product->name} ha sido agregado al carrito",
            'cart' => $cart,
        ]);
    }
}
