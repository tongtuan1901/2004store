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
        'sizes',
        'colors',

        // Thêm các trường khác nếu cần
    ];

    // Quan hệ với Category

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


    // Quan hệ với ProductImage

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }



    public function orders()
    {
        return $this->belongsToMany(AdminOrder::class, 'order_product', 'product_id', 'order_id')->withPivot('quantity');
    }

    public function getTable()
    {
        return 'products';
    }


    // kết nối quản lí tồn kho
    public function inventoryLogs()
    {
        return $this->hasMany(InventoryLog::class, 'product_id');
    }

    //kết nối mã giảm giá
    public function coupons()
{
    return $this->hasMany(AdminCoupons::class);
}

}

