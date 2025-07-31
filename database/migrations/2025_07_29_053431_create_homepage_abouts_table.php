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
        Schema::create('homepage_abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content_1_title');
            $table->string('content_1_subtitle');
            $table->string('content_1_icon');
            $table->string('content_2_title');
            $table->string('content_2_subtitle');
            $table->string('content_2_icon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_abouts');
    }
};
