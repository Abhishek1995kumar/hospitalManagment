<?php

namespace App\Exports;

use App\Models\Location;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Exportlocation implements FromView
{

    public function view(): View
    {
        return view('exports.location-export', [
            'locations' => Location::all()
        ]);
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return product::all();
    // }
  

    // public function headings(): array
    // {
    //     return [
    //         'id',
    //         'created_at',
    //         'updated_at',
    //         'category',
    //         'subcategory',
    //         'product_name',
    //         'hsnno',
    //         'min_qty',
    //         'max_qty',
    //         'discount',
    //         'supplier_name',
    //         'cp',
    //         'mrp',
    //         'ref_code'
           
            
    //     ];
    // }
}
