<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Models\Counsellerentry;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Tpa;


class CounsellerentryController extends Controller
{
    function show()
    {

        $counsaledata = DB::table('counseller_entry')
        ->select( 'counseller_entry.*','doctor.first_name as df_name','doctor.last_name as dl_name') 
       
        ->leftjoin('users as doctor', 'counseller_entry.doctorname', '=', 'doctor.id')
        ->get();
       
        return view('counseller.list')->with(compact('counsaledata'));
       
    }

  
    function create (){
        // $paymode= Tpa::all();

        $doctorref = User::where('department_id', '=', '2')->get();
        $doctoranalysispatient = DB::table('newdoctoranalysis')->get();
        $surcateg = DB::table('subcategory')->get();
        $refinjection = DB::table('product')->get();

        $paymode = DB::table('tpapaymentmode')
        ->select( 'tpapaymentmode.*','tpamaster.tpapaymentmode','tpamaster.tpapaymenttype',) 
        ->join('tpamaster', 'tpapaymentmode.id', '=', 'tpamaster.tpapaymentmode')
        ->groupBy('tpamaster.tpapaymentmode')
        ->get();
        return view('counseller.create',compact('doctoranalysispatient','doctorref','surcateg','refinjection','paymode'));
      
      
    }
    public function fetch_doctoranalysis(request $request)
    {
       
        $doctanayliss_rates = DB::table('newdoctoranalysis')
                    ->select('newdoctoranalysis.*')
                    ->where('newdoctoranalysis.id',$request->id)
                    ->get();
        return $doctanayliss_rates;
    }
   
    public function fetch_surcateg(Request $request)
    {
        $cities = DB::table("product")
        ->where("subcategory",$request->id)
        ->pluck("product_name","id");
        return response()->json($cities);
    }

    

    public function fetch_proprice(request $request)
    {
       
        $product_rates = DB::table('product')
                    ->select('product.*')
                    ->where('product.id',$request->id)
                    ->get();
        return $product_rates;
    }
  
     public function get_pay_mode_couns(Request $request)
    {
        $tete = DB::table("tpamaster")
        ->where("tpapaymentmode",$request->tpapaymentmode)
        ->pluck("tpapaymenttype","id");
        return response()->json($tete);
    }

    function save (Request $request)
    {
       
        $validator = Validator::make($request->all(),[
            'ref_patient_id' => 'required',
            'p_name' => 'required',
            'doctorname' => 'required', 
            'diagosis' => 'required', 
            'd_advice' => 'required', 
            'c_remarks' => 'required', 
            

        ]);
            if($validator->passes())
            {
              
                $counseller = new Counsellerentry;

                $sutg_cate = implode(",", $request->sutg_cate);
                $products = implode(",", $request->products);
                $injection = implode(",", $request->injection);
                $pk_price = implode(",", $request->pk_price);
                $payment_paymode = implode(",", $request->payment_paymode);
                $p_type = implode(",", $request->p_type);
                $bed = implode(",", $request->bed);
                $s_date = implode(",", $request->s_date);
                $s_status = implode(",", $request->s_status);
                $remark = implode(",", $request->remark);
               
             
                $counseller->ref_patient_id = $request['ref_patient_id'];
                 $counseller->p_name = $request['p_name'];
                $counseller->doctorname = $request['doctorname'];
                $counseller->diagosis = $request['diagosis'];
                $counseller->d_advice = $request['d_advice'];
                $counseller->c_remarks = $request['c_remarks'];
                $counseller->products = $products;
                $counseller->sutg_cate = $sutg_cate;
                $counseller->injection = $injection;                
                $counseller->pk_price = $pk_price;                
                $counseller->payment_paymode = $payment_paymode; 
                $counseller->p_type = $p_type ;
                $counseller->bed = $bed ;
                $counseller->s_date = $s_date ;
                $counseller->s_status = $s_status ;
               
                $counseller->remark = $remark ;
               
              

                // print_r();die();
               
                $resp = $counseller->save();
               
              
               

                $request->session()->flash('msg','Save Succesfully');
                return redirect('/counseller');

            }
            else{
                return redirect('counseller/create')->withErrors($validator)->withInput();

            }
    }

    public function editcounseller($id)
    {
      
        $counseller = Counsellerentry::find($id);
        $doctorref = User::where('department_id', '=', '2')->get();
        $doctoranalysispatient = DB::table('newdoctoranalysis')->get();
        $surcateg = DB::table('subcategory')->get();
        $refinjection = DB::table('product')->get();
        $injectionss = DB::table('product')->get();
        $paymenttype = DB::table('tpamaster')->get();
        

        $paymode = DB::table('tpapaymentmode')
        ->select( 'tpapaymentmode.*','tpamaster.tpapaymentmode','tpamaster.tpapaymenttype',) 
        ->join('tpamaster', 'tpapaymentmode.id', '=', 'tpamaster.tpapaymentmode')
        ->groupBy('tpamaster.tpapaymentmode')
        ->get();
        return view('counseller.edit',compact('doctoranalysispatient','doctorref','surcateg','refinjection','paymode','counseller','injectionss',
    'paymenttype'));
       
    }

    function updatecounseller ($id,Request $request)
    {
       
        $validator = Validator::make($request->all(),[
            'ref_patient_id' => 'required',
            'p_name' => 'required',
            'doctorname' => 'required', 
            'diagosis' => 'required', 
            'd_advice' => 'required', 
            'c_remarks' => 'required', 
            

        ]);
            if($validator->passes())
            {
              
               
                $counseller = Counsellerentry::find($id);


                $sutg_cate = implode(",", $request->sutg_cate);
                $products = implode(",", $request->products);
                $injection = implode(",", $request->injection);
                $pk_price = implode(",", $request->pk_price);
                $payment_paymode = implode(",", $request->payment_paymode);
                $p_type = implode(",", $request->p_type);
                $bed = implode(",", $request->bed);
                $s_date = implode(",", $request->s_date);
                $s_status = implode(",", $request->s_status);
                $remark = implode(",", $request->remark);
               
             
                $counseller->ref_patient_id = $request['ref_patient_id'];
                 $counseller->p_name = $request['p_name'];
                $counseller->doctorname = $request['doctorname'];
                $counseller->diagosis = $request['diagosis'];
                $counseller->d_advice = $request['d_advice'];
                $counseller->c_remarks = $request['c_remarks'];
                $counseller->products = $products;
                $counseller->sutg_cate = $sutg_cate;
                $counseller->injection = $injection;                
                $counseller->pk_price = $pk_price;                
                $counseller->payment_paymode = $payment_paymode; 
                $counseller->p_type = $p_type ;
                $counseller->bed = $bed ;
                $counseller->s_date = $s_date ;
                $counseller->s_status = $s_status ;
               
                $counseller->remark = $remark ;
               
              

              
               
                $resp = $counseller->save();
               
              
               

                $request->session()->flash('msg','Save Succesfully');
                return redirect('/counseller');

            }
            else{
                return redirect('counseller/create')->withErrors($validator)->withInput();

            }
    }
   
    
}
