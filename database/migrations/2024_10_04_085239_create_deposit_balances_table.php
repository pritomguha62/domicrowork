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
        Schema::create('deposit_balances', function (Blueprint $table) {
            $table->id('deposit_id');
            $table->string('paid_from')->nullable();
            $table->string('trxid')->nullable();
            $table->string('deposit_balance')->nullable();
            $table->string('user_code')->nullable();
            $table->string('admin_payment_id')->unique()->nullable();
            $table->string('member_payment_id')->unique()->nullable();
            $table->string('payment_method')->nullable();
            $table->unsignedBigInteger('member_id')->nullable();
            $table->foreign('member_id')->references('member_id')->on('member_users');
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
        Schema::dropIfExists('deposit_balances');
    }
};


