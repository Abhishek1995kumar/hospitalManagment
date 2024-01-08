<?php

namespace App\Http\Controllers;
use App\Models\pharmacybill;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Medicine;
use App\Models\Doctoranalysis;
use App\Models\product;
use App\Models\sub_categorymodel;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
class DoctoranalysisController extends Controller
{
    function show ()
    {
        $doctoranalysis = Doctoranalysis::all();
        return view('doctoranalysis.list')->with(compact('doctoranalysis'));
    }


    function add (){
        $doctorsubcategory = sub_categorymodel::where('category', '=', '15')->get();
        // $doctorsubcategory = DB::table('subcategory')->get();
        $doctorcategory = DB::table('categ')->get();
        $product = DB::table('product')->get();
        $doctoranalysispatient = User::where('department_id', '=', '3')->get();
        $patientcategory = DB::table('categ')->get();
        // $productmedicine = DB::table('product')->get();
        return view('doctoranalysis.add',compact('doctorsubcategory','doctorcategory','product','doctoranalysispatient','patientcategory'));
     
    }

    function save (Request $request)
    {
       //rahul start code//
      $adminid = Auth::id();
      $timing = now()->toTimeString();
      //rahul end code//
        $validator = Validator::make($request->all(),[
            // 'patinet_id'=>'required',
            // 'diagnosis' => 'required',
            // 'investigation' => 'required',
            // 'investigation for' => 'required', 
            

        ]);
            if($validator->passes())
            {
              
                $doctoranalysis=new doctoranalysis;
                $patient_category = implode(",", $request->patient_category);

                $investigation_for = implode(",", $request->investigation_for);
                $investigation = implode(",", $request->investigation);
                $medicine = implode(",", $request->medicine);
                $quantity = implode(",", $request->quantity);
                $no_of_days = implode(",", $request->no_of_days);
                $dose = implode(",", $request->dose);
                $surgery_category = implode(",", $request->surgery_category);
                $products = implode(",", $request->products);
                $injection = implode(",", $request->injection);
                $packege_price = implode(",", $request->packege_price);



                




               
             
                $doctoranalysis->patient_id = $request['patient_id'];
                $doctoranalysis->privious_date = $request['privious_date'];
                $doctoranalysis->patient_name = $request['patient_name'];
                $doctoranalysis->patient_name = $request['patient_name'];
                $doctoranalysis->date_doctoranalysis = $request['date_doctoranalysis'];
                $doctoranalysis->patient_category = $request['patient_category'];
                $doctoranalysis->diagnosis = $request['diagnosis'];
                $doctoranalysis->upload_document = $request['upload_document'];
                $doctoranalysis->doctor_advice = $request['doctor_advice'];
                $doctoranalysis->clinical_remark = $request['clinical_remark'];
                $doctoranalysis->no_of_followup_days = $request['no_of_followup_days'];
                $doctoranalysis->followup_date = $request['followup_date'];
                
                


                $doctoranalysis->investigation_for = $investigation_for;
                $doctoranalysis->investigation =  $investigation;                
                $doctoranalysis->medicine = $medicine; 
                $doctoranalysis->quantity = $quantity ; 
                $doctoranalysis->no_of_days = $no_of_days; 
                $doctoranalysis->dose =  $dose; 
                $doctoranalysis->surgery_category = $surgery_category; 
                $doctoranalysis->products = $products; 
                $doctoranalysis->injection = $injection; 
                $doctoranalysis->packege_price = $packege_price; 
                $doctoranalysis->patient_category = $patient_category; 
                $doctoranalysis->created_by = $adminid;
                $doctoranalysis->timing = $timing;
                // print_r();die();
               
                $resp =  $doctoranalysis->save();
               
               $request->session()->flash('msg','Save Succesfully');
                return redirect('/analysisdoctor');

            }
            else{
                return redirect('analysisdoctor/add')->withErrors($validator)->withInput();

            }
    }
    public function deletedoctoranalysis($id,Request $request)

