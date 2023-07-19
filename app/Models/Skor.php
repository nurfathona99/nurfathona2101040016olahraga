<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skor extends Model
{
    use HasFactory;

    //jika nama tabel berbeda dengan nama model
    //maka buat property table
    protected $table = 'skor';
    protected $fillable = ['nama', 'skor', 'tanggal', 'id'];

    function jadwal() {
        return $this->belongsTo(Jadwal::class, 'id', 'id',);

    }
}
