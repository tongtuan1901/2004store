<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminOrder extends Model
{

    use HasFactory;

    use HasFactory,SoftDeletes;


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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
