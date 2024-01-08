<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Models\Payrollmaster;
use Illuminate\Support\Facades\Validator;


class PayrollmasterController extends Controller
{
    function show () {
        $payroll = Payrollmaster::all();
        return view('payrollmaster.list')->with(compact('payroll'));  
    }
    function create (){

        $userref = DB::table('users')->get();
        $lastId = Payrollmaster::latest('id')->first()->id+1;

        if($lastId < 10)
        {
            $lastId =  "00".$lastId;
            
        }
        elseif($lastId > 9 && $lastId < 99)
        {
            $lastId =  "0".$lastId;
           
        }

        return view('payrollmaster.create', compact('lastId','userref'));
      
      
    }
   
 function save (Request $request)
    {
        $validator = Validator::make($request->all(),[
          
            // 'payroll_id' => 'required',
            // 'role' => 'required',
            // 'employee_id' => 'required',
            // 'employee' => 'required',
            // 'status' => 'required',
            ]);
        if($validator->passes())
        {
       
            $payroll=new Payrollmaster;
                
            //    $payroll->sr_no  = $request['sr_no'];
               $payroll->payrollno  = $request['payrollno'];
               
               $payroll->payroll_id = $request['payroll_id'];
            //    $payroll->role = $request['role'];
                $payroll->employee_id = $request['employee_id'];
                $payroll->employee = $request['employee'];
                $payroll->employeedepartment = $request['employeedepartment'];
                
                $payroll->status = $request['status'];
                $payroll->basic = $request['basic'];
                $payroll->hra = $request['hra'];
                $payroll->gross_salary = $request['gross_salary'];

                
                $payroll->pf_employee_contro = $request['pf_employee_contro'];

                $payroll->esic_employee_contro = $request['esic_employee_contro'];
                $payroll->pt = $request['pt'];
                $payroll->total_deduction	 = $request['total_deduction'];
                $payroll->net_salary = $request['net_salary'];
                $payroll->employer_contro_pf = $request['employer_contro_pf'];
                $payroll->employer_contro_esic = $request['employer_contro_esic'];
                $payroll->mediclaim_benefit = $request['mediclaim_benefit'];
                $payroll->ctc = $request['ctc'];
                $payroll->ctc_payroll = $request['ctc_payroll'];
                $payroll->month = $request['month'];
                $payroll->total_working_day = $request['total_working_day'];
                $payroll->per_day_salary = $request['per_day_salary'];
                $payroll-> total_present_day = $request['total_present_day'];
                $payroll-> total_absent_day = $request['total_absent_day'];
                $payroll->salary = $request['salary'];
                $payroll->incentive_bonus = $request['incentive_bonus'];
                $payroll->conveyance_allowance = $request['conveyance_allowance'];
                $payroll->medical_allowance = $request['medical_allowance'];
                $payroll->rent_by_company = $request['rent_by_company'];
                $payroll->net_payable = $request['net_payable'];

                $payroll->save();
               
                $request->session()->flash('msg','Save Succesfully');
                return redirect('/payrollmaster');


            }
            else{
                return redirect('payrollmaster/create')->withErrors($validator)->withInput();

            }
        }
          
        public function editpayrollmaster($id)
            {
                $payroll = Payrollmaster::find($id);
                $data=compact('payroll'); 
                return view('payrollmaster.edit')->with($data);
            }
            
            public function updatepayrollmaster($id,Request $request)
            {
                $validator = Validator::make($request->all(),[
                 
                    // 'payroll_id' => 'required',
                    // 'role' => 'required',
                    // 'employee_id' => 'required',
                    // 'employee' => 'required',
                    // 'status' => 'required',
                    ]);
                if($validator->passes())
                {
            
                    $payroll = Payrollmaster::find($id);
                    // $payroll->sr_no  = $request['sr_no'];
                    $payroll->payroll_id = $request['payroll_id'];
                    //   $payroll->role = $request['role'];
                     $payroll->employee_id = $request['employee_id'];
                     $payroll->employee = $request['employee'];
                     $payroll->employeedepartment = $request['employeedepartment'];
                     $payroll->status = $request['status'];
                     $payroll->basic = $request['basic'];
                     $payroll->hra = $request['hra'];
                     $payroll->gross_salary = $request['gross_salary'];
                     
                     $payroll->pf_employee_contro = $request['pf_employee_contro'];
     
                     $payroll->esic_employee_contro = $request['esic_employee_contro'];
                     $payroll->pt = $request['pt'];
                     $payroll->total_deduction	 = $request['total_deduction'];
                     $payroll->net_salary = $request['net_salary'];
                     $payroll->employer_contro_pf = $request['employer_contro_pf'];
                     $payroll->employer_contro_esic = $request['employer_contro_esic'];
                     $payroll->mediclaim_benefit = $request['mediclaim_benefit'];
                     $payroll->ctc = $request['ctc'];
                     $payroll->ctc_payroll = $request['ctc_payroll'];
                     
                     $payroll->month = $request['month'];
                     $payroll->total_working_day = $request['total_working_day'];
                     $payroll->per_day_salary = $request['per_day_salary'];
                     $payroll-> total_present_day = $request['total_present_day'];
                     $payroll-> total_absent_day = $request['total_absent_day'];
                     $payroll->salary = $request['salary'];
                     $payroll->incentive_bonus = $request['incentive_bonus'];
                     $payroll->conveyance_allowance = $request['conveyance_allowance'];
                     $payroll->medical_allowance = $request['medical_allowance'];
                     $payroll->rent_by_company = $request['rent_by_company'];
                     $payroll->net_payable = $request['net_payable'];
                     $payroll->save();
               
                 $request->session()->flash('msg','Updated Succesfully');
                return redirect('/payrollmaster');
                }
                else{
                    return redirect('payrollmaster/edit/'.$id)->withErrors($validator)->withInput();
    
                }
             }
                
             public function deletepayrollmaster($id,Request $request)

                {
                    Payrollmaster::where('id',$id)->delete();
                    $request->session()->flash('msg','Record Has Been Delete Succesfully');
                            return redirect('/payrollmaster');
                    // echo "<pre>";
                    // print_r($customer);
                    
            
                }

                public function Payroll_price(request $request)
                {
                    $payy_price =  $request->id;
                    $payroll_rate = DB::table('users')
                                ->select('users.*','d.name')
                                ->leftjoin('departments as d','d.id','=','users.department_id')
                                ->where('users.id',$payy_price)->get();
                    return $payroll_rate;
                }


    public function showmode($id)
    {
        $data = DB::table('payroll')
        ->where('id', $id)
        ->select('*') 
        ->get();
        
        //print_r($data); die();
         return response()->json($data);

      
    }


   

                
}
