<?php

namespace App\Http\Controllers;
use App\Models\pharmacybill;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Medicine;
use App\Models\Postot;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\Details;
use App\Models\Drug;

class PostotController extends Controller
{
    function show ()
    {
       // $postot = Postot::all();
         $postot = DB::table('postot')
         ->select( 'postot.*','doctor.first_name as df_name','doctor.last_name as dl_name') 
        // ->join('users as patient', 'postot.post_patient_name', '=', 'patient.id')
         ->leftjoin('users as doctor', 'postot.post_surgeon_name', '=', 'doctor.id')
         ->get();
       // print_r($preot_pre);die();
        return view('postot.list')->with(compact('postot'));
    }


    function add (){

        $postot = Postot::all();
        $postdetail=Details::all();
        $postdrug=Drug::all();

        $patientpostot = User::where('department_id', '=', '3')->get();
        $postotdoctor = User::where('department_id', '=', '2')->get();
        $postotnurse = User::where('department_id', '=', '4')->get();
        $productpostot = DB::table('product')->get();

        

        return view('postot.add',compact('postot','patientpostot','postotdoctor','postotnurse','postdetail','productpostot','postdrug'));
     
    }

//for details//
    public function submitdetailsform(Request $request)
    {
       
        $subdetails = new Details;
        $subdetails->detail = $request->detail;
        $subdetails->save();
        if($subdetails){
            $getdetail = Details::all();
        }
        return response()->json(['success'=>'Successfully', 'getdetail' => $getdetail]);

    }

//for drug//
    public function submitdrugform(Request $request)
    {
       
        $subdrugs = new Drug;
        $subdrugs->drug = $request->drug;
        $subdrugs->save();
        if($subdrugs){
            $getdrug = Drug::all();
        }
        return response()->json(['success'=>'Successfully', 'getdrug' => $getdrug]);

    }


    //further investigation table//
    



