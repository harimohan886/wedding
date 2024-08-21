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
        Schema::create('wedding_program_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wedding_programs_id');
            $table->foreign('wedding_programs_id')->references('id')->on('wedding_programs')->onDelete('cascade');
            $table->string('video_url');
            $table->string('video');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wedding_program_videos');
    }
};
