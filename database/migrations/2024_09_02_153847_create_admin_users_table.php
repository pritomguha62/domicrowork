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
        Schema::create('admin_users', function (Blueprint $table) {
            $table->id('admin_id');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->integer('email_verified')->default(0);
            $table->string('verify_token')->nullable();
            $table->string('home_town')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('balance')->default(0)->nullable();
            $table->string('withdraws')->nullable()->default(0);
            $table->string('user_code')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('admin_id')->on('admin_users');
            $table->string('parent_user_code')->nullable();
            $table->string('pro_pic')->nullable();
            $table->string('nid_birth_status')->nullable();
            $table->string('nid_birth')->nullable();
            $table->string('birth_date')->nullable();
            $table->unsignedBigInteger('role_id')->default(3);
            $table->foreign('role_id')->references('role_id')->on('roles');
            $table->integer('status')->default(0);
            $table->unsignedBigInteger('approver_id')->nullable();
            $table->foreign('approver_id')->references('admin_id')->on('admin_users');
            $table->integer('is_admin')->default(0);
            $table->string('password');
            $table->text('comment')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_users');
    }
};


