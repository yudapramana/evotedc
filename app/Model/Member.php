<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    protected $fillable = [
        'name',
        'email',
        'student_number',
        'study_id',
        'faculty',
        'voter_key',
    ];

    public function study() {
        return $this->belongsTo(Study::class, 'study_id', 'id');
    }

    public function votings() {
        return $this->hasMany(Voting::class, 'member_id', 'id');
    }

    public function voting() {
        return $this->belongsTo(Voting::class,  'id', 'member_id');
    }

    public function validations() {
        return $this->hasMany(MemberValidation::class, 'member_id', 'id');
    }
}
