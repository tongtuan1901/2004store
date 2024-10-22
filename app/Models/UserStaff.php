<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract; // Thêm dòng này
use Illuminate\Auth\Authenticatable; // Thêm dòng này

class UserStaff extends Model implements AuthenticatableContract // Thay đổi dòng này
{
    use HasFactory, SoftDeletes, Authenticatable; // Thêm Authenticatable vào đây

    protected $table = 'users_staff';

    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'role'
    ];
}
