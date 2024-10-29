<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'categories';
    protected $fillable = [
        'name',
        'image',
    ];
    public function coupons()
{
    return $this->hasMany(AdminCoupons::class);
}
public function products()
    {
        return $this->hasMany(AdminProducts::class);
    }
}
