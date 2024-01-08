<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Hospitalinvoice;
use App\Models\User;
use App\Models\Tpa;
use App\Models\product;
use App\Models\Categ;
use Illuminate\Support\Facades\Validator;
use DB;



class HospitalinvoiceController extends Controller
{
    
    public function index()
    {
        $contacts = DB::table('hospitalinvoice')
        ->select( 'hospitalinvoice.*','patient.first_name','patient.last_name','doctor.first_name as df_name','doctor.last_name as dl_name') 
        ->join('users as patient', 'hospitalinvoice.patientname', '=', 'patient.id')
        ->leftjoin('users as doctor', 'hospitalinvoice.doctorname', '=', 'doctor.id')
        ->get();

        return view('hospitalinvoice.index')->with(compact('contacts'));
              
    }


    public function Product_price(request $request){
        $test_price =  $request->id;
        $product_rate = DB::table('product')->where('id',$test_price)->get();
        return $product_rate;
    }
   

    public function create() {
        $doctorref = User::where('department_id', '=', '2')->get();
        $patientref = User::where('department_id', '=', '3')->get();
        
        $paymentpaymode= Tpa::all();
        $product=product::all();
       
        $vcateg = DB::table('categ')->get();
        $pharama = DB::table('tpapaymentmode')
        ->select( 'tpapaymentmode.*','tpamaster.tpapaymentmode','tpamaster.tpapaymenttype',) 
        ->join('tpamaster', 'tpapaymentmode.id', '=', 'tpamaster.tpapaymentmode')
        ->groupBy('tpamaster.tpapaymentmode')
        ->get();

        $lastId = Hospitalinvoice::latest('id')->first()->id+1;

        if($lastId < 10)
        {
            $lastId =  "00".$lastId;
            
        }
        elseif($lastId > 9 && $lastId < 99)
        {
            $lastId =  "0".$lastId;
           
        }
        
         // echo "<pre>";
        // print_r( r$paymentpaymode);die();
        // echo "</pe>";
        return view('hospitalinvoice.create', compact('doctorref','patientref','paymentpaymode','product','vcateg','pharama','lastId'));
    }

    

    public function get_pay_mode(Request $request) {
        $states = DB::table("tpamaster")
        ->where("tpapaymentmode",$request->tpapaymentmode)
        ->pluck("tpapaymenttype","id");
        return response()->json($states);
    }

    
    public function store(Request $request)
    {

       
        $hospitalinvoice = new Hospitalinvoice;
        
        $hospitalinvoice->mr_discharge_date  = $request['mr_discharge_date'];
        $hospitalinvoice->mr_admission_date  = $request['mr_admission_date'];
        $hospitalinvoice->doctorname  = $request['doctorname'];
        $hospitalinvoice->patientname  = $request['patientname'];
        $hospitalinvoice->selecttype = $request['selecttype'];
        $hospitalinvoice->roomtype   = $request['roomtype'];
        $hospitalinvoice->paymenttype   = $request['paymenttype'];
        $hospitalinvoice->payment_amount   = $request['payment_amount'];
        $hospitalinvoice->procedure   = $request['procedure'];
        $hospitalinvoice->details  = $request['details'];
        $hospitalinvoice->patienttype  = $request['patienttype'];
        $hospitalinvoice->paymenttypeone  = $request['paymenttypeone'];
        $hospitalinvoice->category  = $request['category'];
        $hospitalinvoice->subcategory  = $request['subcategory'];
        $hospitalinvoice->discType  = $request['discType'];
        $hospitalinvoice->discRate  = $request['discRate'];
        $hospitalinvoice->discount  = $request['discount'];
        $hospitalinvoice->invoice_no  = $request['invoice_no'];


        
        $productname = implode(",", $request->productname);
        $qty = implode(",", $request->qty);
      
        $price = implode(",", $request->price);
        $hospitalinvoice->ttlamt  = $request['ttlamt'];
        $payment_paymode = implode(",", $request->payment_paymode);
        $payment_pay = implode(",", $request->payment_pay);
        $paymentdate = implode(",", $request->paymentdate);
        $paymentremark = implode(",", $request->paymentremark);
        $amount = implode(",", $request->amount);
        $mrp = implode(",", $request->mrp);

        $hospitalinvoice->productname = $productname; 
        $hospitalinvoice->qty = $qty;
      
        $hospitalinvoice->price = $price; 
        $hospitalinvoice->payment_paymode = $payment_paymode; 
        $hospitalinvoice->payment_pay = $payment_pay; 
        $hospitalinvoice->paymentdate = $paymentdate; 
        $hospitalinvoice->paymentremark = $paymentremark; 
        $hospitalinvoice->amount = $amount; 
        
        $hospitalinvoice->mrp = $mrp; 


        $hospitalinvoice->paidamt  = $request['paidamt'];
        $hospitalinvoice->save();

        

        return redirect('hospitalinvoice')->with('flash_message', 'Contact Addedd!'); 

    }

   
    public function show($id){
        $contacts = Hospitalinvoice::find($id);
        return view('hospitalinvoice.show')->with(compact('contacts'));
    }


