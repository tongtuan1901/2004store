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
        'status',
        'user_id',
        'phone_number',
        'street',
        'city',
        'state',
        'house_address',
        'name_client',
        'payment_method', 
        'discount_id',
        'discount_code',
        'discount_value',
        'cancellation_reason'
    ];


    public function products()
    {
        return $this->belongsToMany(AdminProducts::class, 'order_items', 'order_id', 'product_id')->withPivot('quantity');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OderItem::class, 'order_id', 'id');
    }
    public function image()
    {
        return $this->belongsTo(ProductImage::class, 'image_id');
    }
    public function discountCode(){
        return $this->belongsTo(Discount::class,'discount_id');
    }
    public function address()
{
    return $this->belongsTo(Address::class, 'user_id', 'user_id');
}

}
