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
        Schema::create('event', function (Blueprint $table) {
            $table->id();
            $table->string("nama_event")->nullable("false");
            $table->string("deskripsi")->nullable("false")->default("-");
            $table->string("lokasi")->nullable("falase")->default("-");
            $table->dateTime("jadwal_mulai")->nullable(false);
            $table->dateTime("jadwal_selesai")->nullable(false);
            $table->string("banner1")->nullable(false); // tiap event minimal punya 1 gambar
            $table->string("banner2")->nullable(false);
            $table->string("banner3")->nullable(false);
            $table->foreignId("pelenyenggara")->nullable("false")->constrained("users");
            $table->bigInteger("harga_tiket")->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
