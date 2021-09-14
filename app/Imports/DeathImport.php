<?php

namespace App\Imports;

use App\Models\Death;
use Maatwebsite\Excel\Concerns\ToModel;

class DeathImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Death([
            'villager_id' => $row[1], 
            'obit' => $row[2],
            'cause' => $row[3]
        ]);
    }
}
