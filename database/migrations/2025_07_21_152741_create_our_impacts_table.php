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
        Schema::create('our_impacts', function (Blueprint $table) {
            $table->id();

            // Section title and background
            $table->string('title')->default('Our Impact');
            $table->string('background_image')->nullable();

            // Metrics (customize or add more as needed)
            $table->unsignedInteger('awards')->default(0);
            $table->unsignedInteger('happy_clients')->default(0);
            $table->unsignedInteger('therapy_sessions')->default(0);
            $table->unsignedInteger('trainers')->default(0);

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_impacts');
    }
};
