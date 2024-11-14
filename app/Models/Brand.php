<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory, SoftDeletes;


    // protected $fillable = ['name', 'slug', 'description', 'logo', 'product_id'];
    // public function product()
    // {
    //     return $this->belongsTo(AdminProducts::class);
    // }
    protected $table = 'brands';

    protected $fillable = [
        'name',
        'image',
    ];

    public function products()
    {
        return $this->hasMany(AdminProducts::class);

    }
}
