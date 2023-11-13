<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $table = 'missions';
    protected $fillable = [
        'candidate_id',
        'mission'
    ];
}
