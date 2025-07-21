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
        Schema::table('comments', function (Blueprint $table) {
            // Xóa foreign key trước khi sửa
            $table->dropForeign(['user_id']); // Bắt buộc drop foreign key trước
             // Cho phép user_id là nullable
            $table->unsignedBigInteger('user_id')->nullable()->change();
             // Thêm lại foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // Thêm name và email cho người dùng không login
            $table->string('name')->nullable()->after('user_id');
            $table->string('email')->nullable()->after('name');
        });    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
         // Trở lại bắt buộc có user_id
        $table->unsignedBigInteger('user_id')->nullable(false)->change();
        // Xoá name và email
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
};
