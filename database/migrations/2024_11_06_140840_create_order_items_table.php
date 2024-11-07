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
            $table->integer('quantity'); // Số lượng sản phẩm trong đơn hàng
            $table->decimal('price', 10, 2); // Giá tiền của sản phẩm
            $table->string('image')->nullable();
            $table->timestamps(); // Tạo trường created_at và updated_at
            $table->foreignId('variation_id')->constrained('product_variations')->onDelete('cascade');
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
