<?php

namespace App\Exports;

use App\Models\Villager;
use Maatwebsite\Excel\Concerns\FromCollection;

class VillagerExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Villager::all();
    }
}
