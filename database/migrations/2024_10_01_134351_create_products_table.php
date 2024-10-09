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
            $table->string('name', 255);
            $table->text('description')->nullable(); // Trường mô tả có thể null
            $table->decimal('price', 10, 2); // Kiểu giá tiền
            $table->decimal('price_sale', 10, 2); // Kiểu giá tiền
            $table->string('image', 255)->nullable(); // Trường ảnh, có thể null
            $table->string('gallery_images_one', 255)->nullable(); // Trường ảnh, có thể null
            $table->string('gallery_images_two', 255)->nullable(); // Trường ảnh, có thể null
            $table->string('gallery_images_three', 255)->nullable(); // Trường ảnh, có thể null
            $table->integer('status')->default(0); // Tồn kho với giá trị mặc định là 0
            $table->integer('quantity'); // Tồn kho với giá trị mặc định là 0
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
};
