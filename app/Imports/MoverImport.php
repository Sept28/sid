<?php

namespace App\Imports;

use App\Models\Mover;
use Maatwebsite\Excel\Concerns\ToModel;

class MoverImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mover([
            'villager_id' => $row[1],
            'date' => $row[2],
            'cause' => $row[3]
        ]);
    }
}
