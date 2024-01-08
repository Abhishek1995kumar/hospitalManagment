<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pharamacyreturn;
use App\Models\User;
use App\Models\Medicine;
use DB;
use Illuminate\Support\Facades\Validator;


class Pharmacyreturncontroller extends Controller
{
    function show ()
    {
        $pharama = DB::table('pharamacyreturn')->get();
        return view('pharmacyreturn.list')->with(compact('pharama'));
    }
    function add (){
       
        $data['medicinesref'] = DB::table('product')->get();
        return view('pharmacyreturn.add',$data);
    }
    function save (Request $request)
    {
        $validator = Validator::make($request->all(),[
            'accdate' => 'required',
            'billdate' => 'required',
            'billno' => 'required', 
            'vname' => 'required', 
            

        ]);
        if($validator->passes())
        {
                $pharmacyreturn=new pharamacyreturn;

                $mrp = implode(",", $request->mrp);
                $products = implode(",", $request->products);
                $packaging = implode(",", $request->packaging);
                $expire_date = implode(",", $request->expire_date);
                $hsncode = implode(",", $request->hsncode);
                $qty = implode(",", $request->qty);
                $itemamount = implode(",", $request->itemamount);
                
             
                $pharmacyreturn->accdate = $request['accdate'];
                $pharmacyreturn->billno = $request['billno'];
                $pharmacyreturn->vname = $request['vname'];
                $pharmacyreturn->billdate = $request['billdate'];
                $pharmacyreturn->products = $products;
                $pharmacyreturn->packaging = $packaging;                
                $pharmacyreturn->expire_date = $expire_date;                
                $pharmacyreturn->hsncode = $hsncode; 
                $pharmacyreturn->mrp = $mrp ;
                $pharmacyreturn->qty = $qty ;
                $pharmacyreturn->itemamount = $itemamount ;
                $pharmacyreturn->discType  = $request['discType'];
                $pharmacyreturn->discRate = $request['discRate'];
                $pharmacyreturn->discount = $request['discount'];
                $pharmacyreturn->ttlamt = $request['ttlamt'];


                $pharmacyreturn->save();

                $request->session()->flash('msg','Save Succesfully');
                return redirect('/pharmareturn');
            }
            else{
                return redirect('pharmareturn/add')->withErrors($validator)->withInput();

            }

         
    }
    public function editpharma($id)
    {
      
        $pharama = pharamacyreturn::find($id);
       
         $datas['medicinesref'] = DB::table('product')->get();
        $data=compact('pharama'); //variabl
        return view('pharmacyreturn.edit',$datas)->with($data);
       
    }
    
    public function updatepharma($id,Request $request)
    {
        $validator = Validator::make($request->all(),[
            'accdate' => 'required',
            'billdate' => 'required',
            'billno' => 'required', 
            'vname' => 'required', 
           
            

        ]);
            if($validator->passes())
            {
       
                $pharmacyreturn = pharamacyreturn::find($id);
                $mrp = implode(",", $request->mrp);
                $products = implode(",", $request->products);
                $packaging = implode(",", $request->packaging);
                $expire_date = implode(",", $request->expire_date);
                $hsncode = implode(",", $request->hsncode);
                $qty = implode(",", $request->qty);
                $itemamount = implode(",", $request->itemamount);
                
             
                $pharmacyreturn->accdate = $request['accdate'];
                $pharmacyreturn->billno = $request['billno'];
                $pharmacyreturn->vname = $request['vname'];
                $pharmacyreturn->billdate = $request['billdate'];
                $pharmacyreturn->products = $products;
                $pharmacyreturn->packaging = $packaging;                
                $pharmacyreturn->expire_date = $expire_date;                
                $pharmacyreturn->hsncode = $hsncode; 
                $pharmacyreturn->mrp = $mrp ;
                $pharmacyreturn->qty = $qty ;
                $pharmacyreturn->itemamount = $itemamount ;
                $pharmacyreturn->discType  = $request['discType'];
                $pharmacyreturn->discRate = $request['discRate'];
                $pharmacyreturn->discount = $request['discount'];
                $pharmacyreturn->ttlamt = $request['ttlamt'];            
                $pharmacyreturn->save();
                $request->session()->flash('msg','update Succesfully');
                return redirect('/pharmareturn');
            }
            else{
                return redirect('pharmareturn/edit/'.$id)->withErrors($validator)->withInput();
              

            }
             

            
            
        }
        public function deletepharma($id,Request $request)

        {
            pharamacyreturn::where('id',$id)->delete();
            $request->session()->flash('msg','Record Has Been Delete Succesfully');
                    return redirect('/pharmareturn');
            // echo "<pre>";
            // print_r($customer);
            
    
        }
        public function showmode($id)
        {
           
            $phara_data = DB::table('pharamacyreturn')
            ->where('pharamacyreturn.id', $id)
            ->select( 'pharamacyreturn.*') 
            ->get()->toArray();
            // print_r($phara_data);die();
            
           
            $product_array = explode(",", $phara_data[0]->products);
            //  DB::enableQueryLog();
            $pro_name = DB::table('product')
            ->whereIn('product.id', $product_array)
            ->select( 'product.product_name') 
            ->get()->toArray();
            // dd(DB::getQueryLog());die();
            
            
            $product_filter_array = [];
            for($i=0; $i<count($pro_name); $i++){
                array_push($product_filter_array, $pro_name[$i]->product_name);
            }
           
             $phara_data[0]->product_name = implode(",",$product_filter_array);
            
   
            if($phara_data){
                return response()->json([
                    'status'=>"success",
                    'data'=> $phara_data
                ]);

            }else{
                return response()->json([
                    'status'=>"error"
                ]);

            }
        }
        public function Product_price(request $request)
    {
        $test_price =  $request->id;
        $product_rate = DB::table('product')->where('id',$test_price)->get();
        return $product_rate;
    }
}
