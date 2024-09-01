<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    use HasFactory;

    protected $table = 'disposisi';

    public $timestamps = false;

    protected $primaryKey = 'id_disposisi';

    protected $fillable = [
        'surat_masuk_id',
        'pengisi',
        'tujuan',
        'instruksi',
        'catatan'
    ];

    public function suratMasuk()
    {
        return $this->belongsTo(SuratMasuk::class);
    }
}
