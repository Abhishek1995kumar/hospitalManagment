<?php

namespace App\Http\Controllers;
use App\Models\pharmacybill;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Medicine;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
// use App\Http\Controllers\Session;
use Session;
class PharmacybilController extends Controller
{
    function show ()
    {
        $pharama = DB::table('pharmacybills')
        ->select( 'pharmacybills.*','patient.first_name','patient.last_name','doctor.first_name as df_name','doctor.last_name as dl_name') 
        ->join('users as patient', 'pharmacybills.pname', '=', 'patient.id')
        ->leftjoin('users as doctor', 'pharmacybills.dname', '=', 'doctor.id')
        ->get();

              
        
        



        // $pharama = DB::table('pharmacybills')->orderBy('id','DESC')->get();
        return view('pharmacybill.list')->with(compact('pharama'));
    }
    function add (){
        $patientref = User::where('department_id', '=', '3')->get();
        $doctorref = User::where('department_id', '=', '2')->get();
        $paymentref = DB::table('payment_method')->get();
        $data['medicinesref'] = DB::table('product')->get();
        $lastId = pharmacybill::latest('id')->first()->id+1;

        if($lastId < 10)
        {
            $lastId =  "00".$lastId;
            
        }
        elseif($lastId > 9 && $lastId < 99)
        {
            $lastId =  "0".$lastId;
           
        }
       
       
        return view('pharmacybill.add',$data, compact('patientref','doctorref','paymentref','lastId'));
    }
    function save (Request $request)
    {
      
//         $value = session()->all();
// // $value = Session::get('url');

$adminid = Auth::id();
$timing = now()->toTimeString();
// print_r($id);
// die();
        $validator = Validator::make($request->all(),[
            'billdate' => 'required',
            'pname' => 'required',
            'dname' => 'required', 
            'patientType' => 'required', 
            'bill_no' => 'required', 
            'details' => 'required', 
            

        ]);
            if($validator->passes())
            {
              
                $pharmacybill=new pharmacybill;

                $mrp = implode(",", $request->mrp);
                $products = implode(",", $request->products);
                $packaging = implode(",", $request->packaging);
                $expire_date = implode(",", $request->expire_date);
                $hsncode = implode(",", $request->hsncode);
                $qty = implode(",", $request->qty);
                $itemamount = implode(",", $request->itemamount);
                $payment_paymode = implode(",", $request->payment_paymode);
                $paymentdate = implode(",", $request->paymentdate);
                $paymentremark = implode(",", $request->paymentremark);
                $amount = implode(",", $request->amount);
             
                $pharmacybill->billdate = $request['billdate'];
                 $pharmacybill->pname = $request['pname'];
                $pharmacybill->dname = $request['dname'];
                $pharmacybill->patientType = $request['patientType'];
                $pharmacybill->details = $request['details'];
                $pharmacybill->bill_no = $request['bill_no'];
                $pharmacybill->products = $products;
                $pharmacybill->packaging = $packaging;                
                $pharmacybill->expire_date = $expire_date;                
                $pharmacybill->hsncode = $hsncode; 
                $pharmacybill->mrp = $mrp ;
                $pharmacybill->qty = $qty ;
                $pharmacybill->itemamount = $itemamount ;
                $pharmacybill->discType  = $request['discType'];
                $pharmacybill->discRate = $request['discRate'];
                $pharmacybill->discount = $request['discount'];
                $pharmacybill->ttlamt = $request['ttlamt'];
                $pharmacybill->payment_paymode = $payment_paymode ;
                $pharmacybill->paymentdate = $paymentdate ;
                $pharmacybill->paymentremark = $paymentremark ;
                $pharmacybill->amount = $amount ;
                $pharmacybill->paidamt = $request['paidamt'];
                $pharmacybill->created_by = $adminid;
                $pharmacybill->timing = $timing;

                // print_r();die();
               
                $resp = $pharmacybill->save();
               
              
               

                $request->session()->flash('msg','Save Succesfully');
                return redirect('/pharma');

            }
            else{
                return redirect('pharma/add')->withErrors($validator)->withInput();

            }
    }
    public function deletepharma($id,Request $request)

