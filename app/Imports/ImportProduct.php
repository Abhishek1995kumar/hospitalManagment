<?php

namespace App\Imports;
use App\Models\product;
use DB;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportProduct implements ToCollection, WithHeadingRow {
    public function collection(Collection $rows) {
        foreach ($rows as $row) {
           
            // 'product_name' => $row['product_name'],
            // 'mrp' => $row['mrp'],

            $detail = product::find($row['id']);
            if($detail != ''){
                $detail->product_name = $row['product_name'];
                $detail->mrp = $row['mrp'];
                $detail->save();
            }else{  }
        }
    }
}
