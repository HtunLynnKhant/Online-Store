<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'category_id',
        'name',
        'image',
        'description',
        'price',
        'view_count'
    ];
    public function category()
    {
        return $this->belongsTo((Category::class));
    }
}
