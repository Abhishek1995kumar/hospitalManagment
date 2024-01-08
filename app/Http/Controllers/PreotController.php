<?php

namespace App\Http\Controllers;
use App\Models\pharmacybill;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Medicine;
use App\Models\Preot;
use App\Models\Preottest;
use Illuminate\Support\Facades\Validator;
use DB;
class PreotController extends Controller
{
    function show ()
    {
        //$preot = Preot::all();
        $preot = DB::table('preot')
        ->select('preot.*','doctor.first_name as df_name','doctor.last_name as dl_name') 
        ->join('users as doctor', 'preot.doctor_namepre', '=', 'doctor.id')
        ->get();
       // print_r($preot_pre);die();
        return view('preot.list')->with(compact('preot'));
    }


    function add (){

        $preot = Preot::all();
        $posttest=Preottest::all();
        $preotpatient = User::where('department_id', '=', '3')->get();
        $preotdoctor = User::where('department_id', '=', '2')->get();
        return view('preot.add',compact('preot','preotpatient','preotdoctor','posttest'));
     
    }

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
              
                $preot=new preot;

                $preot->pre_id = $request['pre_id'];
                $preot->patientpre_name = $request['patientpre_name'];
                $preot->mobile_pre= $request['mobile_pre'];
                $preot->age_pre = $request['age_pre'];
                $preot->doctor_namepre = $request['doctor_namepre'];
                $preot->date_pre = $request['date_pre'];
                $preot->eye_pre = $request['eye_pre'];
                $preot->surgerycategory_pre = $request['surgerycategory_pre'];
                $preot->type_pre = $request['type_pre'];
                $preot->diabeticstatus_pre = $request['diabeticstatus_pre'];
                $preot->package_pre = $request['package_pre'];


                
                $test_pre = implode(",", $request->test_pre);
                $uploaed_pre = implode(",", $request->uploaed_pre);


                $preot->test_pre = $test_pre;
                $preot->uploaed_pre =  $uploaed_pre;  
               
                





// print_r();die();
               
                $resp =  $preot->save();
               
               $request->session()->flash('msg','Save Succesfully');
                return redirect('/preot');

            }
            else{
                return redirect('preot/add')->withErrors($validator)->withInput();

            }
    }

    public function deletepreot($id,Request $request)

    {
        Preot::where('id',$id)->delete();
        $request->session()->flash('msg','Record Has Been Delete Succesfully');
                return redirect('/preot');
        // echo "<pre>";
        // print_r($customer);
        

    }

    public function viewpreots($id)
    {
      
    
        $preot = Preot::find($id);
        $preotpatient = User::where('department_id', '=', '3')->get();
        $preotdoctor = User::where('department_id', '=', '2')->get();
        $eyetype = Preot::all();
        $surgerycategory=Preot::all();
        $typepre=Preot::all();
        $diabeticstatuspre=Preot::all();
        $test=Preot::all();

        return view('preot.view',compact('preot','preotpatient','preotdoctor','eyetype','surgerycategory','diabeticstatuspre','typepre','diabeticstatuspre','test'));
    }



    public function editpreot($id)
    {
      
    
        $preot = Preot::find($id);
        $preotpatient = User::where('department_id', '=', '3')->get();
        $preotdoctor = User::where('department_id', '=', '2')->get();
        $eyetype = Preot::all();
        $surgerycategory=Preot::all();
        $typepre=Preot::all();
        $diabeticstatuspre=Preot::all();
        $test=Preot::all();
        $posttest=Preottest::all();

        return view('preot.edit',compact('preot','preotpatient','preotdoctor','eyetype','surgerycategory','diabeticstatuspre','typepre','diabeticstatuspre','test','posttest'));
    }

    public function updatepreot($id,Request $request)
    {
        $validator = Validator::make($request->all(),[
            // 'patinet_id'=>'required',
            // 'diagnosis' => 'required',
            // 'investigation' => 'required',
            // 'investigation for' => 'required', 
            


        ]);
            if($validator->passes())
            {
                     
              
                $preot = preot::find($id);
                $test_pre = implode(",", $request->test_pre);
                $uploaed_pre = implode(",", $request->uploaed_pre);

                $preot->pre_id = $request['pre_id'];
                $preot->patientpre_name = $request['patientpre_name'];
                $preot->mobile_pre= $request['mobile_pre'];
                $preot->age_pre = $request['age_pre'];
                $preot->doctor_namepre = $request['doctor_namepre'];
                $preot->date_pre = $request['date_pre'];
                $preot->eye_pre = $request['eye_pre'];
                $preot->surgerycategory_pre = $request['surgerycategory_pre'];
                $preot->type_pre = $request['type_pre'];
                $preot->diabeticstatus_pre = $request['diabeticstatus_pre'];
                $preot->package_pre = $request['package_pre'];


                
             


                $preot->test_pre = $test_pre;
                $preot->uploaed_pre =  $uploaed_pre;  
               
                

                $preot->save();
                $request->session()->flash('msg','update Succesfully');
                return redirect('/preot');

            }
            else{
                return redirect('preot/edit/'.$id)->withErrors($validator)->withInput();

            }
        }

       public function showmode($id)
       {
           
        //     $data = DB::table('newdoctoranalysis')
        //     ->where('id', $id)
        //     ->select('*') 
        //     ->first();



        //     if(!empty($data) > 0) {
        //         return response()->json(array('status' => 200, 'data' => $data));
        //     }else {
        //         return response()->json(array('status' => 500, 'msg' => 'Server Error !!! Please try again later.'));
        //     }
           
        //  }

       }

       public function submittestform (Request $request)
        {
           
            $subtests = new Preottest;
            $subtests->testpreots = $request->testpreots;
            $subtests->save();
            if($subtests){
                $gettestpreots = Preottest::all();
            }
            return response()->json(['success'=>'Successfully', 'gettestpreots' => $gettestpreots]);
    
        }


       

 public function preot_fetch(request $request)
                {
                    $preotss =  $request->id;
                    $preot_rates = DB::table('users')
                                ->select('users.*','d.name')
                                ->leftjoin('departments as d','d.id','=','users.department_id')
                                ->where('users.id',$preotss)->get();
                              //  print_r( $preot_rates);die();
                    return $preot_rates;
                }

                
    

        // public function fetch_date(Request $request){
        //     $date = DB::table('newdoctoranalysis')
        //             ->where('patient_id',$request->id)
        //             ->pluck('date_doctoranalysis','id');
        //             // print_r($date); die();
        //             return response()->json($date);
        // }

        // public function fetchpriviouse(Request $request){
        //     $datafetch = DB::table('newdoctoranalysis as n')
          
        //    ->select('n.*', 'p.product_name') 
        //    ->leftjoin('product as p','p.id','=','n.investigation')
        //    ->where('n.id',$request->id)
        //    ->get();
        //    // echo "<pre>";
        //    // print_r($datafetch); die();
        //    return response()->json($datafetch);
        //     // return $datafetch;
           
        // }

      
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


       
}

