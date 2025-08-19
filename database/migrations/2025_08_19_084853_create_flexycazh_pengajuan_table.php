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
        Schema::create('flexycazh_pengajuan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_partner');
            $table->string('jenis_partner');
            $table->string('nama_pic');
            $table->string('nomor_hp_pic');
            $table->string('kebutuhan');
            $table->decimal('nominal', 15, 2);
            $table->string('tenor');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flexycazh_pengajuan');
    }
};
