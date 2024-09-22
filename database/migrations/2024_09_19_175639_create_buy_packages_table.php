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
        Schema::create('buy_packages', function (Blueprint $table) {
            $table->id('buy_package_id');
            $table->string('paid_from')->nullable();
            $table->string('trxid')->nullable();
            $table->string('user_code')->nullable();
            $table->unsignedBigInteger('member_id')->nullable();
            $table->foreign('member_id')->references('member_id')->on('member_users');
            $table->unsignedBigInteger('package_id')->nullable();
            $table->foreign('package_id')->references('package_id')->on('packages');
            $table->integer('status')->default(0);
            $table->unsignedBigInteger('approver_id')->nullable();
            $table->foreign('approver_id')->references('admin_id')->on('admin_users');
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
        Schema::dropIfExists('buy_packages');
    }
};

