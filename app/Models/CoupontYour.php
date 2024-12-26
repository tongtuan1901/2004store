<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoupontYour extends Model
{
    use HasFactory;
    protected $table = 'couponts_your';

    // Khai báo các trường có thể gán (mass assignable)
    protected $fillable = [
        'couponts_id',
        'product_id',
        'user_id',
    ];
    public function coupont()
    {
        return $this->belongsTo(Discount::class, 'couponts_id');
    }
}
