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
        Schema::create('banners', function (Blueprint $table) {
            $table->id(); // Trường id tự động tăng
            $table->string('title', 255);
            $table->text('content')->nullable(); // Trường content có thể null
            $table->string('image', 255)->nullable(); // Trường image có thể null
            $table->timestamps(); // Tạo trường created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
