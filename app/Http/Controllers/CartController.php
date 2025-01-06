<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // If the user is logged in
        if (Auth::check()) {
            $id = $request->input('product_id');
            $product = Product::findOrFail($id);
            $quantity = $request->input('quantity');
            $userId = Auth::id();
            $cart = Cart::where('user_id', $userId)
                ->where('prod_id', $id)
                ->first();

            if ($cart) {
                // If product already in cart, update quantity
                $cart->prod_qty += $quantity;
                $cart->total_price = $cart->prod_qty * $product->price;
                $cart->save();
            } else {
                // Add new product to cart
                Cart::create([
                    'user_id' => $userId,
                    'prod_id' => $id,
                    'prod_qty' => $quantity,
                    'price' => $product->price,
                    'total_price' => $quantity * $product->price,
                ]);
            }
        } else {
            return redirect()->route('login');
        }
        // else {
        //     // If the user is not logged in, use session/cart_token
        //     $cartToken = session('cart_token', Str::uuid()->toString());
        //     session(['cart_token' => $cartToken]);

        //     $cart = Cart::where('cart_token', $cartToken)
        //         ->where('prod_id', $id)
        //         ->first();

        //     if ($cart) {
        //         // If product already in cart, update quantity
        //         $cart->prod_qty += $quantity;
        //         $cart->total_price = $cart->prod_qty * $product->price;
        //         $cart->save();
        //     } else {
        //         // Add new product to cart
        //         Cart::create([
        //             'cart_token' => $cartToken,
        //             'prod_id' => $id,
        //             'prod_qty' => $quantity,
        //             'price' => $product->price,
        //             'total_price' => $quantity * $product->price,
        //         ]);
        //     }
        // }

        return redirect()->route('show.cart')->with('success', 'product added to cart successfully.');
    }

    public function showCart()
    {
        if (Auth::check()) {
            $carts = Cart::with('product.images')->where('user_id', Auth::user()->id)->get();
        }
        // $cartToken = session('cart_token');
        // if ($cartToken) {
        //     // $carts = Cart::with('product.images')->where('cart_token', session('cart_token'))->get();
        //     $carts = Cart::with('product.images')->where('user_id', Auth::user()->id)->get();
        // } else {
        //     $cartToken = 'null';
        //     $carts = Cart::with('product.images')->where('user_id', Auth::user()->id)->get();
        // }
        return view('spare-stream.cart', compact('carts'));
    }

    // public function clearCart($token)
    public function clearCart()
    {

        if (Auth::check()) {
            $deleted = Cart::where('user_id', Auth::user()->id)->delete();

            if ($deleted) {
                return redirect()->route('show.cart')->with('success', 'cart clear successfully');
            } else {
                return back()->with('fail', 'Something went wrong Please try again.');
            }
        } else {
            return redirect()->route('login');
        }
        // if ($token != 'null') {
        //     $deleted = Cart::where('cart_token', $token)->delete();
        // } else {
        //     $deleted = Cart::where('user_id', Auth::user()->id)->delete();
        // }


    }

    public function updateCart(Request $request)
    {
        $cart_item_id = $request->input('cart_item_id');
        $quantity = $request->input('quantity');
        $cart_price = $request->input('cart_price');

        $cartItem = Cart::find($cart_item_id);
        if ($cartItem) {
            $cartItem->prod_qty = $quantity;
            $cartItem->price = $cart_price;
            $cartItem->total_price = $quantity * $cart_price;
            $cartItem->save();
            return response()->json(['message' => 'Cart updated successfully!']);
        }

        return response()->json(['message' => 'Cart item not found.'], 404);
    }
}