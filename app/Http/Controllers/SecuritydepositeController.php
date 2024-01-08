<?php

namespace App\Http\Controllers;
use App\Models\pharmacybill;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Medicine;
use App\Models\Preot;
use App\Models\Securitydeposite;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
class SecuritydepositeController extends Controller
{
    function show ()
    {
       // $securtiydeposite = Securitydeposite::all();

        $securtiydeposite = DB::table('securitydeposite')
        ->select('securitydeposite.*','patient.first_name','patient.last_name') 
        ->join('users as patient', 'securitydeposite.patientsecurity_name', '=', 'patient.id')
        ->get();
        return view('securitydeposite.list')->with(compact('securtiydeposite'));
    }


     function add (){

         $securtiydeposite = Securitydeposite::all();
         $patientsecurity = User::where('department_id', '=', '3')->get();
         $lastId = Securitydeposite::latest('id')->first()->id+1;

         if($lastId < 10)
         {
             $lastId =  "00".$lastId;
             
         }
         elseif($lastId > 9 && $lastId < 99)
         {
             $lastId =  "0".$lastId;
            
         }

         

        return view('securitydeposite.add')->with(compact('securtiydeposite','patientsecurity','lastId'));
     }



    //  public function securtiy_deposit(Request $request)
     
    //     {
          
    //         $deposite = new Securitydeposite;
          
    //         $deposite->patientsecurity_name = $request->pname;
        

    //         $deposite->save();
    //     //  print_r($deposite);
    //       die();
    //         return response()->json(['success'=>'Successfully']);
    //     }

   function save (Request $request)
    {
        $adminid = Auth::id();
        $timing = now()->toTimeString();
       
        $validator = Validator::make($request->all(),[
            // 'patinet_id'=>'required',
            // 'diagnosis' => 'required',
            // 'investigation' => 'required',
            // 'investigation for' => 'required', 
         ]);
            if($validator->passes())
            {
              
                $securtiydeposite=new Securitydeposite;

                $securtiydeposite->patientsecurity_name = $request['patientsecurity_name'];
                $securtiydeposite->receipt_name = $request['receipt_name'];
                $securtiydeposite->ammount_security= $request['ammount_security'];
                $securtiydeposite->date = $request['date'];
                $securtiydeposite->created_by = $adminid;
                $securtiydeposite->timing = $timing;
                // print_r();die();
               
                $resp =  $securtiydeposite->save();
               
               $request->session()->flash('msg','Save Succesfully');
                return redirect('/securitydeposite');

            }
            else{
                return redirect('securitydeposite/add')->withErrors($validator)->withInput();

            }
    }
    public function deletesecurity($id,Request $request)

    {
        Securitydeposite::where('id',$id)->delete();
        $request->session()->flash('msg','Record Has Been Delete Succesfully');
                return redirect('/securitydeposite');
        // echo "<pre>";
        // print_r($customer);
    }

    public function securitydepositss_data($id)
    {
        // $data = DB::table('securitydeposite')
        // ->where('id', $id)
        // ->select('*') 
        // ->get();


        $data = DB::table('securitydeposite')
        ->where('securitydeposite.id', $id)
        ->select('securitydeposite.*',DB::raw("CONCAT(users.first_name,' ',users.last_name) as full_name")) 
        ->leftjoin('users', 'securitydeposite.created_by', '=', 'users.id')
        ->get();
        
        // print_r($data); die();
         return response()->json($data);

      
    }


    // public function viewpreots($id)
    // {
      
    //     $preot = Preot::find($id);
    //     $preotpatient = User::where('department_id', '=', '3')->get();
    //     $preotdoctor = User::where('department_id', '=', '2')->get();
    //     $eyetype = Preot::all();
    //     $surgerycategory=Preot::all();
    //     $typepre=Preot::all();
    //     $diabeticstatuspre=Preot::all();
    //     $test=Preot::all();

    //     return view('preot.view',compact('preot','preotpatient','preotdoctor','eyetype','surgerycategory','diabeticstatuspre','typepre','diabeticstatuspre','test'));
    // }
    public function editsecurity($id)
    {
      
        $securtiydeposite = Securitydeposite::find($id);
        $patientsecurity = User::where('department_id', '=', '3')->get();
       //$securtiydeposite = Securitydeposite::all();
       
         return view('securitydeposite.edit',compact('securtiydeposite','patientsecurity'));
    }

    public function updatesecurity($id,Request $request)
    {
        $validator = Validator::make($request->all(),[
            // 'patinet_id'=>'required',
            // 'diagnosis' => 'required',
            // 'investigation' => 'required',
            // 'investigation for' => 'required', 
            
 ]);
            if($validator->passes())
            {
                     
               $securtiydeposite = Securitydeposite::find($id);
               //$securtiydeposite=new Securitydeposite;

                $securtiydeposite->patientsecurity_name = $request['patientsecurity_name'];
                $securtiydeposite->receipt_name = $request['receipt_name'];
                $securtiydeposite->ammount_security= $request['ammount_security'];
                $securtiydeposite->date = $request['date'];

                $securtiydeposite->save();
                $request->session()->flash('msg','update Succesfully');
                return redirect('/securitydeposite');

            }
            else{
                return redirect('securitydeposite/edit/'.$id)->withErrors($validator)->withInput();

            }
        }

     }

