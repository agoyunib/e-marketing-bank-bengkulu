<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PipelineDetail extends Model
{
    protected $fillable = [
        'user_id',
        'pipeline_id',
        'status_realisasi'
    ];
}
