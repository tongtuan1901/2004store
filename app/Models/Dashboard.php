<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $table = 'dashboard';
    use HasFactory;
    protected $fillable = [
        'products_id',
        'so_luong',
        'tong_tien',];
}
