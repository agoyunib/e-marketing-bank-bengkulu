<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = ['nm_unit','alamat','kota','kategori','status_unit'];
}
