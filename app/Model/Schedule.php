<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';
    protected $fillable = [
        'event',
        'start_time',
        'end_time'
    ];
}
