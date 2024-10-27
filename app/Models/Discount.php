<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'type', 'value', 'min_order_value', 'max_usage', 'usage_count', 'valid_from', 'valid_to'
    ];
    public function isValid()
    {
        return $this->valid_from <= now() && $this->valid_to >= now() && $this->usage_count < $this->max_usage;
    }
}
