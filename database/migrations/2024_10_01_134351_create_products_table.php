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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Trường id với kiểu bigint và tự động tăng
            $table->unsignedBigInteger('category_id'); // Trường category_id kiểu bigint

            $table->string('name', 255); // Tên sản phẩm
            $table->text('description')->nullable(); // Mô tả sản phẩm, có thể null
            $table->decimal('price', 10, 2); // Giá gốc sản phẩm
            $table->decimal('price_sale', 10, 2)->nullable(); // Giá giảm, có thể null
            $table->integer('status')->default(0); // Tình trạng hàng (0: tồn kho, 1: hết hàng)
            $table->integer('quantity')->default(0); // Số lượng hàng trong kho
            $table->string('sizes')->nullable(); // Lưu trữ các kích thước, có thể null
            $table->string('colors')->nullable(); // Lưu trữ các màu sắc, có thể null
            $table->softDeletes(); // Thêm tính năng xóa mềm

            $table->timestamps(); // Tạo trường created_at và updated_at

            // Thiết lập khóa ngoại cho category_id
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {


        Schema::dropIfExists('products'); // Xóa bảng products nếu nó tồn tại
    }
};


