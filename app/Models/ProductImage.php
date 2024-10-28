<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    
    use HasFactory;
    protected $table = 'product_images';
    protected $fillable = [
        'product_id',
        'image_path',
    ];

    // Định nghĩa quan hệ với AdminProducts
    public function product()
    {
        return $this->belongsTo(AdminProducts::class, 'product_id');
    }
    public function firstImage()
    {
        return $this->hasOne(ProductImage::class, 'product_id')->oldest();
    }
}