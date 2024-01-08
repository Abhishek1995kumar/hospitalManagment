<?php

namespace App\Http\Controllers;
use App\Models\pharmacybill;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Medicine;
use App\Models\Preot;
use App\Models\PaymentAdv;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
class PaymentAdvController extends Controller
{

    public function PaymentAdv(){
        return $this->belongsTo('App\Models\PaymentAdv');
    }

    public function show(){
        $paymentadvs=DB::table('paymentadv')
        ->select('paymentadv.*', 'patient.first_name', 'patient.last_name')
        ->join('users as patient', 'paymentadv.patientpaymentadv_name', '=', 'patient.id')
        ->get();
        return view('paymentadv.list')->with(compact('paymentadvs'));

    }

    public function add() {
        $paymentadvs=PaymentAdv::all();
        $patientpaymentadv=User::where('department_id', '=', '3')->get();
        $lastId = PaymentAdv::latest('id')->first()->id+1;

        if($lastId < 10){
            $lastId='00'.$lastId;
        }
        elseif($lastId > 9 && $lastId < 99){
            $lastId='0'.$lastId;
        }

        return view('paymentadv.add')->with(compact('paymentadvs', 'patientpaymentadv', 'lastId'));
    }


    public function save(Request $request) {
        $adminid = Auth::id();
        $timing = now()->toTimeString();

        $validator = Validator::make($request->all(),[ ]);

        if($validator->passes()){

            $paymentadvs=new PaymentAdv;
            $paymentadvs->patientpaymentadv_name = $request['patientpaymentadv_name'];
            $paymentadvs->receiptpaymentadv_name = $request['receiptpaymentadv_name'];
            $paymentadvs->ammount_paymentadv = $request['ammount_paymentadv'];
            $paymentadvs->date = $request['date'];
            $paymentadvs->created_by = $adminid;
            $paymentadvs->timing = $timing;

            $resp = $paymentadvs->save();
            $request->session()->flash('msg','Save Succesfully');
            return redirect('/paymentadv');
        }
        else{
            return redirect('paymentadv/add')->withErrors($validator)->withInput();
        }
    }



    public function paymentadv_data($id){
        $data = DB::table('paymentadv')
        ->where('paymentadv.id', $id)
        ->select('paymentadv.*',DB::raw("CONCAT(users.first_name,' ',users.last_name) as full_name"),DB::raw("CONCAT(p.first_name,' ',p.last_name) as patient_full_name")) 
        ->leftjoin('users', 'paymentadv.created_by', '=', 'users.id')
        ->leftjoin('users as p', 'paymentadv.patientpaymentadv_name', '=', 'p.id')
        ->get();
        // print_r($data); die();
        return response()->json($data);
        // return view('securitydeposite.list')->with(compact('data'));
    }



    public function editpayment($id) {
        $paymentadvs = PaymentAdv::find($id);
        // $paymentadvs=PaymentAdv::all();
        $patientpaymentadv=User::where('department_id', '=', '3')->get();
        
        return view('paymentadv.edit')->with(compact('paymentadvs', 'patientpaymentadv'));
    }




    public function updatepayment($id, Request $request) {
        $validator = Validator::make($request->all(),[ ]);
            if($validator->passes())
            {
                     
               $paymentadvs = PaymentAdv::find($id);
                $paymentadvs->patientpaymentadv_name = $request['patientpaymentadv_name'];
                $paymentadvs->receiptpaymentadv_name = $request['receiptpaymentadv_name'];
                $paymentadvs->ammount_paymentadv= $request['ammount_paymentadv'];
                $paymentadvs->date = $request['date'];

                $paymentadvs->save();
                $request->session()->flash('msg','update Succesfully');
                return redirect('/paymentadv');

            }
            else{
                return redirect('paymentadv/edit/'.$id)->withErrors($validator)->withInput();

            }
        }




    public function deletepayment($id, Request $request) {
        PaymentAdv::where('id',$id)->delete();
        // echo "<pre>";
        // print_r($id);
        // exit;
        $request->session()->flash('msg','Record Has Been Delete Succesfully');
        return redirect('/paymentadv');
    }

}