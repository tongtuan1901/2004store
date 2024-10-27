<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminProducts extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'price_sale',
        'status',
        'quantity',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Relationship with ProductImage
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    // Relationship with AdminOrder
    public function orders()
    {
        return $this->belongsToMany(AdminOrder::class, 'order_product', 'product_id', 'order_id')->withPivot('quantity');
    }

    // Relationship with AdminCoupons
    public function coupons()
    {
        return $this->hasMany(AdminCoupons::class);
    }

    // Relationship with ProductVariation
    public function variations()
    {
        return $this->hasMany(ProductVariation::class, 'product_id');
    }

    // Override the table name if needed
    public function getTable()
    {
        return 'products';
    }
}
