<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function Order()
    {
        $orders = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->select(
                'orders.id as order_id',
                'orders.created_at',
                'orders.total_amount',
                'orders.payment_status',
                'orders.payment_method',
                'users.first_name as first_name',
                'users.last_name as last_name',
                'users.ship_address1 as customer_address',
                'users.email as email',
                'users.phone as phone',
                DB::raw('GROUP_CONCAT(products.name) as product_names'), // Concatenate all product names for each order
                DB::raw('GROUP_CONCAT(products.price) as product_price'), // Concatenate all product names for each order
                DB::raw('SUM(order_items.quantity) as total_quantity'), // Sum of quantities for each order
                DB::raw('SUM(order_items.quantity * order_items.price) as item_total') // Total value of items
            )
            ->groupBy(
                'orders.id',
                'orders.created_at',
                'orders.total_amount',
                'orders.payment_status',
                'orders.payment_method',
                'users.first_name',
                'users.last_name',
                'users.ship_address1',
                'users.email',
                'users.phone',
            )
            ->orderBy('orders.created_at', 'desc') // Order by the most recent orders
            ->get();


        return view('admin.order', compact('orders'));
    }
}
