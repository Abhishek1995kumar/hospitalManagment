<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Vendorregstration;
use Illuminate\Support\Facades\Validator;

class Vendorregstrationcontroller extends Controller
{
    function show ()
    {
       $vendordata = DB::table('vendorre')
        ->select( 'vendorre.*','vendorre.id as vendor_id','countries.name','countries.id','states.name as statename','states.id','cities.name as cityname','cities.id') 
         ->leftjoin('countries', 'vendorre.country', '=', 'countries.id')
         ->leftjoin('states', 'vendorre.state', '=', 'states.id')
         ->leftjoin('cities', 'vendorre.city', '=', 'cities.id')
        ->get();
        return view('vendorreg.list')->with(compact('vendordata'));
        
    }
    function create (){
        $country = DB::table('countries')->get();
        $lastId = Vendorregstration::latest('id')->first()->id+1;
        $vcateg = DB::table('categ')->get();
        // echo "<pre>";
 

        // print_r($lastId);die();
        // echo "</pre>";
        return view('vendorreg.create',compact('country','lastId','vcateg'));
    }
    public function get_state(Request $request)
    {
        $states = DB::table("states")
        ->where("country_id",$request->country_id)
        ->pluck("name","id");
        return response()->json($states);
    }

    public function getCity(Request $request)
    {
        $cities = DB::table("cities")
        ->where("state_id",$request->state_id)
        ->pluck("name","id");
        return response()->json($cities);
    }
    function save (Request $request)
    {
        $validator = Validator::make($request->all(),[
            'v_name' => 'required',
            'mobile' => 'required',
            'alternate_mobile' => 'required',
            'email' => 'required|email',
            'alternate_vendor_name' => 'required',
            'v_perinvocing' => 'required',
            'gst_no' => 'required',
            'pan_no' => 'required',
            'license_no' => 'required',
            'transportation_mode' => 'required',
            'buliding' => 'required',
            'street' => 'required',
            'suburb' => 'required',
            'zipcode' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'bank_name' => 'required',
            'register_name' => 'required',
            'account_number' => 'required',
            'ifsc_code' => 'required',
            'account_type' => 'required',
            'upload_document' => 'required',
            'vender_category' => 'required',
           

            

        ]);
        if($validator->passes())
        {
       
                $venderreg=new Vendorregstration;
                $vender_category = implode(",", $request->vender_category);
                $venderreg->reference_code  = $request['reference_code'];
                $venderreg->v_name = $request['v_name'];
                $venderreg->mobile = $request['mobile'];
                $venderreg->alternate_mobile = $request['alternate_mobile'];
                $venderreg->email = $request['email'];
                $venderreg->alternate_vendor_name = $request['alternate_vendor_name'];
                $venderreg->v_perinvocing = $request['v_perinvocing'];
                $venderreg->gst_no = $request['gst_no'];
                $venderreg->pan_no = $request['pan_no'];
                
                $venderreg->buliding = $request['buliding'];

                $venderreg->license_no = $request['license_no'];
                $venderreg->transportation_mode = $request['transportation_mode'];
                $venderreg->street	 = $request['street'];
                $venderreg->suburb = $request['suburb'];
                $venderreg->zipcode = $request['zipcode'];
                $venderreg->country = $request['country'];
                $venderreg->state = $request['state'];
                $venderreg->city = $request['city'];
                $venderreg->bank_name = $request['bank_name'];
                $venderreg->register_name = $request['register_name'];
                $venderreg->account_number = $request['account_number'];
                $venderreg->ifsc_code = $request['ifsc_code'];
                $venderreg->account_type = $request['account_type'];
                $venderreg->upload_document = $request['upload_document'];
                $venderreg->vender_category = $vender_category ;

                $venderreg->save();
                if($request->upload_document)
                {
                    $ext = $request->upload_document->getClientOriginalExtension();
                    $newFilename = time().'.'.$ext;
                    $request->upload_document->move(public_path().'/uploads/customer',$newFilename);
                    $venderreg->upload_document = $newFilename ;
                    $venderreg->save();
                }
                 $request->session()->flash('msg','Save Succesfully');
                return redirect('/vendorreg');
            }
            else{
                return redirect('vendorreg/create')->withErrors($validator)->withInput();

            }
            }

            public function editvendor($id)
            {
               $venoneid = Vendorregstration::find($id);
               $country = DB::table('countries')->get();
               $state = DB::table('states')->get();
               $city = DB::table('cities')->get();
               $vcateg = DB::table('categ')->get();

                $data=compact('venoneid','country','state','city','vcateg'); //variabl
               
                return view('vendorreg.edit')->with($data);
                
               
            }
            public function updatevendor($id,Request $request)
            {
                $validator = Validator::make($request->all(),[
                    'v_name' => 'required',
            'mobile' => 'required',
            'alternate_mobile' => 'required',
            'email' => 'required|email',
            'alternate_vendor_name' => 'required',
            'v_perinvocing' => 'required',
            'gst_no' => 'required',
            'pan_no' => 'required',
            'license_no' => 'required',
            'transportation_mode' => 'required',
            'buliding' => 'required',
            'street' => 'required',
            'suburb' => 'required',
            'zipcode' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'bank_name' => 'required',
            'register_name' => 'required',
            'account_number' => 'required',
            'ifsc_code' => 'required',
            'account_type' => 'required',
            'upload_document' => 'required',
            'vender_category' => 'required',
                   
                  
                   
        
                    
        
                ]);
                if($validator->passes())
                {
            
                $venderreg = Vendorregstration::find($id);
                $vender_category = implode(",", $request->vender_category);

                $venderreg->reference_code  = $request['reference_code'];
                $venderreg->v_name = $request['v_name'];
                $venderreg->mobile = $request['mobile'];
                $venderreg->alternate_mobile = $request['alternate_mobile'];
                $venderreg->email = $request['email'];
                $venderreg->alternate_vendor_name = $request['alternate_vendor_name'];
                $venderreg->v_perinvocing = $request['v_perinvocing'];
                $venderreg->gst_no = $request['gst_no'];
                $venderreg->pan_no = $request['pan_no'];
                
                $venderreg->buliding = $request['buliding'];

                $venderreg->license_no = $request['license_no'];
                $venderreg->transportation_mode = $request['transportation_mode'];
                $venderreg->street	 = $request['street'];
                $venderreg->suburb = $request['suburb'];
                $venderreg->zipcode = $request['zipcode'];
                $venderreg->country = $request['country'];
                $venderreg->state = $request['state'];
                $venderreg->city = $request['city'];
                $venderreg->bank_name = $request['bank_name'];
                $venderreg->register_name = $request['register_name'];
                $venderreg->account_number = $request['account_number'];
                $venderreg->ifsc_code = $request['ifsc_code'];
                $venderreg->account_type = $request['account_type'];
                $venderreg->upload_document = $request['upload_document'];
                $venderreg->vender_category = $vender_category ;
                
                $venderreg->save();
               
                 $request->session()->flash('msg','Updated Succesfully');
                return redirect('/vendorreg');
                }
                else{
                    return redirect('vendorreg/edit/'.$id)->withErrors($validator)->withInput();
    
                }
                     
        
                    
                    
                }
                public function deletevendor($id,Request $request)

                {
                    Vendorregstration::where('id',$id)->delete();
                    $request->session()->flash('msg','Record Has Been Delete Succesfully');
                            return redirect('/vendorreg');
                    // echo "<pre>";
                    // print_r($customer);
                    
            
                }


                
}
