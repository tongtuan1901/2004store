<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminOrder extends Model
{
    use HasFactory;
<<<<<<< HEAD

=======
>>>>>>> 1fb31cf40c7ad28b5c10ac64dbf1adec6f15dc04
    protected $table = 'orders';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'total',
        'status'
    ];
<<<<<<< HEAD

    public function products()
    {
        return $this->belongsToMany(AdminProducts::class, 'order_product', 'order_id', 'product_id')->withPivot('quantity');
    }
=======
>>>>>>> 1fb31cf40c7ad28b5c10ac64dbf1adec6f15dc04
}
