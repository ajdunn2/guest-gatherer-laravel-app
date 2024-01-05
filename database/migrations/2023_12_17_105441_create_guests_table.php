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
        Schema::disableForeignKeyConstraints();

        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invite_id')->constrained();
            $table->foreignId('guest_status_id')->constrained();
            $table->string('name', 400)->nullable();
            $table->string('email', 400)->nullable();
            $table->string('phone', 400)->nullable();
            $table->text('custom_reply')->nullable();
            $table->boolean('is_plus_one');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
