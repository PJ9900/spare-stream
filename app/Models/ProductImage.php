<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $table = 'product_images';

    protected $primaryKey = 'id';

    public $timestamps = false;

    // Define the fillable fields to prevent mass-assignment vulnerability
    protected $fillable = [
        'product_id',
        'image',
        'alt_text',
        'is_primary',
        'created_at'
    ];

    // Define the relationship with the Product model
    // public function product()
    // {
    //     return $this->belongsTo(Product::class, 'product_id', 'product_id');
    // }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
