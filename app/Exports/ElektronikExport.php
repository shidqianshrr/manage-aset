<?php

namespace App\Exports;

use App\Models\ElektronikModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class ElektronikExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ElektronikModel::all();
    }
}
