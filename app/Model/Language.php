<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'languages';
    protected $fillable = [
        'locale',
        'language',
        'direction',
    ];
}
