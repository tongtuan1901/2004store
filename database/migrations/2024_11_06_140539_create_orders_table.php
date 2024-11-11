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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Trường id tự động tăng
           
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('address_id'); // Thêm khóa ngoại cho address
            $table->string('name', 255); // Tên khách hàng
            $table->string('email', 255); // Email của khách hàng
            $table->string('phone', 255); // Số điện thoại khách hàng
            $table->text('address'); // Địa chỉ giao hàng
            $table->decimal('total', 10, 2); // Tổng số tiền đơn hàng
            $table->enum('status', ['Chờ xử lý', 'Đang xử lý', 'Đang giao hàng', 'Hoàn thành', 'Hủy']); // Trạng thái đơn hàng
            $table->string('name_client', 255);
            $table->string('phone_number');
            $table->string('street');
            $table->string('city');
            $table->string('state');
            $table->string('house_address');
            $table->string('payment_method');
            $table->timestamps(); // Tạo trường created_at và updated_at
            $table->softDeletes();
            $table->timestamp('pending_time')->nullable();
    $table->timestamp('processing_time')->nullable();
    $table->timestamp('shipping_time')->nullable();
    $table->timestamp('completed_time')->nullable();

          
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade'); // Khóa ngoại cho address
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

