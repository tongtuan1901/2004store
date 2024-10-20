<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryLog extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'quantity_change', 'note'];

    public function product()
    {
        return $this->belongsTo(AdminProducts::class, 'product_id');
    }
}