<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemasukan extends Model
{
    use HasFactory;
    protected $table = "pemasukan";
    protected $fillable = [
        'judul',
        'deskripsi',
        'kategori',
        'tanggal',
        'jumlah',
        'user',
        'status',
    ];
}
