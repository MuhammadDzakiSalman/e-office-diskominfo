<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $table = 'surat_masuk';

    protected $primaryKey = 'id_surat_masuk';

    public $timestamps = false;

    protected $fillable = [
        'judul_surat_masuk',
        'no_surat_masuk',
        'jenis_surat',
        'asal_surat',
        'berkas_surat_masuk',
        'tanggal_masuk',
        'tanggal_diterima',
        'keterangan',
    ];

    public function disposisi()
    {
        return $this->hasMany(Disposisi::class, 'surat_masuk_id');
    }
}
