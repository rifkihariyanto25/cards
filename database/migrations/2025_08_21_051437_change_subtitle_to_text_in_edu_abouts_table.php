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
        Schema::table('edu_abouts', function (Blueprint $table) {
            $table->text('subtitle')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('edu_abouts', function (Blueprint $table) {
            $table->string('subtitle')->change();
        });
    }
};
