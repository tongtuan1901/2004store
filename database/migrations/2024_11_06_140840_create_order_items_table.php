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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id(); // Trường id tự động tăng
            $table->unsignedBigInteger('order_id'); // ID của đơn hàng
            $table->unsignedBigInteger('product_id'); // ID của sản phẩm
            $table->foreignId('variation_id')->constrained('product_variations')->onDelete('cascade'); // Biến thể
            $table->integer('quantity'); // Số lượng sản phẩm trong đơn hàng
            $table->decimal('original_price', 10, 2); // Giá gốc
            $table->decimal('price', 10, 2); // Giá 
            $table->decimal('discount', 10, 2)->default(0); // Giá trị giảm giá
            $table->decimal('final_price', 10, 2); // Giá cuối cùng sau giảm giá
            $table->string('product_name'); // Tên sản phẩm
            $table->string('variation_name')->nullable(); // Tên biến thể (size, màu sắc)
            $table->string('category_name')->nullable(); // Tên danh mục sản phẩm
            $table->string('brand_name')->nullable(); // Tên thương hiệu sản phẩm
            $table->string('image')->nullable(); // Hình ảnh sản phẩm
            $table->timestamps(); // Tạo trường created_at và updated_at

            // Add foreign key constraints
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            // Index for optimization
            $table->index('order_id');
            $table->index('product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