    {
        pharmacybill::where('id',$id)->delete();
        $request->session()->flash('msg','Record Has Been Delete Succesfully');
                return redirect('/pharma');
        // echo "<pre>";
        // print_r($customer);
        

    }
    public function editpharma($id)
    {
      
        $pharama = pharmacybill::find($id);
        $patientref = User::where('department_id', '=', '3')->get();
        $doctorref = User::where('department_id', '=', '2')->get();
        $paymentref = DB::table('payment_method')->get();
        $datas['medicinesref'] = DB::table('product')->get();
        $data=compact('pharama','patientref','doctorref','paymentref'); //variabl
        return view('pharmacybill.edit',$datas)->with($data);
        // $pharmacybill = pharmacybill::find($id); //table_name
        // $data=compact('pharmacybill'); //variabl
        //  return view('pharmacybill.edit')->with(compact('pharama'));
    }

    public function updatepharma($id,Request $request)
    {
        $validator = Validator::make($request->all(),[
            'billdate' => 'required',
            'pname' => 'required',
            'dname' => 'required', 
            'patientType' => 'required', 
            'bill_no' => 'required', 
            'details' => 'required', 
            


        ]);
            if($validator->passes())
            {
                $pharmacybill = pharmacybill::find($id);
                $mrp = implode(",", $request->mrp);
                $products = implode(",", $request->products);
                $packaging = implode(",", $request->packaging);
                $expire_date = implode(",", $request->expire_date);
                $hsncode = implode(",", $request->hsncode);
                $qty = implode(",", $request->qty);
                $itemamount = implode(",", $request->itemamount);
                $payment_paymode = implode(",", $request->payment_paymode);
                $paymentdate = implode(",", $request->paymentdate);
                $paymentremark = implode(",", $request->paymentremark);
                $amount = implode(",", $request->amount);
             
                $pharmacybill->billdate = $request['billdate'];
                 $pharmacybill->pname = $request['pname'];
                $pharmacybill->dname = $request['dname'];
                $pharmacybill->patientType = $request['patientType'];
                $pharmacybill->details = $request['details'];
                $pharmacybill->bill_no = $request['bill_no'];
                $pharmacybill->products = $products;
                $pharmacybill->packaging = $packaging;                
                $pharmacybill->expire_date = $expire_date;                
                $pharmacybill->hsncode = $hsncode; 
                $pharmacybill->mrp = $mrp ;
                $pharmacybill->qty = $qty ;
                $pharmacybill->itemamount = $itemamount ;
                $pharmacybill->discType  = $request['discType'];
                $pharmacybill->discRate = $request['discRate'];
                $pharmacybill->discount = $request['discount'];
                $pharmacybill->ttlamt = $request['ttlamt'];
                $pharmacybill->payment_paymode = $payment_paymode ;
                $pharmacybill->paymentdate = $paymentdate ;
                $pharmacybill->paymentremark = $paymentremark ;
                $pharmacybill->amount = $amount ;
                $pharmacybill->paidamt = $request['paidamt'];

                $pharmacybill->save();
                $request->session()->flash('msg','update Succesfully');
                return redirect('/pharma');

            }
            else{
                return redirect('pharma/edit/'.$id)->withErrors($validator)->withInput();

            }
        }
        // public function viewmodel($id)
        // {
        //     $student = pharmacybill::find($id);
        //     return response()->json([
        //         'status'=>200,
        //         'student'=>$student,
        //     ]);
        // }
        public function viewmodel($id)
        {
          
            $pharama = pharmacybill::find($id);
            $patientref = User::where('department_id', '=', '3')->get();
                    $doctorref = User::where('department_id', '=', '2')->get();
    
            $data=compact('pharama','patientref','doctorref'); //variabl
            return view('pharmacybill.view')->with($data);
            // $pharmacybill = pharmacybill::find($id); //table_name
            // $data=compact('pharmacybill'); //variabl
            //  return view('pharmacybill.edit')->with(compact('pharama'));
        }
        public function showmode($id)
        {
       
            // print_r($id);die();
            // $pharama = pharmacybill::find($id);
            // $patientref = User::where('department_id', '=', '3')->get();
            // $doctorref = User::where('department_id', '=', '2')->get();

            // $data = compact('pharama','patientref','doctorref'); //variabl
            // $data view('pharmacybill.view')->with($data);
            
           

            $pharm_data = DB::table('pharmacybills')
            ->where('pharmacybills.id', $id)
            ->select( 'pharmacybills.*','patient.first_name','patient.last_name','doctor.first_name as df_name','doctor.last_name as dl_name') 
            ->join('users as patient', 'pharmacybills.pname', '=', 'patient.id')
            ->leftjoin('users as doctor', 'pharmacybills.dname', '=', 'doctor.id')
            
            ->get()->toArray();
            
         
           
             $product_array = explode(",", $pharm_data[0]->products);
           
             $pro_name = DB::table('product')
             ->whereIn('product.id', $product_array)
             ->select( 'product.product_name','erp_taxcode.taxcode_percentage') 
            ->leftjoin('erp_hsncode', 'erp_hsncode.hsn_id', '=', 'product.hsnno')
            ->leftjoin('erp_taxcode', 'erp_taxcode.taxcode_id', '=', 'erp_hsncode.hsn_intrataxcode')
             ->get()->toArray();
            
             $product_filter_array = [];
             $product_taxcode_array = []; 
             for($i=0; $i<count($pro_name); $i++){
                 array_push($product_filter_array, $pro_name[$i]->product_name);
                 array_push($product_taxcode_array, $pro_name[$i]->taxcode_percentage);
             }
             
             $pharm_data[0]->product_name = implode(",",$product_filter_array);
             $pharm_data[0]->product_taxcode = implode(",",$product_taxcode_array);
            
            if($pharm_data){
                return response()->json([
                    'status'=>"success",
                    'data'=> $pharm_data
                ]);

            }else{
                return response()->json([
                    'status'=>"error"
                ]);

            }
        }
        
