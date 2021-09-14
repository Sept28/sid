<?php

namespace App\Imports;

use App\Models\Villager;
use Maatwebsite\Excel\Concerns\ToModel;

class VillagerImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Villager([
            'id_number' => $row[1],
            'family_card_id' => $row[2],
            'name' => $row[3],
            'age' => $row[4],
            'birth_date' => $row[5],
            'birth_place' => $row[6],
            'gender' => $row[7],
            'blood_type' => $row[8],
            'address' => $row[9],
            'religion' => $row[10],
            'marital_status' => $row[11],
            'citizenship' => $row[12],
            'education' => $row[13],
            'parent' => $row[14],
            'id_photo' => $row[15],
            'kinship' => $row[16],
        ]);
    }
}
