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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('payment')->nullable();
            $table->string('status')->default('pending');
            $table->string('quantity')->nullable();
            $table->string('total')->nullable();
            $table->string('action')->nullable();
            $table->unsignedBigInteger('userOrderId');
            $table->unsignedBigInteger('productOrderId');

            $table->foreign('userOrderId')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('productOrderId')->references('id')->on('products')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
