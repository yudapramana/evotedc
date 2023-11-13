<?php

namespace App\Imports;

use App\Model\City;
use App\Model\Member;
use App\Model\State;
use App\Model\Study;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class MemberImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $study = Study::where('name', 'like', '%' . $row[3] . '%')->first();

        return new Member([
            'name' => $row[0],
            'student_number' => $row[1],
            'email' => strtolower($row[2]),
            'study_id' => ($study) ? $study->id : null,
            'faculty' => $row[4],
            'voter_key' => $row[5]
        ]);
    }
}
