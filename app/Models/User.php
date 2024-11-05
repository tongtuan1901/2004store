<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;  // Thêm dòng này

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;  // Thêm SoftDeletes ở đây

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'order_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function orders(){
        return $this->hasMany(AdminOrder::class);
    }
    public function carts()
{
    return $this->hasMany(Cart::class);
}
}
