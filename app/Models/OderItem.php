<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OderItem extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'quantity',
        'price',
        'variation_id',
        'image',
        'original_price',
        'discount',
        'final_price',
        'product_name',
        'variation_name',
        'category_name',
        'brand_name'
    ];

    public function product() {
        return $this->belongsTo(AdminProducts::class, 'product_id', 'id');
    }
    
    public function variation()
    {
        return $this->belongsTo(ProductVariation::class, 'variation_id', 'id');
    }

    public function image()
    {
        return $this->belongsTo(ProductImage::class, 'image_id');
    }
    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }
}

