<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankCard extends Model
{
    use HasFactory;
    protected $fillable = [
        'bank_name',             // Tên ngân hàng
        'account_holder_name',    // Tên chủ tài khoản
        'card_number',            // Số thẻ
        'image',                  // Đường dẫn ảnh thẻ
    ];
}
