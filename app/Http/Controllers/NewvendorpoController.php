<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newvendorpo;
use App\Models\Categ;
Use DB;
use Auth;
use PhpParser\Node\Stmt\Echo_;

class NewvendorpoController extends Controller
{
    function show ()
    {
        $vendorpo = DB::table('vendorpo')
        ->select( 'vendorpo.*','vendorre.id as ven_id','vendorre.v_name','categ.cat_id','categ.cat_name as category')
        ->leftjoin('vendorre', 'vendorpo.vendorname', '=', 'vendorre.id')
        ->leftjoin('categ', 'vendorpo.category', '=', 'categ.cat_id')
        ->get();

        $id = Auth::id();
       
        return view('newvendorpo.list')->with(compact('vendorpo','id'));
        
    }

    public function Product_price(request $request)
    {
        $test_price =  $request->id;
        $product_rate = DB::table('product')->where('id',$test_price)->get();
        return $product_rate;
    }

    function add (){
        $q =  DB::enableQueryLog();
        $hello = DB::table('vendorre')->get();
        // echo "<pre>";
        // print_r($q);
        // print_r('\n');
        // print_r($hello);
        // die();
        $categ=Categ::all();
        $product = DB::table('product')->get();
      //ruhul code auto id //
      $lastId = Newvendorpo::latest('id')->first()->id+1;

      if($lastId < 10)
      {
          $lastId =  "00".$lastId;
          
      }
      elseif($lastId > 9 && $lastId < 99)
      {
          $lastId =  "0".$lastId;
         
      }
    return view('newvendorpo.create', compact('hello','product','categ','lastId'));
    }


    public function fetch_cat(Request $request)
    {
        $id = $request->id;
        $results = DB::select(DB::raw("SELECT `vendorre`.`vender_category` FROM vendorre WHERE `vendorre`.`id` = $id"));
        $vendor_cate = $results[0]->vender_category;
        // $categ = DB::table("vendorre")
        // ->where("vendorre.id",$request->id)
        // ->select( 'vendorre.vender_category','categ.cat_id as cat_id','categ.cat_name') 
        // ->join('categ', 'vendorre.vender_category', '=', 'categ.cat_id')
        // ->pluck("cat_name","cat_id");
        //  //print_r($categ); die();
        //  return response()->json($categ);
        $qurey = DB::select(DB::raw("SELECT * FROM categ WHERE `cat_id` IN ($vendor_cate)"));
        // print_r($qurey);die();
         return response()->json($qurey);
}		
  

public function get_subcategory(Request $request)
{
    $data = DB::table('subcategory')
    ->where('category',$request->category)
    ->pluck('subcat_name','subcat_id');
    // print_r($data);die();
    return response()->json($data);

}

function save (Request $request) {
        $input = new Newvendorpo;
        $products = implode(",", array_filter($request->product));
        $product_id = implode(",", array_filter($request->product_id));
        $mrp = implode(",",array_filter( $request->mrp));
        $hsn = implode(",", array_filter($request->hsn));
        //  $size = implode(",", $request->size);
        // $minimum_qty = implode(",", $request->minimum_qty);
        // $maximum_qty = implode(",", $request->maximum_qty);
        $po_qty = implode(",", array_filter($request->po_qty));
        $cost = implode(",",array_filter( $request->cost));
        // $expected_sale = implode(",", $request->expected_sale);
        // $last_30_days = implode(",", $request->last_30_days);
        // $last_90_days = implode(",", $request->last_90_days);
        //$vision = implode(",", $request->vision);
        // $make = implode(",", $request->make);
        // $material = implode(",", $request->material);
        // $gender = implode(",", $request->gender);
        // $color = implode(",", $request->color);
       // $brand = implode(",", $request->brand);
        // $model_no = implode(",", $request->model_no);
        //$total_cost = implode(",", $request->total_cost);
        $input->vendorname = $request['vendorname'];
        $input->date = $request['date'];
        $input->category = $request['category'];
        $input->venpo_no = $request['venpo_no'];
        $input->sub_category = $request['sub_category'];
        $input->status = $request['status'];
        $input->product = $products;
        $input->product_id = $product_id;
        $input->mrp = $mrp;
        $input->hsn = $hsn;
      
        // $input->size = $size;
        // $input->minimum_qty = $minimum_qty;
        // $input->maximum_qty = $maximum_qty;
        $input->po_qty = $po_qty;
        $input->cost = $cost;
        // $input->expected_sale = $last_30_days;
        // $input->last_90_days = $last_90_days;
        // $input->vision = $vision;
        // $input->make = $make;
        // $input->material = $material;
        // $input->gender = $gender;
        // $input->color = $color;
        //$input->brand = $brand;
        // $input->model_no = $model_no;
        //$input->total_cost = $total_cost;

        // print_r($input); die();
      
        $input->save();

        $request->session()->flash('msg','Save Succesfully');
        return redirect('/newvendorpo');

         
    }
    public function delete($id,Request $request)

    {
        Newvendorpo::where('id',$id)->delete();
        $request->session()->flash('msg','Record Has Been Delete Succesfully');
                return redirect('/newvendorpo');
     
        

    }
    public function showmode($id)
    {
        $ven_data = DB::table('vendorpo as v')
        ->where('v.id', $id)
        ->select( 'v.*','r.v_name','c.cat_id','c.cat_name','s.subcat_id','s.subcat_name') 
        ->leftjoin('vendorre as r', 'v.vendorname', '=', 'r.id')
        ->leftjoin('categ as c', 'v.category', '=', 'c.cat_id')
        ->leftjoin('subcategory as s', 'v.sub_category', '=', 's.subcat_id')
        ->get()->toArray();
        // print_r($data);die();
        // ->leftjoin('vendorre', 'vendorpo.vendorname', '=', 'vendorre.id')
        $product_array = explode(",", $ven_data[0]->product);
        $pro_name = DB::table('product')
        ->whereIn('product.id', $product_array)
        ->select( 'product.product_name') 
        ->get()->toArray();
        $product_filter_array = [];
        for($i=0; $i<count($pro_name); $i++){
            array_push($product_filter_array, $pro_name[$i]->product_name);
        }
        $ven_data[0]->product_name = implode(",",$product_filter_array);
        
          if($ven_data){
            return response()->json([
                'status'=>"success",
                'data'=> $ven_data
            ]);

        }else{
            return response()->json([
                'status'=>"error"
            ]);

        }
    }

   
    public function  update_vendorpo(Request $request )
    {
        $input = $request->input('status');
        $id = $request->input('id');
       
    //    print_r($input);
    //   die();
        DB::table('vendorpo')
            ->where('id', '=',  $id)
            ->update([
                'status' => $input
        ]);
        
        return redirect('newvendorpo')->with('Contact Updated!'); 
    }
}
