<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;

    // Define the table name if it's different from the default 'product_colors'
    protected $table = 'product_colors';

    // Define the primary key if it's different from the default 'id'
    protected $primaryKey = 'id';

    // Disable timestamps if you don't have updated_at or created_at columns
    public $timestamps = false;

    // Define the fillable fields to prevent mass-assignment vulnerability
    protected $fillable = [
        'product_id',
        'color_name',
        'color_code',
        'created_at'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
