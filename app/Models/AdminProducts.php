<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminProducts extends Model
{


    use HasFactory, SoftDeletes;


protected  $table = "products";

   


    protected $fillable = [
        'category_id',
        'brand_id',
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

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
    public function comments() 
    {
         return $this->hasMany(Comment::class, 'product_id');
     }

    // Relationship with AdminOrder
    // public function orders()
    // {
    //     return $this->belongsToMany(AdminOrder::class, 'order_product', 'product_id', 'order_id')->withPivot('quantity');
    // }

    // Relationship with AdminCoupons
    // public function coupons()
    // {
    //     return $this->hasMany(AdminCoupons::class);
    // }

    // Relationship with ProductVariation



    public function variations()
    {
        return $this->hasMany(ProductVariation::class, 'product_id');
    }


    // Override the table name if needed
    // public function getTable()

    // public function coupons()

    // {
    //     return $this->hasMany(AdminCoupons::class);
    // }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // public function firstImage()
    // {
    //     return $this->hasOne(ProductImage::class, 'product_id');
    // }

    public function coupons()
    {
        return $this->hasMany(AdminCoupons::class);
    }
    // public function brand()
    // {
    //     return $this->hasOne(Brand::class);
    // }
    // public function reviews()
    // {
    //     return $this->hasMany(Review::class);
    // }

//     public function getTable()
//     {
//         return 'products';
//     }

//     public function getTable()
// {
//     return 'products';
// }

public function firstImage()
{
    return $this->hasOne(ProductImage::class, 'product_id');
}
public function review()
{
    return $this->hasMany(Review::class);
}

}