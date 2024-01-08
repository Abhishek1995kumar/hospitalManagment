<?php

namespace App\Http\Controllers;
use App\Models\Tpa;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;



class TpaController extends Controller
{
    
    public function show()
    {
        
       

        $tpas = DB::table('tpamaster')
        ->select( 'tpamaster.*','tpapaymentmode.id  as tpaid','tpapaymentmode.paymentmode') 
        ->leftjoin('tpapaymentmode', 'tpamaster.tpapaymentmode', '=', 'tpapaymentmode.id')
        ->orderBy('id', 'DESC')
        ->get();
      
      
       

        return view('tpa.index')->with(compact('tpas'));
         
       
    }

    
    public function create()
    {
        $pharamaone = DB::table('tpapaymentmode')->get();


        return view('tpa.create', compact('pharamaone'));
     
    }

   
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'tpapaymentmode' => 'required',
            'tpapaymenttype' => 'required',
         ]);
        if($validator->passes())
        {
       
                $tpaa=new Tpa;
               
                $tpaa->tpapaymentmode  = $request['tpapaymentmode'];
                $tpaa->tpapaymenttype = $request['tpapaymenttype'];
                $tpaa->save();
               
                 $request->session()->flash('msg','Save Succesfully');
                return redirect('/tpamaster');
            }
            else{
                return redirect('tpamaster/add')->withErrors($validator)->withInput();

            } 
    }

   
   
   
   

   
    public function deletetpa($id,Request $request)

    {
        Tpa::where('id',$id)->delete();
        $request->session()->flash('msg','Record Has Been Delete Succesfully');
                return redirect('/tpamaster');
        
        

    }

    
   
}
