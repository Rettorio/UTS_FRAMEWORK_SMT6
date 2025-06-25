<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    protected $table = "wisata";
    protected $fillable = [
        'nama_tempat',
        'deskripsi',
        'fasilitas',
        'harga_tiket',
        'lokasi',
        'banner1',
        'banner2',
        'banner3',
    ];
}
