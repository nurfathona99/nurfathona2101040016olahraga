<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    //jika nama tabel berbeda dengan nama model
    //maka buat property table
    protected $table = 'jadwal';
    protected $fillable = ['waktu_mulai', 'waktu_selesai', 'tempat', 'id'];

    function olahraga()
    {
        return $this->belongsTo(Olahraga::class, 'id', 'id');
    }
}
