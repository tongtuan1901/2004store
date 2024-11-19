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
        Schema::create('carts', function (Blueprint $table) {
            $table->id(); // Trường id tự động tăng
            $table->string('session_id', 255)->nullable(); // ID của session
            $table->unsignedBigInteger('product_id'); // ID của sản phẩm
            $table->unsignedBigInteger('user_id'); // ID của người dùng (mới thêm)
            $table->unsignedBigInteger('variation_id')->nullable(); // ID của biến thể (mới thêm)
            $table->integer('quantity'); // Số lượng sản phẩm
            $table->timestamps(); // Tạo trường created_at và updated_at
            $table->string('size')->nullable(); // Kích thước
            $table->string('color')->nullable(); // Màu sắc
            $table->string('image')->nullable();
            // Khóa ngoại cho product_id, liên kết với bảng products
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            // Khóa ngoại cho user_id, liên kết với bảng users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // Khóa ngoại cho variation_id, liên kết với bảng product_variations
            $table->foreign('variation_id')->references('id')->on('product_variations')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
