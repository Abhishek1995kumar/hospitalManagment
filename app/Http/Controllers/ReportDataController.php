<?php

namespace App\Http\Controllers;

use App\Exports\ExportData;
use Illuminate\Http\Request;
use App\Models\ReportDataModel;
use App\Models\hospitalinvoice;
use App\Models\sub_categorymodel;
use App\Models\categ;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Excel;
use DB;
use DataTables;
use Exception;
use Flash;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;


class ReportDataController extends Controller
{
    
    public function createDoctorPatientDetails()
    {
        $doctordata = User::where('department_id', '=', '2')->get();
        $doctorsubcategory = sub_categorymodel::where('category', '=', '15')->get();
        $category = hospitalinvoice::where('category')->get();
        // $cat=categ::where('cat_name')->get();
        $cat = DB::table('categ')->get();
        $patientdata = User::where('department_id', '=', '3')->get();
        // $total=($doctordata, $doctorsubcategory, $category, $cat, $patientdata);
        // echo "<pre>"; 
        // print_r($patientdata); 
        // exit;
        return view('reportData.export', compact('doctordata', 'patientdata','doctorsubcategory', 'category', 'cat'));
    }


    public function store(Request $request) {
        $ReportData= new ReportDataModel;
        $ReportData->patienttype  = $request['patienttype'];
        $ReportData->paymenttypeone  = $request['paymenttypeone'];
        $ReportData->category  = $request['category'];
        $ReportData->subcategory  = $request['subcategory'];
        $ReportData->discType  = $request['discType'];
        $ReportData->discRate  = $request['discRate'];
        $ReportData->discount  = $request['discount'];
        $ReportData->invoice_no  = $request['invoice_no'];

        $hospitalinvoice->save();

        return redirect('export_csv')->with('flash_message', 'Contact Addedd!'); 

    }
    

    public function fetch_investigationanalysis(request $request) {
        $payy_pricess =  $request->id;
        $payroll_rates = DB::table('newdoctoranalysis')
                    ->select('investigation_for.*')
                    ->where('newdoctoranalysis.id',$payy_pricess)->get();
        print_r($payroll_rates); die();
        return $payroll_rates;
    }

    public function investigation(request $request){
        $investigate_f = DB::table('newdoctoranalysis')
                    ->where('investigation_for',$request->investigation_for)->get()
                    ->pluck('investigation', 'id');
        // print_r($investigate_f); die();
        return response()->json($investigate_f);
    }



    public function doctorPatientExport(Request $request){
        return Excel::download(new ExportData, 'reports.xlsx');
    }
    

}
