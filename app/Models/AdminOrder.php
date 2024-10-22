<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminOrder extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'total',
        'status'
    ];


    public function products()
    {
        return $this->belongsToMany(AdminProducts::class, 'order_product', 'order_id', 'product_id')->withPivot('quantity');
    }


}
