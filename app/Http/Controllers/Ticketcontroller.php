<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ticket;
use App\Models\User;
use DB;
use Validator;
use Auth;

class Ticketcontroller extends Controller
{
    
    public function index()
    {
        $ticket =DB::table('ticket')
        ->select('ticket.*','users.first_name as ticket_for')
        ->leftJoin('users','ticket.ticket_for','users.id')
        ->get();
        // $ticket = ticket::all();
        return view ('ticketcustom.index')->with('ticket', $ticket);
    }

    
    public function create()
    {
        $id = Auth::id();
        $user_name = DB::table('users')
                    ->select('first_name','last_name')
                    ->where('id','=',$id)
                    ->first();
        $user = User::all();
        $lastId = ticket::latest('id')->first()->id+2;
        //print_r($lastId);die();
            return view('ticketcustom.create',compact('user','lastId','user_name'));
        }

    
    public function store(Request $request)
    {

        $input = $request->all();
        ticket::create($input);
        return redirect('ticketcustom')->with('flash_message', 'data Addedd!');
        // return view('ticket',compact('lastId'));  
    }

    // public function edit($id)
    // {
 
    //      $ticket1 =DB::table('ticket')
    //     ->select('ticket.id','ticket.ticket_for','users.first_name','users.last_name','users.id as u_id', 'm.first_name as manager_name','m.last_name as manager_last','m.id as mid')
    //     ->join('users','ticket.ticket_for','=','users.id')
    //     ->join('users as m','ticket.manager','=','m.id')
    //     ->where('ticket.id',$id)
    //     ->get();
    //     $ticket = ticket::find($id);
    //     $priority_val = DB::table('ticket')->where('id', $id)->get(); 
    //     return view('ticket.edit',compact('ticket','ticket1','priority_val'));
        
    //    $ticket = ticket::find($id);

           
    // }
    public function edit($id)
    {
 
         $ticket1 =DB::table('ticket')
        ->select('ticket.id','ticket.ticket_for','users.first_name','users.last_name','users.id as u_id', 'm.first_name as manager_name','m.last_name as manager_last','m.id as mid')
        ->join('users','ticket.ticket_for','=','users.id')
        ->join('users as m','ticket.manager','=','m.id')
        ->where('ticket.id',$id)
        ->get();
        $ticket = ticket::find($id);
        $priority_val = DB::table('ticket')->where('id', $id)->get(); 
        return view('ticketcustom.edit',compact('ticket','ticket1','priority_val'));
        
       $ticket = ticket::find($id);

           
    }


    public function update(Request $request, $id)
    {
        $ticket = ticket::find($id);
        $input = $request->all();
        $ticket->update($input);
        return redirect('ticketcustom')->with('flash_message', 'ticket Updated!');  
    }


    public function destroy($id)
    {
        ticket::destroy($id);
        return redirect('ticketcustom')->with('flash_message', 'ticket deleted!');  
    }

    public function ajaxValidationStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ticket_id' => 'required',
            'ticket_by' => 'required',
            'ticket_for' => 'required',
            'manager' => 'required',
            'purpose' => 'required',
            'priority' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        if ($validator->passes()) {

             $input = $request->all();
            ticket::create($input);

            return response()->json(['success'=>'Added new records.']);
            
        }

        return response()->json(['error'=>$validator->errors()]);
    }
}
