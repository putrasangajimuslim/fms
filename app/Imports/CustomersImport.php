<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class CustomersImport implements ToModel, WithStartRow
{
    public function startRow(): int
    {
        return 2;
    }

    // public function getCsvSettings(): array
    // {
    //     return [
    //         'delimiter' => ','
    //     ];
    // }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer([
           'name'         => $row[1],
           'phone_number' => $row[2],
           'address'      => $row[3],
        ]);
    }
} 
