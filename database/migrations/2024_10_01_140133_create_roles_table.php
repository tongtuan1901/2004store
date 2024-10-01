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
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); // Trường 'id' tự động tăng
            $table->string('name'); // Tên vai trò (ví dụ: admin, user)
            $table->string('display_name'); // Tên hiển thị của vai trò (ví dụ: Admin, User, Manager)
            $table->timestamps(); // Tạo các trường 'created_at' và 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
