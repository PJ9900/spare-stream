<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'product_sku',
        'product_color',
        'product_category_id',
        'product_subcategory_id',
        'product_brand_id',
        'product_model_id',
        'quantity',
        'price',
        'total_price'
    ];

    // Relationship to Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}