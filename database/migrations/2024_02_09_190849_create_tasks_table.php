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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id');
            $table->string('name',255);
            $table->longText('description');
            $table->string('status')->default('Pending');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('project_id', 'tasks_project_id_foreign')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign('tasks_project_id_foreign');
            $table->dropIfExists('tasks');
        });
    }
};
