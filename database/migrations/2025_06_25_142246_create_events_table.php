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
    if (!Schema::hasTable('event')) {
        Schema::create('event', function (Blueprint $table) {
            $table->id();
            $table->string('nama_event')->nullable();
            $table->string('deskripsi')->nullable()->default('-');
            $table->string('lokasi')->nullable()->default('-');
            $table->dateTime('jadwal_mulai');
            $table->dateTime('jadwal_selesai');
            $table->string('banner1');
            $table->string('banner2');
            $table->string('banner3');
            $table->unsignedBigInteger('pelenyenggara')->nullable();
            $table->unsignedBigInteger('harga_tiket');
            $table->timestamps();
        });
    }
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
