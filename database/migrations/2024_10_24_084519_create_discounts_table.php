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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->enum('type', ['fixed', 'percent']); // 'fixed' for fixed amount, 'percent' for percentage discount
            $table->decimal('value', 10, 2); // giá trị giảm giá
            $table->decimal('min_order_value', 10, 2)->nullable(); // giá trị đơn hàng tối thiểu để áp dụng mã
            $table->integer('max_usage')->nullable(); // số lần sử dụng tối đa
            $table->integer('usage_count')->default(0); // số lần mã giảm giá đã được sử dụng
            $table->date('valid_from'); // ngày bắt đầu hiệu lực
            $table->date('valid_to'); // ngày kết thúc hiệu lực
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