    public function edit($id) {
        $contacts = Hospitalinvoice::find($id);
        $doctorref = User::where('department_id', '=', '2')->get();
        
        $patientref = User::where('department_id', '=', '3')->get();
        $data = Hospitalinvoice::all();
        $dataone= Hospitalinvoice::all();
        $datapatienttype= Hospitalinvoice::all();
        $paymenttypeone=Hospitalinvoice::all();
        $paymentpaymode=Tpa::all();
        $product=product::all();
        $categ=Categ::all();
        $subcateg = DB::table('subcategory')->get();
        $vcateg = DB::table('categ')->get();
        $pharama = DB::table('tpapaymentmode')
        ->select( 'tpapaymentmode.*','tpamaster.tpapaymentmode','tpamaster.tpapaymenttype',) 
        ->join('tpamaster', 'tpapaymentmode.id', '=', 'tpamaster.tpapaymentmode')
        ->groupBy('tpamaster.tpapaymentmode')
        ->get();
        $paymentpay= DB::table('tpamaster')->get();
        return view('hospitalinvoice.edit')->with(compact('contacts','doctorref','data','patientref','dataone','datapatienttype','paymenttypeone','paymentpaymode','product','categ','vcateg','subcateg','pharama','paymentpay'));
    }

    
    public function update(Request $request, $id) {
        $hospitalinvoice = Hospitalinvoice::find($id);
        $hospitalinvoice->mr_discharge_date  = $request['mr_discharge_date'];
        $hospitalinvoice->mr_admission_date  = $request['mr_admission_date'];
        $hospitalinvoice->doctorname  = $request['doctorname'];
        $hospitalinvoice->patientname  = $request['patientname'];
        $hospitalinvoice->selecttype = $request['selecttype'];
        $hospitalinvoice->roomtype   = $request['roomtype'];
        $hospitalinvoice->paymenttype   = $request['paymenttype'];
        $hospitalinvoice->payment_amount   = $request['payment_amount'];
        $hospitalinvoice->procedure   = $request['procedure'];
        $hospitalinvoice->details  = $request['details'];
        $hospitalinvoice->patienttype  = $request['patienttype'];
        $hospitalinvoice->paymenttypeone  = $request['paymenttypeone'];
        $hospitalinvoice->category  = $request['category'];
        $hospitalinvoice->subcategory  = $request['subcategory'];
        $hospitalinvoice->discType  = $request['discType'];
        $hospitalinvoice->discRate  = $request['discRate'];
        $hospitalinvoice->discount  = $request['discount'];
        $productname = implode(",", $request->productname);
         $mrp = implode(",", $request->mrp);
      
        $price = implode(",", $request->price);
        $hospitalinvoice->ttlamt  = $request['ttlamt'];
        $payment_paymode = implode(",", $request->payment_paymode);
        $payment_pay = implode(",", $request->payment_pay);
        $paymentdate = implode(",", $request->paymentdate);
        $paymentremark = implode(",", $request->paymentremark);
        $amount = implode(",", $request->amount);
        $qty = implode(",", $request->qty);
        $hospitalinvoice->productname = $productname;
        $hospitalinvoice->price = $price; 
        $hospitalinvoice->payment_paymode = $payment_paymode; 
        $hospitalinvoice->payment_pay = $payment_pay; 
        $hospitalinvoice->paymentdate = $paymentdate; 
        $hospitalinvoice->paymentremark = $paymentremark; 
        $hospitalinvoice->amount = $amount; 
        $hospitalinvoice->mrp = $mrp; 
        $hospitalinvoice->qty = $qty; 
        $hospitalinvoice->paidamt  = $request['paidamt'];
        $hospitalinvoice->save();
        return redirect('hospitalinvoice')->with('flash_message', 'Contact Updated!'); 
    }

   
    public function destroy($id) {
        Hospitalinvoice::destroy($id);
        return redirect('hospitalinvoice')->with('flash_message', 'Contact deleted!');  
    }

   

