<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mode extends Model
{
    use HasFactory;

    protected $table = 'modes';

    protected $primaryKey = 'id';

    protected $fillable = ['brand_id', 'name', 'status'];

    protected $attributes = [
        'status' => 1,
    ];
}
