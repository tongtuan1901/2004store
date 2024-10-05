<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id(); // Trường 'id' tự động tăng
            $table->string('code', 50); // Mã coupon
            $table->string('type', 50); // Loại coupon (ví dụ: percentage, fixed)
            $table->decimal('value', 10, 2); // Giá trị của coupon
            $table->timestamp('starts_at')->nullable(); // Thời gian bắt đầu
            $table->timestamp('expires_at')->nullable(); // Thời gian hết hạn
            $table->timestamps(); // Tạo các trường 'created_at' và 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
