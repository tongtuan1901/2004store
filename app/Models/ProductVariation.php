<?php

namespace App\Models;

use Dompdf\Css\Color;
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
        'image',
        'variation_code',
    ];

    public function products()
    {
        return $this->belongsTo(AdminProducts::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }
}
