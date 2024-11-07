<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'size_id',
        'color_id',
        'price',
        'price_sale',
        'quantity',
        'status',
        'image_id', // Thêm image_id vào đây
        'variation_code',
    ];

    public function products()
    {
        return $this->belongsTo(AdminProducts::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function image()
    {
        return $this->belongsTo(ProductImage::class, 'image_id');
    }
    public function orderItems()
    {
        return $this->hasMany(OderItem::class, 'variation_id', 'id');
    }
}
