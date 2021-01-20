<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    protected $fillable = [
        'pipeline_id',
        'tanggal_kunjungan'
    ];
}
