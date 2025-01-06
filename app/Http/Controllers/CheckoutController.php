<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function placeOrder(Request $request)
    {
        if (Auth::check()) {
            $request->validate([
                'full_name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'mobile' => 'required|numeric|digits:10',
                'landmark' => 'nullable|string|max:255',
                'city' => 'required|string|max:255',
                'state' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'pincode' => 'required|string|max:255',
            ]);

            $cartItems = Cart::where('user_id', Auth::user()->id)->get();

            $user = User::find(Auth::user()->id);
            $totalAmount = $cartItems->sum('total_price');
            $shippingAddress = $request->landmark . ' ' . $request->city . ' ' . $request->state . ' ' . $request->pincode . ' ' . $request->country;
            $paymentMethod = '';
            $invoiceNumber = 'INV-' . Str::upper(Str::random(8));  // Example: 'INV-4F6R8X2P'
            $trans_id = 'TRANS-' . Str::upper(Str::random(8));  // Example: 'INV-4F6R8X2P'

            $order = Order::create([
                'user_id' => auth()->id(),
                'cart_token' => ' ',
                'total_amount' => $totalAmount,
                'shipping_address' => $shippingAddress,
                'full_name' => $request->input('full_name'),
                'mobile' => $request->input('mobile'),
                'city' => $request->input('city'),
                'state' => $request->input('state'),
                'country' => $request->input('country'),
                'pincode' => $request->input('pincode'),
                'landmark' => $request->input('landmark'),
                'payment_method' => $paymentMethod,
                'payment_status' => 'pending',
                'order_status' => 'pending',
                'invoice_number' => $invoiceNumber,
                'transaction_number' => $trans_id,
            ]);
            $id_order = $order->id;
            foreach ($cartItems as $cartItem) {
                $prod_values = Product::find($cartItem->prod_id);

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->prod_id,
                    'product_name' => $prod_values->name,
                    'product_sku' => $prod_values->sku,
                    'product_color' => $prod_values->color,
                    'product_category_id' => $prod_values->category_id,
                    'product_subcategory_id' => $prod_values->subcategory_id,
                    'product_brand_id' => $prod_values->brand_id,
                    'product_model_id' => $prod_values->model_id,
                    'quantity' => $cartItem->prod_qty,
                    'price' => $cartItem->price,
                    'total_price' => $cartItem->total_price
                ]);

                $product = Product::find($cartItem->prod_id);

                if ($product) {
                    if ($product->quantity >= $cartItem->prod_qty) {
                        $product->decrement('quantity', $cartItem->prod_qty);
                    } else {
                        return back()->with(['message' => 'Not enough stock for product: ' . $product->name]);
                    }
                }
            }

            Cart::where('user_id', Auth::user()->id)->delete();

            $orderItems = OrderItem::where('order_id', $order->id)->get();
            return redirect()->route('invoice.slip', ['id' => $order->id])->with(['message' => 'Order placed successfully!', 'order_id' => $order->id]);
        } else {
            return redirect()->route('login')->with('need', 'Need to Login for checkout!');
        }
    }

    public function checkout()
    {
        if (Auth::check()) {
            // if ($token == 'null') {
            $carts = Cart::where('user_id', Auth::user()->id)->get();
            $carts = DB::table('carts')
                ->leftJoin('products', 'carts.prod_id', '=', 'products.id')
                ->select('carts.*', 'products.name as product_name')
                ->where('user_id', Auth::user()->id)->get();
            // } else {
            //     $carts = DB::table('carts')
            //         ->leftJoin('products', 'carts.prod_id', '=', 'products.id')
            //         ->select('carts.*', 'products.name as product_name')
            //         ->where('cart_token', $token)->get();
            // }
            $user = User::find(Auth::user()->id)->first();
        } else {
            return redirect()->route('login');
        }
        return view('spare-stream.checkout', compact('carts', 'user'));
    }

    public function orderHistory()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return view('spare-stream.order-history', compact('orders'));
    }

    public function invoiceSlip($id)
    {
        $order = Order::find($id);
        $orderItems = OrderItem::where('order_id', $id)->get();
        $user = User::find($order->user_id);
        $gstCalculator = env('GST_CALCULATOR');
        return view('spare-stream.invoice', [
            'order' => $order,
            'orderItems' => $orderItems,
            'user' => $user,
            'gstCalculator' => $gstCalculator,
        ]);
    }
}
