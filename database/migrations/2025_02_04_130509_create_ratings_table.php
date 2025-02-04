<?php

use App\Models\ServiceRequest;
use App\Models\User;
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
            $table->foreignIdFor(User::class)->comment('The user who is being rated')->constrained()->cascadeOnDelete()->comment('The user who is being rated');
            $table->foreignIdFor(User::class, 'rated_by')->comment('The user that did the rating')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(ServiceRequest::class)->constrained()->cascadeOnDelete();
            $table->integer('rating')->default(0);
            $table->text('review')->nullable();
            $table->timestamps();
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
