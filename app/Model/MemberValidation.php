<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberValidation extends Model
{
    protected $table = 'member_validations';
    protected $fillable = [
        'member_id'
    ];
}