        public function payshowmode($id)
        { 
         
            $pharapay_data = DB::table('pharmacybills')
            ->where('pharmacybills.id', $id)
            ->select( 'pharmacybills.*','users.id', DB::raw("CONCAT(users.first_name,' ',users.last_name) as full_name")) 
            ->leftjoin('users', 'pharmacybills.created_by', '=', 'users.id')
            ->get()->toArray();
           
          
            
         
            $paymode_array = explode(",", $pharapay_data[0]->payment_paymode);

            $paymentm_name = DB::table('payment_method')
            ->whereIn('payment_method.id', $paymode_array)
            ->select( 'payment_method.payment_name') 
            ->get()->toArray();

            $paymode_filter_array = [];
            for($i=0; $i<count($paymentm_name); $i++){
                array_push($paymode_filter_array, $paymentm_name[$i]->payment_name);
            }
            $pharapay_data[0]->payment_name = implode(",",$paymode_filter_array);
          

           
            if($pharapay_data){
                return response()->json([
                    'status'=>"success",
                    'data'=> $pharapay_data
                ]);
    
            }else{
                return response()->json([
                    'status'=>"error"
                ]);
    
            }

        }

        public function Product_price(request $request)
        {
            // $test_price =  $request->id;
            // $product_rate = DB::table('product')
            // ->where('id',$test_price)
            // ->get();
            // return $product_rate;
              $test_price =  $request->id;
            $product_rate = DB::table('product')
            ->where('id',$test_price)
            ->select( 'product.*','erp_hsncode.hsn_name','erp_hsncode.hsn_id') 
            ->leftjoin('erp_hsncode', 'product.hsnno', '=', 'erp_hsncode.hsn_id')
            ->get();
            return $product_rate;




        //     $medicinesref = DB::table('product')
        // ->select( 'product.*','erp_hsncode.hsn_name','erp_hsncode.hsn_id') 
        // ->leftjoin('erp_hsncode', 'product.hsnno', '=', 'erp_hsncode.hsn_id')
        // ->get();

        }
       
}
