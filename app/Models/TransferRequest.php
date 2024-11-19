<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'amount',
        'transfer_content',
        'transfer_time',
        'is_approved',
        'balance',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}

