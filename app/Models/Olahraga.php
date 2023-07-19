<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Olahraga extends Model
{
    use HasFactory;

    //jika nama tabel berbeda dengan nama model
    //maka buat property table
    protected $table = 'olahraga';
    protected $fillable = ['id','nama_olahraga', 'deskripsi'];
}
