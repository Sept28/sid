<?php

namespace App\Exports;

use App\Models\FamilyCard;
use Maatwebsite\Excel\Concerns\FromCollection;

class FamilyCardExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FamilyCard::all();
    }
}
