<?php

namespace App\Imports;

use App\Models\Villager;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class VillagerImport implements ToModel, WithStartRow
{
    public function StartRow(): int
    {
        return 2;
    }
    
    public function model(array $row)
    {
        return new Villager([
            'id_number' => $row[1],
            'name' => $row[2],
            'age' => $row[3],
            'birth_date' => $row[4],
            'birth_place' => $row[5],
            'gender' => $row[6],
            'blood_type' => $row[7],
            'address' => $row[8],
            'religion' => $row[9],
            'marital_status' => $row[10],
            'citizenship' => $row[11],
            'education' => $row[12],
            'parent' => $row[13],
            'id_photo' => $row[14],
            'kinship' => $row[15],
            'status' => $row[16],
        ]);
    }
    
}
