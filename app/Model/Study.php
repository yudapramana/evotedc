<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    protected $table = 'studies';
    protected $fillable = [
        'name'
    ];
}
