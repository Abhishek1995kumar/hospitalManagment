<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\Categ;
use App\Models\sub_categorymodel;
use Illuminate\Http\Request;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportProduct;
use App\Exports\ExportProduct;
use App\Exports\ProductTemplateExport;


class ProductController extends Controller
{

    public function index()
    {
        $data['medicinesref'] = DB::table('product')->get();
       $productdata = DB::table('product')
        ->select( 'product.*','categ.cat_name','categ.cat_id','subcategory.subcat_id','subcategory.subcat_name')
        ->leftjoin('categ', 'product.category', '=', 'categ.cat_id')
        ->leftjoin('subcategory', 'product.subcategory', '=', 'subcategory.subcat_id')
        ->get();

        return view('product.index',$data)->with(compact('productdata'));
    }


    public function create() {
        $category = Categ::all();
        $lastId = product::latest('id')->first()->id+1;

        if($lastId < 10)
        {
            $lastId =  "00".$lastId;

        }
        elseif($lastId > 9 && $lastId < 99)
        {
            $lastId =  "0".$lastId;

        }
       

        $hsnref = DB::table('erp_hsncode')
        ->select( 'erp_hsncode.*','erp_taxcode.taxcode_percentage','erp_taxcode.taxcode_id') 
        ->leftjoin('erp_taxcode', 'erp_hsncode.hsn_intrataxcode', '=', 'erp_taxcode.taxcode_id')
        ->get();


        return view('product.create', compact('category','lastId','hsnref','hsnref'));


    }


    public function store(Request $request)
    {
        $input = $request->all();
        product::create($input);
        return redirect('product')->with('flash_message', 'Data Addedd!');
    }


    public function show($id)
    {
        $product = product::find($id);
        return view('product.show')->with('product', $product);
    }


    public function edit($id)
    {
        $cata = DB::table('categ')->get();
        $subcateg = DB::table('subcategory')->get();
        $product = product::find($id);

        return view('product.edit', compact('product','cata','subcateg'));
    }


    public function update(Request $request, $id)
    {
        $product = product::find($id);
        $input = $request->all();
        $product->update($input);
        return redirect('product')->with('flash_message', 'product Updated!');
    }


    public function destroy($id)
    {
        product::destroy($id);
        return redirect('product')->with('flash_message', 'product deleted!');
    }


    public function get_sub_cat(Request $request){
        $data = DB::table('subcategory')
        ->where('category',$request->category)
        ->pluck('subcat_name','subcat_id');
        return response()->json($data);
    }

    public function Product_price(request $request)
    {
        $test_price =  $request->id;

        $product_rate = DB::table('product')->where('id',$test_price)->get();
        echo "<pre>";
        print_r($product_rate);
        die();
        return $product_rate;
    }

    public function showmodeupdate(Request $request, $id)
    {

        $product = product::find($id);
        $input = $request->all();
        // $product->mrp = $request['mrp'];
        // print_r( $input);die();

        // print_r($product);die();
        $product->update($input);
        return response()->json(['response' => 'Successfully Updated .', 'status' => '200']);

      

    }
    
    public function import(Request $request){
         Excel::import(new ImportProduct, $request->file('import_file'));
        return redirect()->back();
    }

    public function exportUsers(Request $request){
        return Excel::download(new ExportProduct, 'products.xlsx');
    }

    public function downloadProductTemplate()
{
    return Excel::download(new ProductTemplateExport, 'productsTemplate.xlsx');
}


}
