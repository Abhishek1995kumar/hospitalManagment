<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payroll;

class Payrollcontroller extends Controller
{
     public function index()
    {
        $payroll = Payroll::all();
      return view ('payroll.index')->with('payroll', $payroll);;
    }

    
    public function create()
    {
        return view('payroll.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Payroll::create($input);
        return redirect('payroll')->with('flash_message', 'data Addedd!');  
    }

    // public function show($id)
    // {
    //     //
    // }

    public function edit($id)
    {   
       
        $payroll = Payroll::find($id);
        return view('payroll.edit')->with('payroll', $payroll);
        // return view('payroll.edit');
    }

    public function update(Request $request, $id)
    {
        $payroll = Payroll::find($id);
        $input = $request->all();
        $payroll->update($input);
        return redirect('payroll')->with('flash_message', 'Contact Updated!');  
    }

    public function destroy($id)
    {
      

        Payroll::destroy($id);
        return redirect('payroll')->with('flash_message', 'payroll deleted!');  
    }
}
