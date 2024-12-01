<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParentIdToCommentsTable extends Migration
{
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            // Thêm cột parent_id để lưu trữ ID của bình luận cha
            $table->foreignId('parent_id')->nullable()->constrained('comments')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            // Xóa cột parent_id khi rollback migration
            $table->dropColumn('parent_id');
        });
    }
}
