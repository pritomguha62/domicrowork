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
            $table->text('work_link')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->foreign('sub_category_id')->references('sub_category_id')->on('sub_categories')->onDelete('cascade');
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id')->references('member_id')->on('member_users')->onDelete('cascade');
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('admin_id')->references('admin_id')->on('admin_users')->onDelete('cascade');
            $table->string('ss_thumbnail')->nullable();
            $table->text('required_proof')->nullable();
            $table->string('ss_number')->nullable();
            $table->string('task_price_rate')->nullable();
            $table->string('work_amount')->nullable();
            $table->string('price')->nullable();
            $table->integer('status')->default(0);
            $table->string('expire_date')->nullable();
            $table->unsignedBigInteger('approver_id')->nullable();
            $table->foreign('approver_id')->references('admin_id')->on('admin_users');
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


