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
            $table->id('task_id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('client_link')->nullable();
            $table->string('client_file')->nullable();
            $table->string('worker_file')->nullable();
            $table->string('code')->nullable();
            $table->string('limit')->nullable();
            $table->string('expire_date_time')->nullable();
            $table->integer('status')->nullable()->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};


