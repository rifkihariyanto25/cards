<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('homepage_products', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('gambar')->nullable(); // boleh null jika tidak diupload
            $table->string('link')->nullable();
            $table->text('deskripsi')->nullable(); // tambahkan kolom deskripsi
            // $table->enum('status', ['active', 'inactive'])->default('active'); // Tambahan
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('homepage_products');
    }
};
