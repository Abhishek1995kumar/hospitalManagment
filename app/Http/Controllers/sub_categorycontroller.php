<?php

namespace App\Http\Controllers;
use App\Models\sub_categorymodel;
use App\Models\Categ;
use DB;

use Illuminate\Http\Request;

class sub_categorycontroller extends Controller
{
    
    public function index()
    {
        // $subcategory = sub_categorymodel::all();

        $subcategory =DB::table('subcategory')
        ->select('subcategory.*','categ.cat_name as category')
        ->leftJoin('categ','subcategory.category','categ.cat_id')
        ->get();
        // echo "<pre>";
        // print_r($subcategory);die();
       

        return view ('subcategory.index')->with('subcategory', $subcategory);
    }

    
    public function create()
    {
       $category = Categ::all(); 
        return view('subcategory.create',compact('category'));
    }

   
    public function store(Request $request)
    {
        $input = $request->all();
        sub_categorymodel::create($input);
        return redirect('subcategory')->with('flash_message', 'Data Addedd!');  
    }

    public function show($id)
    {
        $subcategory = sub_categorymodel::find($id);
        return view('subcategory.show')->with('subcategory', $subcategory);
    }

    public function edit($id)
    {
     

        $category =DB::table('categ')
        ->select('categ.*','subcategory.category')
        ->leftjoin('subcategory','categ.cat_id','=','subcategory.category')
        ->get();
        $subcategory = sub_categorymodel::find($id);
        return view('subcategory.edit',compact('subcategory','category'));
        
    }

    public function update(Request $request)
    {
        $input = $request->input('subcat_name');
        $id = $request->input('subcat_id');
        $categories = $request->input('category');

        
      
       $result = DB::table('subcategory')
        ->where('subcat_id', '=',  $id)
        ->update([
            'subcat_name' => $input,
            'category' => $categories,
        ]);


        return redirect('subcategory')->with('flash_message', 'Data Updated!');
    }

    public function destroy($id)
    {
       
        sub_categorymodel::destroy($id);
        return redirect('subcategory')->with('flash_message', 'Data deleted!');  
    }
}
