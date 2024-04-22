<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    // Jika di database tabelnya bernama mahasiswa, karena insert otomatis akan menambahkan s di belakang jika tidak dikasih protected table
    // protected $table = 'mahasiswa';

    protected $fillable = [
        'kodedosen',
        'nama',
        'email',
        'notelp',
        'domisili'
    ];
}
