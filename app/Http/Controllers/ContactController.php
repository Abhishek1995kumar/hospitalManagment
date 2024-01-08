<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Doctor;
use App\Repositories\ContactRepostitory;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

class ContactController extends Controller
{
    
    public function index()
    {
        $todays_date = date("Y-m-d");
        $contacts = DB::table('contacts')
        ->select( 'contacts.*','doctor.first_name as df_name','doctor.last_name as dl_name')
        ->leftjoin('users as doctor', 'contacts.doctor', '=', 'doctor.id')
        ->whereBetween(DB::raw('DATE(contacts.created_at)'), [$todays_date, $todays_date])
         ->where('contacts.status','!=','Exit')
        ->get();
        return view ('contacts.index')->with('contacts', $contacts);
    }



    
    public function create()
    {
        $doctor = Doctor::all();
        $doctorref = User::where('department_id', '=', '2')->get();
       
         //print_r($doctor);die();
        return view('contacts.create',compact('doctor','doctorref'));
    }

    
    public function store(Request $request)
    {
        $input = $request->all();
        Contact::create($input);
        return redirect('contact')->with('flash_message', 'Contact Addedd!');  
    }

    
    public function show($id)
    {
        $contact = Contact::find($id);
        return view('contacts.show')->with('contacts', $contact);
    }

    
    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('contacts.edit')->with('contacts', $contact);
    }

    
    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);
        $input = $request->all();
        $contact->update($input);
        return redirect('contact')->with('flash_message', 'Contact Updated!');  
    }

    
    public function destroy($id)
    {
        Contact::destroy($id);
        return redirect('contact')->with('flash_message', 'Contact deleted!');  
    }

    


    public function update_status(Request $request )
    {
        $input = $request->input('status');
        $id = $request->input('id');
       
    //print_r($id);
    //die();
        DB::table('contacts')
            ->where('id', '=',  $id)
            ->update([
                'status' => $input
        ]);
        
        return redirect('contact')->with('Contact Updated!'); 
    }
}
