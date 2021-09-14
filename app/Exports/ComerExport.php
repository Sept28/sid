<?php

namespace App\Exports;

use App\Models\Comer;
use Maatwebsite\Excel\Concerns\FromCollection;

class ComerExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Comer::all();
    }
}