    {
        Doctoranalysis::where('id',$id)->delete();
        $request->session()->flash('msg','Record Has Been Delete Succesfully');
                return redirect('/analysisdoctor');
        // echo "<pre>";
        // print_r($customer);
        

    }
    public function editdoctoranalysis($id)
    {
      
        $doctoranalysis = Doctoranalysis::find($id);
        $doctorsubcategory = DB::table('subcategory')->get();
        $doctorcategory = DB::table('categ')->get();
        $patientcategory = DB::table('categ')->get();
        $product = DB::table('product')->get();
        $doctoranalysispatient = User::where('department_id', '=', '3')->get();
        
        $data=compact('doctoranalysis','doctorsubcategory','doctorcategory','product','doctoranalysispatient','patientcategory'); 

        return view('doctoranalysis.edit')->with($data);
        //  return view('pharmacybill.edit')->with(compact('pharama'));
    }

    public function updatedoctoranalysis($id,Request $request)
    {
        $validator = Validator::make($request->all(),[
            // 'patinet_id'=>'required',
            // 'diagnosis' => 'required',
            // 'investigation' => 'required',
            // 'investigation for' => 'required', 
            


        ]);
            if($validator->passes())
            {
                $doctoranalysis = Doctoranalysis::find($id);
                //$doctoranalysis=new doctoranalysis;
                $patient_category = implode(",", $request->patient_category);
                $investigation_for = implode(",", $request->investigation_for);
                $investigation = implode(",", $request->investigation);
                $medicine = implode(",", $request->medicine);
                $quantity = implode(",", $request->quantity);
                $no_of_days = implode(",", $request->no_of_days);
                $dose = implode(",", $request->dose);
                $surgery_category = implode(",", $request->surgery_category);
                $products = implode(",", $request->products);
                $injection = implode(",", $request->injection);
                $packege_price = implode(",", $request->packege_price);
               
             
               // $doctoranalysis->patient_id = $request['id'];
                $doctoranalysis->privious_date = $request['privious_date'];
                $doctoranalysis->patient_name = $request['patient_name'];
                $doctoranalysis->date_doctoranalysis = $request['date_doctoranalysis'];
                $doctoranalysis->patient_category = $request['patient_category'];
                $doctoranalysis->diagnosis = $request['diagnosis'];
                $doctoranalysis->upload_document = $request['upload_document'];
                $doctoranalysis->doctor_advice = $request['doctor_advice'];
                $doctoranalysis->clinical_remark = $request['clinical_remark'];
                $doctoranalysis->no_of_followup_days = $request['no_of_followup_days'];
                $doctoranalysis->followup_date = $request['followup_date'];
                
                $doctoranalysis->investigation_for = $investigation_for;
                $doctoranalysis->investigation =  $investigation;                
                $doctoranalysis->medicine = $medicine; 
                $doctoranalysis->quantity = $quantity ; 
                $doctoranalysis->no_of_days = $no_of_days; 
                $doctoranalysis->dose =  $dose; 
                $doctoranalysis->surgery_category = $surgery_category; 
                $doctoranalysis->products = $products; 
                $doctoranalysis->injection = $injection; 
                $doctoranalysis->packege_price = $packege_price; 
                $doctoranalysis->patient_category = $patient_category; 

                $doctoranalysis->save();
                $request->session()->flash('msg','update Succesfully');
                return redirect('/analysisdoctor');

            }
            else{
                return redirect('analysisdoctor/edit/'.$id)->withErrors($validator)->withInput();

            }
        }


        public function fetch_sub_cat_doctoranalysis(Request $request){
            $data = DB::table('product')
            ->where('subcategory',$request->subcategory)
            ->pluck('product_name','id');
            return response()->json($data);
         //print_r($data); die();
        }


        public function fetch_cat_doctoranalysis(Request $request){
            $data = DB::table('product')
            ->where('subcategory',$request->category)
            ->pluck('product_name','id');
            return response()->json($data);
         //print_r($data); die();
        }


      
       
        // public function viewmodel($id)
        // {
          
        //     $pharama = pharmacybill::find($id);
        //     $patientref = User::where('department_id', '=', '3')->get();
        //             $doctorref = User::where('department_id', '=', '2')->get();
    
