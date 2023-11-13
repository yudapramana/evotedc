<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'candidates';
    protected $fillable = [
        'image',
        'name',
        'number',
        'vision',
        'study',
        'faculty',
        'department',
    ];

    public function missions() {
        return $this->hasMany(Mission::class, 'candidate_id', 'id');
    }

    public function voting1() {
        return $this->hasMany(Voting::class, 'candidate_id_1', 'id');
    }
    
    public function voting2() {
        return $this->hasMany(Voting::class, 'candidate_id_2', 'id');
    }

    public function voting3() {
        return $this->hasMany(Voting::class, 'candidate_id_3', 'id');
    }
    
    public function getVoting1CountAttribute() {
        return $this->voting1()->count();
    }
    
    public function getVoting2CountAttribute() {
        return $this->voting2()->count();
    }
    public function getVoting3CountAttribute() {
        return $this->voting3()->count();
    }
}