    function save (Request $request)
    {
       
        $validator = Validator::make($request->all(),[
            // 'patinet_id'=>'required',
            // 'diagnosis' => 'required',
            // 'investigation' => 'required',
            // 'investigation for' => 'required', 
            

        ]);
            if($validator->passes())
            {
              
                $postot=new Postot;

                $postot->post_mr_no = $request['post_mr_no'];
                $postot->post_surgeon_name = $request['post_surgeon_name'];
                $postot->post_patient_name= $request['post_patient_name'];
                $postot->post_eye = $request['post_eye'];
                $postot->post_clean_by = $request['post_clean_by'];
                $postot->post_date = $request['post_date'];

                $postot->post_bp= $request['post_bp'];
                $postot->post_bp_remark= $request['post_bp_remark'];

                $postot->post_surger_check= $request['post_surger_check'];
                $postot->post_surger_check_remark= $request['post_surger_check_remark'];

                $postot->post_spotwo= $request['post_spotwo'];
                $postot->post_spotwo_remark= $request['post_spotwo_remark'];

                $postot->post_hear_rate= $request['post_hear_rate'];
                $postot->post_hearrate_remark= $request['post_hearrate_remark'];

                $postot->post_patient_cover= $request['post_patient_cover'];
                $postot->post_patientcover_remark= $request['post_patientcover_remark'];

                $postot->post_patient_shoecover= $request['post_patient_shoecover'];
                $postot->post_patientshoecover_remark= $request['post_patientshoecover_remark'];

                $postot->post_autoclavedone= $request['post_autoclavedone'];
                $postot->post_autoclavedone_remark= $request['post_autoclavedone_remark'];

                $postot->post_instrumentsterilization= $request['post_instrumentsterilization'];
                $postot->post_instrumentsterilization_remark= $request['post_instrumentsterilization_remark'];


                $postot->post_ottable= $request['post_ottable'];
                $postot->post_foot_switch= $request['post_foot_switch'];
                $postot->post_gamachine= $request['post_gamachine'];
                $postot->post_microscope= $request['post_microscope'];
                $postot->post_microscope_footswith= $request['post_microscope_footswith'];
                $postot->post_aircondistioner= $request['post_aircondistioner'];
                $postot->post_instruments_autoclave= $request['post_instruments_autoclave'];
                $postot->post_instruments_autoclave_remark= $request['post_instruments_autoclave_remark'];
                $postot->post_phaco_machine= $request['post_phaco_machine'];

                $postot->post_fumigation_date= $request['post_fumigation_date'];
                $postot->post_instrument_clean_by= $request['post_instrument_clean_by'];
                $postot->post_oxygen_cylinderstatus= $request['post_oxygen_cylinderstatus'];
                $postot->post_nurse_name= $request['post_nurse_name'];
                

                // $postot->post_product= $request['post_product'];
                // $postot->post_quantity= $request['post_quantity'];
                // $postot->post_reusable= $request['post_reusable'];
                // $postot->post_price= $request['post_price'];
                // $postot->post_tobebilled= $request['post_tobebilled'];

                $postot->post_incident_remark= $request['post_incident_remark'];
                $postot->post_otconduct_remark= $request['post_otconduct_remark'];
                $postot->post_doctornote_remark= $request['post_doctornote_remark'];

                $postot->post_bloodpresure= $request['post_bloodpresure'];
                $postot->post_spotwos= $request['post_spotwos'];
                $postot->post_heartrate= $request['post_heartrate'];
                $postot->post_followupdatecoun= $request['post_followupdatecoun'];
                $postot->post_followupdatedoctor= $request['post_followupdatedoctor'];
                $postot->post_otitemsstock= $request['post_otitemsstock'];
                $postot->post_secondtimeout= $request['post_secondtimeout'];
                $postot->discharge= $request['discharge'];
                $postot->doesdonts= $request['doesdonts'];
                $postot->postotmedication= $request['postotmedication'];


                $post_product = implode(",", $request->post_product);
                $post_quantity = implode(",", $request->post_quantity);
                $post_reusable = implode(",", $request->post_reusable);
                $post_price = implode(",", $request->post_price);
                $post_tobebilled = implode(",", $request->post_tobebilled);
                
                $postot->post_product = $post_product;
                $postot->post_quantity =  $post_quantity;  
                $postot->post_reusable =  $post_reusable;  
                $postot->post_price =  $post_price; 
                $postot->post_tobebilled =  $post_tobebilled;  

                $drug = implode(",", $request->drug);
                $drug_remark = implode(",", $request->drug_remark);

                $postot->drug =  $drug; 
                $postot->drug_remark =  $drug_remark;  


                $post_detailsrange = implode(",", $request->post_detailsrange);
                $post_details_remark = implode(",", $request->post_details_remark);

                $postot->post_detailsrange =  $post_detailsrange; 
                $postot->post_details_remark =  $post_details_remark;  
               
               
                 // print_r();die();
               
                $resp =  $postot->save();
               
               $request->session()->flash('msg','Save Succesfully');
                return redirect('/postot');
               }
            else{
                return redirect('postot/add')->withErrors($validator)->withInput();
            }
    }

     public function fetchdata_postot(request $request)
    {
        $payy_post =  $request->id;
        $post_rates = DB::table('users')
                    ->select('users.*','d.name')
                    ->leftjoin('departments as d','d.id','=','users.department_id')
                    ->where('users.id',$payy_post)->get();
        return $post_rates;
    }



    public function editpostot($id)
    {
      
    
        $postot = Postot::find($id);
        
        $patientpostot = User::where('department_id', '=', '3')->get();
        $postotdoctor = User::where('department_id', '=', '2')->get();
        $postotnurse = User::where('department_id', '=', '4')->get();
        $postdetail=Details::all();
        $postdrug=Drug::all();
        $productpostot = DB::table('product')->get();
       
        return view('postot.edit',compact('postot','patientpostot','postotdoctor','postotnurse','postdetail','productpostot','postdrug'));
    }
   





  
}

