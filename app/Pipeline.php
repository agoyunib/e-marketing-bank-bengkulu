<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pipeline extends Model
{
    protected $fillable = [
        'jenis_produk_id',
        'ao_id',
        'no_registrasi',
        'nm_target',
        'alamat',
        'kota',
        'no_hp',
        'kategori_target',
        'target_penambahan_dana',
        'alat_promosi',
        'jenis_produk_id',
        'total_target',
        'periode_target',
        'status_realisasi',
        'keterangan_status',
        'status_final',
    ];
}
