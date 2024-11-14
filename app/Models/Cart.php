<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id', 
        'product_id', 
        'user_id', 
        'quantity', 
        'size', 
        'color', 
        'image',
        'variation_id',
    ];

    /**
     * Mối quan hệ với model User.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Giả sử bạn có trường user_id trong bảng carts
    }
    public function variations()
    {
        return $this->hasMany(ProductVariation::class, 'product_id');
    }
    public function variation()
{
    return $this->belongsTo(ProductVariation::class, 'variation_id'); // Bạn cần thêm cột variation_id trong bảng carts
}
    public function product()
    {
        return $this->belongsTo(AdminProducts::class, 'product_id');
    }
    public function image()
    {
        return $this->belongsTo(ProductImage::class, 'image_id');
    }
    public function size()
{
    return $this->belongsTo(Size::class, 'size');
}

public function color()
{
    return $this->belongsTo(Color::class, 'color');
}
}
