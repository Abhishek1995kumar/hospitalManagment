<?php

namespace App\Exports;
// reports

use App\Models\ReportDataModel;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;


class ExportData implements FromView, ShouldAutoSize {

    // public function collection(){

    //     $patient = User::all();
    //     dd($patient);
    //     return ('patient');
    // }
    public function view(): View
    {
        // $reports1 = User::where('department_id', '=', '2');
        // $reports2 = User::where('department_id', '=', '3');
        $reports2 = User::where('department_id', '=', '3');
        // return view('exports.reportdp-export', compact('reports1', 'reports2'));
        return view('exports.reportdp-export', ['reports2' => $reports2]);
    }



    // public function view(): View {
    //     dd(User::with('user')->get());
    //     return view('exports.reportsData', ['reportsData'=>User::with('user')->get()]);
    // }

    // public function title() {
    //     return 'ReportDataModels';
    // }

    // public function registerEvents(): array
    // {
    //     return [
    //         AfterSheet::class => function (AfterSheet $event) {
    //             $cellRange = 'A1:W1';
    //             $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
    //         },
    //     ];
    // }
}

