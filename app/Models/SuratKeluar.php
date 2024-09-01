<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'surat_keluar';

    protected $primaryKey = 'id_surat_keluar';

    public $timestamps = false;

    protected $fillable = [
        'no_surat_keluar',
        'judul_surat_keluar',
        'jenis_surat',
        'tujuan',
        'tanggal_keluar',
        'berkas_surat_keluar',
        'keterangan',
    ];
}
