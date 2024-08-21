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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['general']);
            $table->string('name');
            $table->string('email');
            $table->string('mobile_no');
            $table->string('venue')->nullable();
            $table->string('event_date')->nullable();
            $table->string('budget')->nullable();
            $table->string('guests')->nullable();
            $table->string('rooms')->nullable();
            $table->string('ratings')->nullable();
            $table->json('functions')->nullable();
            $table->json('services')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
