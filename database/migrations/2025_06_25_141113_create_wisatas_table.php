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
        Schema::create('wisata', function (Blueprint $table) {
            $table->id();
            $table->string("nama_tempat")->nullable(false);
            $table->string("deskipsi")->nullable(false)->default("-");
            $table->string("fasilitas")->nullable(false)->default("-");
            $table->string("lokasi")->nullable(false);
            $table->string("banner1")->nullable(false);
            $table->string("banner2")->nullable();
            $table->string("banner3")->nullable();
            $table->bigInteger("harga_tiket")->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wisatas');
    }
};
