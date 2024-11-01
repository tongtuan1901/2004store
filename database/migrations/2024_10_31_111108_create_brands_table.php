<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id(); // Tạo cột id tự động tăng
            $table->string('name'); // Tạo cột name
            $table->string('image')->nullable(); // Tạo cột image (có thể null)
            $table->timestamps(); // Tạo cột created_at và updated_at
            $table->softDeletes(); // Tạo cột deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands'); // Xóa bảng brands nếu rollback
    }
};
