<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    protected $table = 'votings';
    protected $fillable = [
        'candidate_id_1',
        'candidate_id_2',
        'ip',
        'member_id',
        'type'
    ];

    public function member() {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }

    public function candidate1() {
        return $this->belongsTo(Candidate::class, 'candidate_id_1', 'id');
    }
    
    public function candidate2() {
        return $this->belongsTo(Candidate::class, 'candidate_id_2', 'id');
    }
}
