<?php

namespace App\Exports;

use App\Voting;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class VotingExport implements FromCollection, WithHeadings, ShouldAutoSize
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

    public function headings(): array
    {
        return ["No", "Waktu Voting", "Nama Lengkap", "NIM", "Jurusan", "Angkatan", "Voting BEM", "Voting Himpunan", "Voting Senat"];
    }
}
