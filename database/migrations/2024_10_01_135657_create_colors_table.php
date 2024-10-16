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
        Schema::create('colors', function (Blueprint $table) {
            $table->id(); // Trường 'id' tự động tăng



            // Trường 'color' với độ dài tối đa 50 ký tự

            $table->string('color', 50); // Trường 'color' với độ dài tối đa 50 ký tự


            $table->timestamps(); // Tạo các trường 'created_at' và 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colors');
    }
};
