<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminYeuCauRutTien extends Model
{
    use HasFactory;
    protected $table = 'yeu_cau_rut_tien';
    protected $fillable = [
        'customer_name', 'amount', 'transfer_time', 'is_approved', 'balance', 'so_du', 'so_tien_rut', 'ngan_hang', 'stk', 'request_type', 'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
