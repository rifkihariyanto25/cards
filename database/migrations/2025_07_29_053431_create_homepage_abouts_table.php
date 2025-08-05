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
            $table->string('title_font_size')->nullable();

            // Konten 1
            $table->string('content_1_title');
            $table->string('content_1_title_font_size')->nullable();
            $table->string('content_1_subtitle');
            $table->string('content_1_subtitle_font_size')->nullable();
            $table->string('content_1_icon')->nullable();

            // Konten 2
            $table->string('content_2_title');
            $table->string('content_2_title_font_size')->nullable();
            $table->string('content_2_subtitle');
            $table->string('content_2_subtitle_font_size')->nullable();
            $table->string('content_2_icon')->nullable();

            // Konten 3
            $table->string('content_3_title');
            $table->string('content_3_title_font_size')->nullable();
            $table->string('content_3_subtitle');
            $table->string('content_3_subtitle_font_size')->nullable();
            $table->string('content_3_icon')->nullable();

            // Konten 4
            $table->string('content_4_title');
            $table->string('content_4_title_font_size')->nullable();
            $table->string('content_4_subtitle');
            $table->string('content_4_subtitle_font_size')->nullable();
            $table->string('content_4_icon')->nullable();

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
