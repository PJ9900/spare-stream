<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Specify which attributes are mass assignable
    protected $fillable = [
        'name',
        'slug',
        'sku',
        'brand',
        'price',
        'discounted_price',
        'quantity',
        'colours',
        'images',
        'video',
        'details',
        'warranty_policy',
        'category_id',
        'subcategory_id',
        'meta_keywords',
        'meta_description',
        'status',
    ];

    // Specify the attributes that should be cast to native types
    protected $casts = [
        'colours' => 'array',  // Assuming colours is stored as a JSON array
        'discounted_price' => 'decimal:2', // Ensures price is correctly stored
        'status' => 'boolean', // Ensures status is treated as a boolean
    ];

    // Define the relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class); // A product belongs to one category
    }

    // Define the relationship with Subcategory
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class); // A product belongs to one subcategory
    }

    public function productPhoto()
    {
        // Assuming you want to get the first image
        return $this->hasOne(ProductImage::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