    public function fetch_sub_cat(Request $request){
        $data = DB::table('subcategory')
        ->where('category',$request->category)
        ->pluck('subcat_name','subcat_id');
        return response()->json($data);
        // print_r($data); die();
    }



    public function showmode($id) {
        $hos_data = DB::table('hospitalinvoice as h')
        ->where('h.id', $id)
        ->select('h.*','p.first_name as pf_name','p.last_name as pl_name','d.first_name as df_name','d.last_name as dl_name'
        ,'tpapaymentmode.id as pmodeid','tpapaymentmode.paymentmode as pmode_name') 
        
        ->join('users as p', 'h.patientname', '=', 'p.id')
        
        ->leftjoin('users as d', 'h.doctorname', '=', 'd.id')
        ->leftjoin('tpapaymentmode', 'h.payment_paymode', '=', 'tpapaymentmode.id')
        
        ->get()->toArray();

        $product_array = explode(",", $hos_data[0]->productname);
        //  DB::enableQueryLog();
        $pro_name = DB::table('product')
        ->whereIn('product.id', $product_array)
        ->select( 'product.product_name') 
        ->get()->toArray();

        $product_filter_array = [];
        for($i=0; $i<count($pro_name); $i++){
            array_push($product_filter_array, $pro_name[$i]->product_name);
        }
        $hos_data[0]->product_name = implode(",",$product_filter_array);
        
        if($hos_data){
            return response()->json([
                'status'=>"success",
                'data'=> $hos_data
            ]);

        }else{
            return response()->json([
                'status'=>"error"
            ]);

        }
    }


    public function payyshowmode($id){
        $pharapay_data = DB::table('hospitalinvoice')
        ->where('hospitalinvoice.id', $id)
        ->select( 'hospitalinvoice.*') 
        ->get()->toArray();
        $paymode_array = explode(",", $pharapay_data[0]->payment_paymode);
        $paymaster_array = explode(",", $pharapay_data[0]->payment_pay);


        $paymentm_name = DB::table('tpapaymentmode')
        ->whereIn('tpapaymentmode.id', $paymode_array)
        ->select( 'tpapaymentmode.paymentmode') 
        ->get()->toArray();
        // print_r($paymentm_name);die();

        $paymaster_name = DB::table('tpamaster')
        ->whereIn('tpamaster.id', $paymaster_array)
        ->select( 'tpamaster.tpapaymenttype') 
        ->get()->toArray();
        // print_r($paymaster_name);die();

        $paymode_filter_array = [];
        for($i=0; $i<count($paymentm_name); $i++){
            array_push($paymode_filter_array, $paymentm_name[$i]->paymentmode);
        }
        

        $paymaster_filter_array = [];
        for($i=0; $i<count($paymaster_name); $i++){
            array_push($paymaster_filter_array, $paymaster_name[$i]->tpapaymenttype);
        }


        $pharapay_data[0]->paymentmode = implode(",",$paymode_filter_array);

        $pharapay_data[0]->tpapaymenttype = implode(",",$paymaster_filter_array);

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

    
}
