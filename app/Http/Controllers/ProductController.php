<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function show($id) 
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return redirect()->route('products.show', $product);
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('products.show', $product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

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
