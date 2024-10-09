<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminProducts extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'price',
        'price_sale',
        'image',
        'gallery_images_one',
        'gallery_images_two',
        'gallery_images_three',
        'status',
        'quantity',
        'category_id'
    ];
}
