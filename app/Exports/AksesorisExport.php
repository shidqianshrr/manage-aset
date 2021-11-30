<?php

namespace App\Exports;

use App\Models\AksesorisModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class AksesorisExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AksesorisModel::all();
    }
}
