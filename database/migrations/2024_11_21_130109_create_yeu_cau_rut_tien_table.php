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
        Schema::create('yeu_cau_rut_tien', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable();
            $table->decimal('amount', 15, 2)->nullable();
            $table->timestamp('transfer_time')->now();
            $table->boolean('is_approved')->default(0);
            $table->decimal('balance', 15)->default(0);
            $table->decimal('so_du', 15);
            $table->decimal('so_tien_rut', 15);
            $table->string('ngan_hang');
            $table->decimal('stk', 15);
            $table->string('request_type')->default('Rút tiền');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yeu_cau_rut_tien');
    }
};
