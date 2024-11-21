<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image_path',
        'alt_text',
        'order',
    ];

    public function product()
    {
        return $this->belongsTo(AdminProducts::class, 'product_id');
    }

    public function variations()
    {
        return $this->hasMany(ProductVariation::class, 'image_id');
    }
}
