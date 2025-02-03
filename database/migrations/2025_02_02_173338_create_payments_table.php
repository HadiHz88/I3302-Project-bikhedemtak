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
         Schema::create('payments', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('service_offer_id');
        $table->decimal('amount', 10, 2);
        $table->enum('payment_method', ['credit_card', 'paypal', 'cash'])->default('credit_card');
        $table->enum('status', ['pending', 'completed', 'failed'])->default('pending');
        $table->timestamps();

        $table->foreign('service_offer_id')->references('id')->on('service_offers')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};