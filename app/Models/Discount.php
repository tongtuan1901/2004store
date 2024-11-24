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
    public function isValid($orderValue)
    {
        // Điều kiện hợp lệ: mã giảm giá trong thời gian hiệu lực và đáp ứng giá trị đơn hàng tối thiểu
        $isValidDate = $this->valid_from <= now() && $this->valid_to >= now();
        $isUnderUsageLimit = $this->usage_count < $this->max_usage;
        $isAboveMinOrderValue = $orderValue >= $this->min_order_value;
    
        // Trả về true nếu tất cả các điều kiện đều thỏa mãn
        return $isValidDate && $isUnderUsageLimit && $isAboveMinOrderValue;
    }
    
}
