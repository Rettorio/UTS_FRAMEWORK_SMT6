<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $table = "event";
    
    protected $fillable = [
        "nama_event",
        "lokasi",
        "jadwal_mulai",
        "jadwal_selesai",
        "banner1",
        "penyelenggara",
        "harga_tiket"
    ];

    protected $casts = [
        'jadwal_mulai' => 'datetime',
        'jadwal_selesai' => 'datetime'
    ];

    public function setJadwalMulaiAttribute($value) {
        $this->attributes['jadwal_mulai'] = Carbon::parse($value)->toDateTime();
    }
    
    public function setJadwalSelesaiAttribute($value) {
        $this->attributes['jadwal_selesai'] = Carbon::parse($value)->toDateTime();
    }

    public function partner(): BelongsTo {
       return $this->belongsTo(User::class, 'penyelenggara', 'id');
    }
}
