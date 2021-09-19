<?php

namespace App\Imports;

use App\Models\FamilyCard;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class FamilyCardImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new FamilyCard([
        'family_number' => $row[1], 
        'villager_id' => $row[2],
        'address' => $row[3],
        'village' => $row[4],
        'sub_district' => $row[5],
        'district' => $row[6],
        'province' => $row[7],
        'postal_code' => $row[8],
        'family_photo' => $row[9],
        ]);
    }

    public function StartRow(): int
    {
        return 2;
    }
}
