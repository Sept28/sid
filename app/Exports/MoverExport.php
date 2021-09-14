<?php

namespace App\Exports;

use App\Models\Mover;
use Maatwebsite\Excel\Concerns\FromCollection;

class MoverExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mover::all();
    }
}
