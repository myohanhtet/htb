<?php

namespace App\Imports;

use App\Models\Doner;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class DonerImport implements ToCollection,WithHeadings
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // dd($row[5]);
            Doner::create([
                'name'=> zg2uni($row[0]),
                'address' => zg2uni($row[1]),
                // 'email' => $row['Email'],
                // 'phone' => $row['Phone']
            ]);
        }
    }

    public function headings(): array
        {
            // return [
            //     'Donor',
            //     'Address',
            //     'Email',
            //     'Phone'
            // ];
        }
}
