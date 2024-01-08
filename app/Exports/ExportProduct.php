<?php

namespace App\Exports;

use App\Models\product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportProduct implements FromView
{

    public function view(): View
    {
        return view('exports.product-export', [
            'products' => product::all()
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
