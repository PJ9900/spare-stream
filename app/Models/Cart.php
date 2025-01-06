<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'carts';

    protected $fillable = [
        'user_id',
        'prod_id',
        'prod_qty',
        'price',
        'total_price',
        'cart_token'
    ];

    // Define relationships if necessary
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'prod_id');
    }

    // // Custom method to calculate total price
    // public function calculateTotalPrice()
    // {
    //     $this->total_price = $this->prod_qty * $this->price;
    //     $this->save();
    // }
}