<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'user_id', 'rating', 'comment'];

    public function product()
    {
        return $this->belongsTo(AdminProducts::class,'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public static function hasUserReviewed($userId, $productId)
    {
        return self::where('user_id', $userId)
                   ->where('product_id', $productId)
                   ->exists();
    }
}