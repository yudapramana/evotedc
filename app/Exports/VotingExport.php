<?php

namespace App\Exports;

use App\Voting;
use Maatwebsite\Excel\Concerns\FromCollection;

class VotingExport implements FromCollection
{
    private $dataModel;

    public function __construct($dataModel)
    {
        $this->dataModel = $dataModel;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->dataModel;
    }
}
