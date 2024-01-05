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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('title', 400);
            $table->text('description')->nullable();
            $table->string('location', 400)->nullable();
            $table->string('time')->nullable();
            $table->date('date')->nullable();
            $table->string('category', 400)->nullable();
            $table->json('tags')->nullable();
            $table->string('status', 400);
            $table->dateTime('default_response_deadline')->nullable();
            $table->dateTime('published')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
