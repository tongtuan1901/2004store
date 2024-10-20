<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminOrder extends Model
{
    use HasFactory;

    protected $table = 'orders';


    const STATUS_PENDING = 'Đang xử lí';
    const STATUS_APPROVED = 'Da duyet';
    const STATUS_SHIPPED = 'Đã giao hàng';
    const STATUS_DELIVERED = 'Đã giao thành công';
    const STATUS_CANCELED = 'Đã hủy';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'total',
        'status'
    ];


    public function getStatusLabelAttribute()
    {
        switch ($this->status) {
            case self::STATUS_PENDING:
                return 'Đang xử lí';
            case self::STATUS_APPROVED;
                return 'Đã duyệt';
            case self::STATUS_SHIPPED:
                return 'Đã giao hàng';
            case self::STATUS_DELIVERED:
                return 'Đã giao thành công';
            case self::STATUS_CANCELED:
                return 'Đã hủy';
            default:
                return 'Không rõ trạng thái';
        }
    }


    public function products()
    {
        return $this->belongsToMany(AdminProducts::class, 'order_product', 'order_id', 'product_id')->withPivot('quantity');
    }

}
