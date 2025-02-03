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
        Schema::create('ratings', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id'); // Seeker
        $table->unsignedBigInteger('provider_id'); // Provider
        $table->unsignedBigInteger('service_request_id'); // Related request
        $table->integer('rating')->default(0);
        $table->text('review')->nullable();
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('provider_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('service_request_id')->references('id')->on('service_requests')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};