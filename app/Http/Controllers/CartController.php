<?php

// app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        $cart = Session::get('cart', []);
        
        // Simulasikan data barang
        $product = [
            'id' => $id,
            'name' => 'Product Name',  // Fetch from database in real scenario
            'price' => 100,  // Fetch from database in real scenario
            'quantity' => 1
        ];

        // Check if product already in cart
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = $product;
        }

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Item added to cart');
    }

    public function show()
    {
        $cart = Session::get('cart', []);
        return view('cart.show', compact('cart'));
    }

    public function remove($id)
    {
        $cart = Session::get('cart', []);
        unset($cart[$id]);
        Session::put('cart', $cart);
        return redirect()->back()->with('success', 'Item removed from cart');
    }
}
