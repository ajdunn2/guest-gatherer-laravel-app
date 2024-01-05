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
        Schema::table('events', function (Blueprint $table) {
            $table->string('location_title')->nullable();
            $table->string('google_calendar_link', 400)->nullable();
            $table->string('address')->nullable();
            $table->string('google_maps_hyperlink', 400)->nullable();
            $table->string('google_maps_embed_one', 400)->nullable();
            $table->string('google_maps_embed_two', 400)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('location_title');
            $table->dropColumn('google_calendar_link');
            $table->dropColumn('address');
            $table->dropColumn('google_maps_hyperlink');
            $table->dropColumn('google_maps_embed_one');
            $table->dropColumn('google_maps_embed_two');
        });
    }
};
