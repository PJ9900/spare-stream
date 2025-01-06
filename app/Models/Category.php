<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'photo',
        'meta_keywords',
        'meta_description',
        'status',
        'is_feature',
        'serial',
        'show_menu',
        'menu_priority'
    ];

    // Specify the attributes that should be cast to native types
    protected $casts = [
        'status' => 'boolean',
        'is_feature' => 'boolean',
        'show_menu' => 'boolean'
    ];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'category_id');
    }
}