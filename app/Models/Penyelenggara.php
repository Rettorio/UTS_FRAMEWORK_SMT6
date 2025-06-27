<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyelenggara extends Model
{
    use HasFactory;

    protected $fillable = [
    'nama',
    'email',
    'telepon',
    'alamat',
    'nama_event',
    'tanggal_event',
    'lokasi_event',
    'deskripsi_event',
];
}
