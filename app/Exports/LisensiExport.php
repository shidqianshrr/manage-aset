<?php

namespace App\Exports;

use App\Models\LisensiModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class LisensiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return LisensiModel::all();
    }
}
