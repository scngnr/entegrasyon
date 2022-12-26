<?php

namespace App\Imports;

use Scngnr\Product\Models\en_product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new en_product([
            "stockCode" => $row['stokkodu'],
            "name" => $row['stokadi'],
            "stock" => $row['miktar'],
            "price" => $row['skfiyat'],
        ]);
    }
}
