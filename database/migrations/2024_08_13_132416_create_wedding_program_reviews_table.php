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
        Schema::create('wedding_program_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wedding_programs_id');
            $table->foreign('wedding_programs_id')->references('id')->on('wedding_programs')->onDelete('cascade');
            $table->string('name');
            $table->string('profile');
            $table->string('image_url');
            $table->text('description');
            $table->string('city');
            $table->string('rating');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wedding_program_reviews');
    }
};
