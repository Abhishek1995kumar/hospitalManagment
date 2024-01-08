<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productpo;
Use DB;

class ProductpoController extends Controller
{
    function show ()
    {
        $productpodata = DB::table('product_po')
        ->select( 'product_po.*','product.id as proid','product.product_name','categ.cat_name','categ.cat_id') 
        ->leftjoin('product', 'product_po.products', '=', 'product.id')
        ->leftjoin('categ', 'product_po.category', '=', 'categ.cat_id')
       
        ->get();
      
        return view('productpo.list')->with(compact('productpodata'));
        
    }
    function add ()
    {
        $medicinesref = DB::table('product')->get();
        $vendorref = DB::table('vendorre')
        ->select( 'vendorre.*','new_product_po.vendor',) 
        ->join('new_product_po', 'vendorre.id', '=', 'new_product_po.vendor')
         ->get();
        
        return view('productpo.add', compact('medicinesref','vendorref'));
        
    }
    public function fetch_categ(Request $request)
    {
        $categ = DB::table("product")
        ->where("product.id",$request->id)
        ->select( 'product.category','categ.cat_id  as cat_id','categ.cat_name') 
        ->join('categ', 'product.category', '=', 'categ.cat_id')
        ->pluck("cat_name","cat_id");
        
        
        return response()->json($categ);
    }
    public function Product_pricess(request $request) {
        // DB::enableQueryLog();
        $test_price =  $request->id;
        $product_rate = DB::table('new_product_po')
        ->where('new_product_po.vendor',$test_price)
        ->select( 'new_product_po.*','product.id','product.product_name') 
        ->leftjoin('product','new_product_po.products', '=', 'product.id')
        ->get();
        // print_r($product_rate);die();
        
       
       

        // and then you can get query log
        
        //  print_r(DB::getQueryLog());
        //  print_r($product_rate);
        return $product_rate;
    }
    function save (Request $request)
    {
       
                $producrpo = new Productpo;

                $vendors = implode(" ", $request->vendors);
                $product_id = implode(" ", $request->product_id);
                $mrp = implode(" ", $request->mrp);
                $hsn = implode(" ", $request->hsn);
                $size = implode(" ", $request->size);
                $current_qty = implode(" ", $request->current_qty);
                $minimum_qty = implode(" ", $request->minimum_qty);
                $maximum_qty = implode(" ", $request->maximum_qty);
               $po_qty = implode(" ", $request->po_qty);
                $cost = implode(" ", $request->cost);
                $expected_sale = implode(" ", $request->expected_sale);
                $last_30_days = implode(" ", $request->last_30_days);
                $last_90_days = implode(" ", $request->last_90_days);
                $coating = implode(" ", $request->coating);
                $vision = implode(" ", $request->vision);
                $fitting_height = implode(" ", $request->fitting_height);
                $frame_a = implode(" ", $request->frame_a);
                $frame_b = implode(" ", $request->frame_b);
                $frame_dbl = implode(" ", $request->frame_dbl);
                // $price_range = implode(",", $request->price_range);
                $make = implode(" ", $request->make);
                $material = implode(" ", $request->material);
                $gender = implode(" ", $request->gender);
                $shape = implode(" ", $request->shape);
                $color = implode(" ", $request->color);
                $brand = implode(" ", $request->brand);
                $model_no = implode(" ", $request->model_no);
                $total_cost = implode(" ", $request->total_cost);
                $lens_name = implode(" ", $request->lens_name);
                // $lens_id = implode(" ", $request->lens_id);
                $kr_k1 = implode(" ", $request->kr_k1);
                $kr_k2 = implode(" ", $request->kr_k2);
                $diaopter = implode(" ", $request->diaopter);
                $constant = implode(" ", $request->constant);
                $cyl_value = implode(" ", $request->cyl_value);
                $supply_date = implode(" ", $request->supply_date);
                // $cost_price = implode(",", $request->cost_price);

                 $producrpo->products = $request['products'];
                
                $producrpo->date = $request['date'];
                $producrpo->category = $request['category'];
              
                $producrpo->vendors = $vendors;
                $producrpo->product_id = $product_id;
                $producrpo->mrp = $mrp;
                $producrpo->hsn = $hsn;
                $producrpo->size = $size;
                $producrpo->current_qty = $current_qty;
                $producrpo->minimum_qty = $minimum_qty;
                $producrpo->maximum_qty = $maximum_qty;
                $producrpo->po_qty = $po_qty;
                $producrpo->cost = $cost;
                $producrpo->expected_sale = $last_30_days;
                $producrpo->last_90_days = $last_90_days;
                $producrpo->coating = $coating;
                $producrpo->vision = $vision;
                $producrpo->fitting_height = $fitting_height;
                $producrpo->frame_a = $frame_a;
                $producrpo->frame_b = $frame_b;
                $producrpo->frame_dbl = $frame_dbl;
                // $newproductpo->price_range = $price_range;
                $producrpo->make = $make;
                $producrpo->material = $material;
                $producrpo->gender = $gender;
                $producrpo->shape = $shape;
                $producrpo->color = $color;
                $producrpo->brand = $brand;
                $producrpo->model_no = $model_no;
                $producrpo->total_cost = $total_cost;
                $producrpo->lens_name = $lens_name;
                // $producrpo->lens_id = $lens_id;
                $producrpo->kr_k1 = $kr_k1;
                $producrpo->kr_k2 = $kr_k2;
                $producrpo->constant = $constant;
                $producrpo->supply_date = $supply_date;
                // $newproductpo->cost_price = $cost_price;

                
               

                $producrpo->save();

                $request->session()->flash('msg','Save Succesfully');
                return redirect('/productpo');

         
    }
    public function delete($id,Request $request)

    {
        Productpo::where('id',$id)->delete();
        $request->session()->flash('msg','Record Has Been Delete Succesfully');
                return redirect('/productpo');
     
        

    }
    public function showmodes($id)
    {
        
        $data = DB::table('product_po')
        ->where('product_po.id', $id)
        ->select( 'product_po.*','vendorre.id as ven_id','vendorre.v_name as vname','product.id as prid'
        ,'product.product_name as prs_name','categ.cat_id','categ.cat_name') 
        ->leftjoin('vendorre', 'product_po.vendors', '=', 'vendorre.id')
        ->leftjoin('product', 'product_po.products', '=', 'product.id')
        ->leftjoin('categ', 'product_po.category', '=', 'categ.id')
       
        
        ->get();

        if($data){
            return response()->json([
                'status'=>"success",
                'data'=> $data
            ]);

        }else{
            return response()->json([
                'status'=>"error"
            ]);

        }
    }
}
