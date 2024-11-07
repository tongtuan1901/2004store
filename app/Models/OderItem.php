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
}

