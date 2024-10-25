<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class UserStaff extends Model implements AuthenticatableContract
{
    use HasFactory, SoftDeletes, Authenticatable;
    protected $table = 'users_staff';

    protected $fillable = ['name', 'email', 'password', 'role']; // Các thuộc tính có thể gán
}
