<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // Tên bảng
    protected $table = 'contacts';

    // Các trường có thể gán giá trị
    protected $fillable = [
        'user_id',   // ID người dùng (nếu cần)
        'name',      // Tên người gửi
        'phone',     // Số điện thoại
        'email',     // Email
        'message',   // Nội dung liên hệ
    ];

    /**
     * Quan hệ với User (nếu có liên kết với bảng users)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
