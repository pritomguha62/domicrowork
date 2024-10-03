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
        Schema::create('packages', function (Blueprint $table) {
            $table->id('package_id');
            $table->string('title')->unique();
            $table->string('validity')->nullable();
            $table->string('price')->nullable();
            $table->string('limit')->nullable();
            $table->string('task_amount')->nullable();
            $table->text('file')->nullable();
            $table->string('total_sold')->nullable();
            $table->string('refer_commission_one')->nullable();
            $table->string('refer_commission_two')->nullable();
            $table->string('refer_commission_three')->nullable();
            $table->string('refer_commission_four')->nullable();
            $table->string('refer_commission_five')->nullable();
            $table->integer('status')->default(1);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};


