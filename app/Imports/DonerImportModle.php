<?php

namespace App\Imports;

use App\Models\Doner;
use Maatwebsite\Excel\Concerns\ToModel;

class DonerImportModel implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $rows)
    {
        // dd($row[]);
        foreach ($rows as $row) {
            dd($row);
        }
        
        return new Doner([
            //
        ]);
    }
}
