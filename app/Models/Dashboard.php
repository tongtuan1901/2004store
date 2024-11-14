<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $table = 'dashboard';
    use HasFactory;
    protected $fillable = [
        'id_dashboard', 'ngay_dat', 'doang_so', 'so_luong', 'so_dong_hang'];
}
