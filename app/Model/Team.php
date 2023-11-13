<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';
    protected $fillable = [
        'name',
        'position',
        'department',
    ];

    public function state() {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    public function city() {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
