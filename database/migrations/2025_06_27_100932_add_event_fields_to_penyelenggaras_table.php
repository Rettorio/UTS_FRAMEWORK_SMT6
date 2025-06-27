<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('penyelenggaras', function (Blueprint $table) {
            $table->text('alamat')->nullable();
            $table->string('nama_event')->nullable();
            $table->date('tanggal_event')->nullable();
            $table->string('lokasi_event')->nullable();
            $table->text('deskripsi_event')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('penyelenggaras', function (Blueprint $table) {
            if (Schema::hasColumn('penyelenggaras', 'alamat')) {
                $table->dropColumn('alamat');
            }
            if (Schema::hasColumn('penyelenggaras', 'nama_event')) {
                $table->dropColumn('nama_event');
            }
            if (Schema::hasColumn('penyelenggaras', 'tanggal_event')) {
                $table->dropColumn('tanggal_event');
            }
            if (Schema::hasColumn('penyelenggaras', 'lokasi_event')) {
                $table->dropColumn('lokasi_event');
            }
            if (Schema::hasColumn('penyelenggaras', 'deskripsi_event')) {
                $table->dropColumn('deskripsi_event');
            }
        });
    }
};
