<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Subcategory extends Model
{
    use HasFactory;

    // Specify the table name if needed
    protected $table = 'subcategories';

    // Specify which attributes are mass assignable
    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'meta_keywords',
        'meta_description',
        'status',
        'serial',
        'show_menu',
        'menu_priority',
    ];

    // Specify the attributes that should be cast to native types
    protected $casts = [
        'status' => 'boolean',
        'show_menu' => 'boolean'
    ];

    // Define the relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class); // Subcategory has many products
    }
}
