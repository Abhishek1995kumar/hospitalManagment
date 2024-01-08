<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Newproductpo;
Use DB;
use Auth;
use Illuminate\Support\Facades\Validator;


class NewproductpoController extends Controller
{
    function show ()
    {
        $produ = DB::table('new_product_po')
        ->select( 'new_product_po.*','categ.cat_name','categ.cat_id','vendorre.id as ven_id','vendorre.v_name') 
        ->leftjoin('categ', 'new_product_po.category', '=', 'categ.cat_id')
        ->leftjoin('vendorre', 'new_product_po.vendor', '=', 'vendorre.id')
        ->get();

        $id = Auth::id();
       
        return view('newproductpo.list')->with(compact('produ','id'));
        
    }
    function add (){


        $vendorname = DB::table('vendorre')->get();
        $medicinesref = DB::table('product')->get();

        $lastId = Newproductpo::latest('product_po_id')->first()->product_po_id+1;

        if($lastId < 10)
        {
            $lastId =  "00".$lastId;
            
        }
        elseif($lastId > 9 && $lastId < 99)
        {
            $lastId =  "0".$lastId;
           
        }

        return view('newproductpo.create', compact('vendorname','medicinesref','lastId'));
       
       
    }
    public function fetch_cat(Request $request)
    {
        $id = $request->id;
        $results = DB::select(DB::raw("SELECT `vendorre`.`vender_category` FROM vendorre WHERE `vendorre`.`id` = $id"));
        $vendor_cate = $results[0]->vender_category;
        //  print_r(explode(",",$vendor_cate));die();
        // print_r($vendor_cate);die();


        //  DB::enableQueryLog();
        // $categ = DB::table("vendorre")
        
        // ->where("vendorre.id",$request->id)
        // ->select( 'vendorre.vender_category','categ.cat_id  as cat_id','categ.cat_name') 
        // ->join('categ', 'vendorre.vender_category', '=', 'categ.cat_id')
        // ->pluck('cat_name','cat_id');
        //    print_r(DB::getQueryLog());

        $qurey = DB::select(DB::raw("SELECT * FROM categ WHERE `cat_id` IN ($vendor_cate)"));
        // print_r($qurey);die();

       


        
        
        
       return response()->json($qurey);
}
    public function fetch_subcat(Request $request)
    {
        $subcateg = DB::table("subcategory")
        ->where("category",$request->id)
        ->pluck("subcat_name","subcat_id");
        
        
        return response()->json($subcateg);
    }
    public function Product_price(request $request)
    {
        // DB::enableQueryLog();
        $test_price =  $request->id;
       
        $product_rate = DB::table('product')
        ->where('product.id',$test_price)
        ->select( 'product.*','categ.cat_id  as cat_id','categ.cat_name','subcategory.subcat_id','subcategory.subcat_name') 
        ->leftjoin('categ', 'product.category', '=', 'categ.cat_id')
        ->leftjoin('subcategory', 'product.subcategory', '=', 'subcategory.subcat_id')
        ->get();
       
       

        // and then you can get query log
        
        //  print_r(DB::getQueryLog());
        //  print_r($product_rate);
        return $product_rate;
    }
    function save (Request $request)
    {
        // print_r(array_filter($request->products));die();
        $validator = Validator::make($request->all(),[
            'vendor' => 'required',
            // 'date' => 'required',
            'category' => 'required',
            'subcategory' => 'required',



        ]);
        if($validator->passes())
        {
       
                $newproductpo = new Newproductpo;

                $products = implode(",", array_filter($request->products));
                // $product_id = implode(" ", $request->product_id);
                $mrp = implode(",", array_filter($request->mrp));
                $hsn = implode(",", array_filter($request->hsn));
                // $size = implode(" ", $request->size);
                // $current_qty = implode(" ", $request->current_qty);
                // $minimum_qty = implode(" ", $request->minimum_qty);
                // $maximum_qty = implode(" ", $request->maximum_qty);
               $po_qty = implode(",", array_filter($request->po_qty));
                // $cost = implode(" ", $request->cost);
                // $expected_sale = implode(" ", $request->expected_sale);
                // $last_30_days = implode(" ", $request->last_30_days);
                // $last_90_days = implode(" ", $request->last_90_days);
                $coating = implode(",", array_filter($request->coating));
                $vision = implode(",", array_filter($request->vision));
                $fitting_height = implode(",", array_filter($request->fitting_height));
                $frame_a = implode(",", array_filter($request->frame_a));
                $frame_b = implode(",", array_filter($request->frame_b));
                $frame_dbl = implode(",", array_filter($request->frame_dbl));
                // $price_range = implode(",", $request->price_range);
                // $make = implode(" ", $request->make);
                // $material = implode(" ", $request->material);
                // $gender = implode(" ", $request->gender);
                // $shape = implode(" ", $request->shape);
                // $color = implode(" ", $request->color);
                $brand = implode(",", array_filter($request->brand));
                // $model_no = implode(" ", $request->model_no);
                $total_cost = implode(",", array_filter($request->total_cost));
                $lens_name = implode(",", array_filter($request->lens_name));
                $lens_id = implode(",", array_filter($request->lens_id));
                $kr_k1 = implode(",", array_filter($request->kr_k1));
                $kr_k2 = implode(",", array_filter($request->kr_k2));
                $diaopter = implode(",", array_filter($request->diaopter));
                $constant = implode(",", array_filter($request->constant));
                $cyl_value = implode(",", array_filter($request->cyl_value));
                $supply_date = implode(",", array_filter($request->supply_date));
                // $cost_price = implode(",", $request->cost_price);

                 $newproductpo->vendor = $request['vendor'];
                
                $newproductpo->po_date = $request['po_date'];
                $newproductpo->category = $request['category'];
                $newproductpo->subcategory = $request['subcategory'];
                $newproductpo->status = $request['status'];
                $newproductpo->po_no = $request['po_no'];
                $newproductpo->products = $products;
                // $newproductpo->product_id = $product_id;
                $newproductpo->mrp = $mrp;
                $newproductpo->hsn = $hsn;
                // $newproductpo->size = $size;
                // $newproductpo->current_qty = $current_qty;
                // $newproductpo->minimum_qty = $minimum_qty;
                // $newproductpo->maximum_qty = $maximum_qty;
                $newproductpo->po_qty = $po_qty;
                // $newproductpo->cost = $cost;
                // $newproductpo->expected_sale = $expected_sale;
                // $newproductpo->last_30_days = $last_30_days;
                // $newproductpo->last_90_days = $last_90_days;
                $newproductpo->coating = $coating;
                $newproductpo->vision = $vision;
                $newproductpo->fitting_height = $fitting_height;
                $newproductpo->frame_a = $frame_a;
                $newproductpo->frame_b = $frame_b;
                $newproductpo->frame_dbl = $frame_dbl;
                // $newproductpo->price_range = $price_range;
                // $newproductpo->make = $make;
                // $newproductpo->material = $material;
                // $newproductpo->gender = $gender;
                // $newproductpo->shape = $shape;
                // $newproductpo->color = $color;
                // $newproductpo->brand = $brand;
                // $newproductpo->model_no = $model_no;
                $newproductpo->total_cost = $total_cost;
                $newproductpo->lens_name = $lens_name;
                $newproductpo->lens_id = $lens_id;
                $newproductpo->kr_k1 = $kr_k1;
                $newproductpo->kr_k2 = $kr_k2;
                $newproductpo->constant = $constant;
                $newproductpo->supply_date = $supply_date;
                // $newproductpo->cost_price = $cost_price;

                
               

                $newproductpo->save();

                $request->session()->flash('msg','Save Succesfully');
                return redirect('/newproduct');
            }
            else{
                return redirect('newproduct/create')->withErrors($validator)->withInput();

            }

         
    }
    public function delete($id,Request $request)

    {
        Newproductpo::where('product_po_id',$id)->delete();
        $request->session()->flash('msg','Record Has Been Delete Succesfully');
                return redirect('/newproduct');
     
        

    }
    public function showmode($id)
    {
        
        $data = DB::table('new_product_po')
        ->where('new_product_po.product_po_id', $id)
        ->select( 'new_product_po.*','vendorre.id as ven_id','vendorre.v_name as vname','categ.cat_id','categ.cat_name','subateg.subcat_id','subateg.subcat_name') 
        ->leftjoin('vendorre', 'new_product_po.vendor', '=', 'vendorre.id')
        ->leftjoin('categ', 'new_product_po.category', '=', 'categ.cat_id')
        ->leftjoin('subcategory as subateg', 'new_product_po.subcategory', '=', 'subateg.subcat_id')
        // ->leftjoin('product', 'new_product_po.products', '=', 'product.id')
        
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

    public function  update_newproductpo(Request $request )
    {
        $input = $request->input('status');
        $id = $request->input('id');
       
   
        DB::table('new_product_po')
            ->where('product_po_id', '=',  $id)
            ->update([
                'status' => $input
        ]);
        
        return redirect('newproduct')->with('Contact Updated!'); 
    }
}
