<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpareCategory extends Model
{
    use HasFactory;

    protected $table = 'spare_categories';

    protected $primaryKey = 'id';

    protected $fillable = [
        'brand_id',
        'model_id',
        'slug',
        'name',
        'photo',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }


    public function model()
    {
        return $this->belongsTo(Model::class, 'model_id');
    }
}