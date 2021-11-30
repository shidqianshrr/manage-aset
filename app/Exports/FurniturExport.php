<?php

namespace App\Exports;

use App\Models\FurniturModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class FurniturExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FurniturModel::all();
    }
}
