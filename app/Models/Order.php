<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cart_token',
        'total_amount',
        'full_name',
        'mobile',
        'city',
        'state',
        'country',
        'pincode',
        'landmark',
        'invoice_number',
        'transaction_number',
        'shipping_address',
        'billing_address',
        'payment_method',
        'payment_status',
        'order_status'
    ];

    // Relationship to OrderItems
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Relationship to User (if user is logged in)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function orderItems()
    // {
    //     return $this->hasMany(OrderItem::class);
    // }
}