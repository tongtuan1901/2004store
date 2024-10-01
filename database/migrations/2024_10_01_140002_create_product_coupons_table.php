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
        Schema::create('product_coupons', function (Blueprint $table) {
            $table->id(); // Trường 'id' tự động tăng
            $table->unsignedBigInteger('product_id'); // ID của sản phẩm
            $table->unsignedBigInteger('coupon_id'); // ID của coupon

            // Thiết lập khóa ngoại
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_coupons');
    }
};