        //     $data=compact('pharama','patientref','doctorref'); //variabl
        //     return view('pharmacybill.view')->with($data);
        //     // $pharmacybill = pharmacybill::find($id); //table_name
        //     // $data=compact('pharmacybill'); //variabl
        //     //  return view('pharmacybill.edit')->with(compact('pharama'));
        // }

//further investigation table//
       public function showmode($id)
       {
           
            $data = DB::table('newdoctoranalysis')
            ->where('id', $id)
            ->select('*') 
            ->first();



            if(!empty($data) > 0) {
                return response()->json(array('status' => 200, 'data' => $data));
            }else {
                return response()->json(array('status' => 500, 'msg' => 'Server Error !!! Please try again later.'));
            }
           
         }


//medicine table//

public function medicinetable($id)
{
           
    // $data = DB::table('newdoctoranalysis')
    // ->where('id', $id)
    // ->select('*') 
    // ->first();

    $data = DB::table('newdoctoranalysis')
    ->where('newdoctoranalysis.id', $id)
    ->select('newdoctoranalysis.*', DB::raw("CONCAT(users.first_name,' ',users.last_name) as full_name")) 
    ->leftjoin('users', 'newdoctoranalysis.created_by', '=', 'users.id')
    ->first();



    if(!empty($data) > 0) {
        return response()->json(array('status' => 200, 'data' => $data));
    }else {
        return response()->json(array('status' => 500, 'msg' => 'Server Error !!! Please try again later.'));
    }
   
 }




















         public function Payroll_pricedoctoranalysis(request $request)
                {
                    $payy_pricess =  $request->id;
                    $payroll_rates = DB::table('users')
                                ->select('users.*','d.name')
                                ->leftjoin('departments as d','d.id','=','users.department_id')
                                ->where('users.id',$payy_pricess)->get();
                    return $payroll_rates;
                }

                
    

        public function fetch_date(Request $request){
            $date = DB::table('newdoctoranalysis')
                    ->where('patient_id',$request->id)
                    ->pluck('date_doctoranalysis','id');
                    // print_r($date); die();
                    return response()->json($date);
        }

        public function fetchpriviouse(Request $request){
            $datafetch = DB::table('newdoctoranalysis as n')
          
           ->select('n.*', 'p.product_name') 
           ->leftjoin('product as p','p.id','=','n.investigation')
           ->where('n.id',$request->id)
           ->get();
           // echo "<pre>";
           // print_r($datafetch); die();
           return response()->json($datafetch);
            // return $datafetch;
           
        }

      
       // public function fetchpriviouse(Request $request){
        //  $datafetch = DB::table('newdoctoranalysis')
        // ->where('id', $request->id,)
        // ->select('*') 
        // ->get();
        
        // //print_r($data); die();
        //  return response()->json($datafetch);

        // }



        // DB::table('newdoctoranalysis')
        // ->select('newdoctoranalysis.id','newdoctoranalysis.investigation')
        // ->join('product','product.id','=','newdoctoranalysis.id')
        // ->where('product.id', $request->id,)
        // ->get();
        // return response()->json($datafetch);
               
        
        
        // public function payshowmode($id)
        // {
        //     $pharapay_data = DB::table('pharmacybills')
        //     ->where('pharmacybills.id', $id)
        //     ->select( 'pharmacybills.*') 
        //     ->get()->toArray();
        //     $paymode_array = explode(",", $pharapay_data[0]->payment_paymode);

        //     $paymentm_name = DB::table('payment_method')
        //     ->whereIn('payment_method.id', $paymode_array)
        //     ->select( 'payment_method.payment_name') 
        //     ->get()->toArray();

        //     $paymode_filter_array = [];
        //     for($i=0; $i<count($paymentm_name); $i++){
        //         array_push($paymode_filter_array, $paymentm_name[$i]->payment_name);
        //     }
        //     $pharapay_data[0]->payment_name = implode(",",$paymode_filter_array);


            
        //     if($pharapay_data){
        //         return response()->json([
        //             'status'=>"success",
        //             'data'=> $pharapay_data
        //         ]);
    
        //     }else{
        //         return response()->json([
        //             'status'=>"error"
        //         ]);
    
        //     }

        // }

        public function store(Request $request)
        {
           
    
    
            $subcateg = new sub_categorymodel;
            $subcateg->subcat_name = $request->name;
           
            $subcateg->save();
    
            return response()->json(['success'=>'Successfully']);
        }



        
        public function store_submit_invest(Request $request)
        {
           
    
    
            $subproduct = new product;
            $subproduct->product_name = $request->name;
            $subproduct->subcategory = $request->name;

           
            $subproduct->save();
    
            return response()->json(['success'=>'Successfully']);
        }





       
}

