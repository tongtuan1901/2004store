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
        Schema::table('product_images', function (Blueprint $table) {
            $table->unsignedBigInteger('variation_id')->nullable()->after('product_id');

            // Nếu bảng variations của bạn có sử dụng foreign key
            // $table->foreign('variation_id')->references('id')->on('product_variations')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('product_images', function (Blueprint $table) {
            $table->dropColumn('variation_id');

            // Nếu bảng variations của bạn có sử dụng foreign key
            // $table->dropForeign(['variation_id']);
        });
    }
};
