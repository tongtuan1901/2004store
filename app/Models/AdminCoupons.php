<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminCoupons extends Model
{
    use HasFactory;
    protected $table = 'coupons';
    protected $fillable = [
        "code",
        "type",
        "value",
        "starts_at",
        "expires_at",
       
        
    ];
    protected $dates = ['starts_at', 'expires_at'];
}
