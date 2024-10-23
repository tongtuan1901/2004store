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
        Schema::create('dashboard', function (Blueprint $table) {
            $table->id();
            $table->string('products_id');
            $table->integer('so_luong');
            $table->integer('tong_tien');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_product');
    }

};
