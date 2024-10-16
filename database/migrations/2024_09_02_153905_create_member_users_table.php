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
        Schema::create('member_users', function (Blueprint $table) {
            $table->id('member_id');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->integer('email_verified')->default(0);
            $table->string('verify_token')->nullable();
            $table->string('home_town')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('balance')->default(0)->nullable();
            $table->string('deposit_balance')->default(0)->nullable();
            $table->string('withdraws')->default(0)->nullable();
            $table->string('user_code')->nullable();
            $table->string('parent_user_code')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('member_id')->on('member_users');
            $table->string('pro_pic')->nullable();
            $table->string('nid_birth_status')->nullable();
            $table->string('nid_birth')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('task_charge')->nullable();
            $table->unsignedBigInteger('package_id')->nullable();
            $table->foreign('package_id')->references('package_id')->on('packages');
            $table->string('task_amount')->nullable();
            $table->unsignedBigInteger('role_id')->default(4);
            $table->foreign('role_id')->references('role_id')->on('roles');
            $table->unsignedBigInteger('approver_id')->nullable();
            $table->foreign('approver_id')->references('admin_id')->on('admin_users');
            $table->integer('is_client')->default(0);
            $table->integer('is_worker')->default(0);
            $table->decimal('daily_income', 8, 2)->default(0);  // Current daily income
            $table->date('income_reset_date')->nullable();       // The date when income was last updated
            $table->integer('status')->default(0);
            $table->text('comment')->nullable();
            $table->string('password');
            $table->string('expire_date')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_users');
    }
};


