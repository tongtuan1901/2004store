<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class AdminProducts extends Model
{
<<<<<<< HEAD
    use HasFactory, SoftDeletes;
=======
    use HasFactory, SoftDeletes; 
>>>>>>> 1fb31cf40c7ad28b5c10ac64dbf1adec6f15dc04

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
<<<<<<< HEAD

    ];


=======
        // Thêm các trường khác nếu cần
    ];

    // Quan hệ với Category
>>>>>>> 1fb31cf40c7ad28b5c10ac64dbf1adec6f15dc04
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

<<<<<<< HEAD

=======
    // Quan hệ với ProductImage
>>>>>>> 1fb31cf40c7ad28b5c10ac64dbf1adec6f15dc04
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
<<<<<<< HEAD

    public function orders()
    {
        return $this->belongsToMany(AdminOrder::class, 'order_product', 'product_id', 'order_id')->withPivot('quantity');
    }

    public function getTable()
    {
        return 'products';
    }
=======
    public function getTable()
{
    return 'products';
>>>>>>> 1fb31cf40c7ad28b5c10ac64dbf1adec6f15dc04
}
}

