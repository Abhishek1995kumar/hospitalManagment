<?php

namespace App\Http\Controllers;
use App\Models\Categ;
use Illuminate\Http\Request;
use DB;

class CategController extends Controller
{
    
    public function index()
    {
        $categ = Categ::all();
        return view ('categ.index')->with('categ', $categ);
    }


    public function create()
    {
        return view('categ.create');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        Categ::create($input);
        return redirect('category')->with('flash_message', 'data Addedd!');  
    }

    
    public function show($id)
    {
        $categ = Categ::find($id);
        return view('categ.show')->with('categ', $categ);
    }

    
   public function edit($id)
    {
       
        // $categ = Categ::find($id);
        // $data=compact('categ'); //variabl
        // return view('categ.edit')->with($data);

        $categ = Categ::find($id);
        return view('categ.edit')->with('categ', $categ);

        
       



       
    }

    
    public function update(Request $request)
    {
        $input = $request->input('category_name');
        $id = $request->input('cat_id');
      
       $result = DB::table('categ')
        ->where('cat_id', '=',  $id)
        ->update([
            'cat_name' => $input
        ]);
       
        return redirect('category')->with('flash_message', 'data Updated!');  

    }
   


    public function destroy($id)
    {
        Categ::destroy($id);
        return redirect('category')->with('flash_message', 'data deleted!');  
    }
}
