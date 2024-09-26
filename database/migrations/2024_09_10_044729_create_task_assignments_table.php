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
        Schema::create('task_assignments', function (Blueprint $table) {
            $table->id('task_worker_id');
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('worker_id');
            $table->foreign('task_id')->references('task_id')->on('tasks')->onDelete('cascade');
            $table->foreign('worker_id')->references('member_id')->on('member_users')->onDelete('cascade');
            $table->string('worker_file')->nullable();
            $table->string('code')->nullable();
            $table->integer('status')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_assignments');
    }
};


