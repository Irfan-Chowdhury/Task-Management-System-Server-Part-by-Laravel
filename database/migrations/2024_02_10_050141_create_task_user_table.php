<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('task_user', function (Blueprint $table) {
            $table->foreignId('task_id');
            $table->foreignId('user_id');

            $table->foreign('task_id', 'task_user_task_id_foreign')->references('id')->on('tasks')->onDelete('cascade');
            $table->foreign('user_id', 'task_user_user_id_foreign')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('task_user', function (Blueprint $table) {
            $table->dropForeign('task_user_task_id_foreign');
            $table->dropForeign('task_user_user_id_foreign');
            $table->dropIfExists('task_user');
        });
    }
};
