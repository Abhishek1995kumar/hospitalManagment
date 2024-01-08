<?php

namespace App\Http\Controllers;

use App\Models\AdvancedPayment;
use App\Models\Bed;
use App\Models\Bill;
use App\Models\Doctor;
use App\Models\Enquiry;
use App\Models\Invoice;
use App\Models\Module;
use App\Models\NoticeBoard;
use App\Models\Nurse;
use App\Models\Patient;
use App\Models\ticket;
use App\Models\Contact;
use App\Models\Payment;
use App\Models\Setting;
use App\Repositories\DashboardRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use DB;
use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Location;


class HomeController extends AppBaseController
{
    private $dashboardRepository;

    /**
     * Create a new controller instance.
     *
     * @param  DashboardRepository  $dashboardRepository
     */
    public function __construct(DashboardRepository $dashboardRepository)
    {
        $this->middleware('auth');
        $this->dashboardRepository = $dashboardRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('home');
    }

    /**
     * @return Factory|View
     */
    public function dashboard()
    {
       // $data['invoiceAmount'] = Invoice::sum('amount');
       if(isset($_GET) && !empty($_GET)){
        $_SESSION["loc"] = $_GET['location'];
        $_SESSION["fin_year"] = $_GET['financial_year'];
        $location = $_GET['location'];
        //Doctor query//
       
      //  print_r($data['location_name']);die();

        $doctor = DB::select(DB::raw("SELECT count(*) as doctor_total FROM `doctors`
                                    JOIN users ON users.id = doctors.user_id
                                    WHERE users.lname = '$location'"));
                                  
        //Doctor query end//
        //Patient query
        $patient = DB::select(DB::raw("SELECT count(*) as patient_total FROM `patients`
            JOIN users ON users.id = patients.user_id
            WHERE users.lname = '$location'"));
           // print_r($patient);die();
        //patient end query//

//nurse query//
        $nurse = DB::select(DB::raw("SELECT count(*) as nurse_total FROM `nurses`
        JOIN users ON users.id = nurses.user_id
        WHERE users.lname = '$location'"));
//end nurse query//



        $data['doctors'] = $doctor[0]->doctor_total;
        $data['patients'] = $patient[0]->patient_total;
        $data['nurses'] = $nurse[0]->nurse_total;
        //print_r($data['patients']);die();
        

                       
       }else{
        $data['doctors'] = Doctor::count();
        $data['patients'] = Patient::count();
        $data['nurses'] = Nurse::count();
       }
       
        $data['invoiceAmount'] = totalAmount();
        $data['billAmount'] = Bill::sum('amount');
        $data['paymentAmount'] = Payment::sum('amount');
        $data['advancePaymentAmount'] = AdvancedPayment::sum('amount');
        
       
        //  print_r($data['doctors']);die();
        //$data['patients'] = Patient::count();
       // $data['nurses'] = Nurse::count();
        $data['availableBeds'] = Bed::whereIsAvailable(1)->count();
        $data['noticeBoards'] = NoticeBoard::take(5)->orderBy('id', 'DESC')->get();
        $data['enquiries'] = Enquiry::where('status', 0)->latest()->take(5)->get();
        $data['currency'] = Setting::CURRENCIES;
        $data['contacts'] = Contact::count();
       

//code for live date wise record//
        $todays_date = date("Y-m-d");

        $data['walkin']=DB::table('contacts')
        ->select('*')
        ->whereBetween(DB::raw('DATE(created_at)'), [$todays_date, $todays_date])
        ->count();

        $data['Registration'] = DB::table('contacts')
        ->select('status')
        ->where('status', 'Registration')
        ->whereBetween(DB::raw('DATE(created_at)'), [$todays_date, $todays_date])
        ->count();
        // print_r($data['Registration']); die();

        $data['OPD'] =DB::table('contacts')
        ->select('status')
        ->where('status', 'OPD')
        ->whereBetween(DB::raw('DATE(created_at)'), [$todays_date, $todays_date])
        ->count();

        $data['Dilation'] =DB::table('contacts')
        ->select('status')
        ->where('status', 'Dilation')
        ->whereBetween(DB::raw('DATE(created_at)'), [$todays_date, $todays_date])
        ->count();

        $data['Doctor Visit']=DB::table('contacts')
        ->select('status')
        ->where('status', 'Doctor Visit')
        ->whereBetween(DB::raw('DATE(created_at)'), [$todays_date, $todays_date])
        ->count();

        $data['Counsellor'] =DB::table('contacts')
        ->select('status')
        ->where('status', 'Counsellor')
        ->whereBetween(DB::raw('DATE(created_at)'), [$todays_date, $todays_date])
        ->count();

        $data['Waiting'] =DB::table('contacts')
        ->select('status')
        ->where('status', 'Waiting')
        ->whereBetween(DB::raw('DATE(created_at)'), [$todays_date, $todays_date])
        ->count();

        $data['Pharmacy'] =DB::table('contacts')
        ->select('status')
        ->where('status', 'Pharmacy')
        ->whereBetween(DB::raw('DATE(created_at)'), [$todays_date, $todays_date])
        ->count();
        
        $data['Billing'] = DB::table('contacts')
        ->select('status')
        ->where('status', 'Billing')
        ->whereBetween(DB::raw('DATE(created_at)'), [$todays_date, $todays_date])
        ->count();

        // return response()->json($data);

         //$data['walkin'] = Contact::where('visitreference', 'walkin',)->count();

        //$data['Dilation'] = Contact::where('status', 'Dilation')->count();
       // $data['Doctor Visit'] = Contact::where('status', 'Doctor Visit')->count();
        //$data['Counsellor'] = Contact::where('status', 'Counsellor')->count();
        //$data['Waiting'] = Contact::where('status', 'Waiting')->count();
        //$data['Pharmacy'] = Contact::where('status', 'Pharmacy')->count();
        //$data['Billing'] = Contact::where('status', 'Billing')->count();

        $modules = Module::pluck('is_active', 'name')->toArray();
        $ticketsCount = ticket::count();     
     
        return view('dashboard.index', compact('data', 'modules','ticketsCount'));
    }

    public function patient_live_data()
    {
        $todays_date = date("Y-m-d");

        $data['walkin']=DB::table('contacts')
        ->select('*')
        ->whereBetween(DB::raw('DATE(created_at)'), [$todays_date, $todays_date])
        ->count();

        $data['Registration'] = DB::table('contacts')
        ->select('status')
        ->where('status', 'Registration')
        ->whereBetween(DB::raw('DATE(created_at)'), [$todays_date, $todays_date])
        ->count();

        $data['OPD'] =DB::table('contacts')
        ->select('status')
        ->where('status', 'OPD')
        ->whereBetween(DB::raw('DATE(created_at)'), [$todays_date, $todays_date])
        ->count();

        $data['Dilation'] =DB::table('contacts')
        ->select('status')
        ->where('status', 'Dilation')
        ->whereBetween(DB::raw('DATE(created_at)'), [$todays_date, $todays_date])
        ->count();

        $data['DoctorVisit']=DB::table('contacts')
        ->select('status')
        ->where('status', 'DoctorVisit')
        ->whereBetween(DB::raw('DATE(created_at)'), [$todays_date, $todays_date])
        ->count();

        $data['Counsellor'] =DB::table('contacts')
        ->select('status')
        ->where('status', 'Counsellor')
        ->whereBetween(DB::raw('DATE(created_at)'), [$todays_date, $todays_date])
        ->count();

        $data['Waiting'] =DB::table('contacts')
        ->select('status')
        ->where('status', 'Waiting')
        ->whereBetween(DB::raw('DATE(created_at)'), [$todays_date, $todays_date])
        ->count();

        $data['Pharmacy'] =DB::table('contacts')
        ->select('status')
        ->where('status', 'Pharmacy')
        ->whereBetween(DB::raw('DATE(created_at)'), [$todays_date, $todays_date])
        ->count();
        
        $data['Billing'] = DB::table('contacts')
        ->select('status')
        ->where('status', 'Billing')
        ->whereBetween(DB::raw('DATE(created_at)'), [$todays_date, $todays_date])
        ->count();

        return response()->json($data);
    }

    /**
     * @param  Request  $request
     *
     * @return JsonResponse
     */
    public function incomeExpenseReport(Request $request)
    {
        $data = $this->dashboardRepository->getIncomeExpenseReport($request->all());

        return $this->sendResponse($data, 'Income and Expense report retrieved successfully.');
    }

    public function log_in(Request $request)
    {
       $id= Auth::id();
        $today_date = Carbon::now();
        $var  = Carbon::now('Asia/Kolkata');
        $current_date = date("Y-m-d");
        $time = $var->toTimeString();

        // $time = {{ $calllog['delivery_date']->format('h:i') }};

        // print_r($time); die();
        

        $count = DB::select(DB::raw("SELECT count(*) as counts FROM `attendance` WHERE emp = $id AND date = '$current_date'"));

        $num_rows =$count[0]->counts;
        // print_r($num_rows);die();

        if($num_rows > 0){
             $data = DB::select(DB::raw("UPDATE attendance SET shift_start = '$time'  WHERE emp = $id AND date = '$current_date'"));
        }else{
            $user_name = DB::select(DB::raw("SELECT CONCAT(first_name,' ',last_name) AS name FROM `users` WHERE id=$id"));
            $emp_name = $user_name[0]->name;
            $data = DB::select(DB::raw("INSERT INTO attendance (emp, date, shift_start, emp_name) VALUES($id, '$current_date', '$time', '$emp_name')"));
        }        


        if ($data) {
            echo 'success';
        }else{
            echo 'failed';
        }
       
    }

    public function log_out(Request $request)
    {
        $id = Auth::id();
        $today_date = Carbon::now();
        $current_date = date("Y-m-d");
        $var  = Carbon::now('Asia/Kolkata');
        $time = $var->toTimeString();

        $count = DB::select(DB::raw("SELECT count(*) as counts FROM `attendance` WHERE emp = $id AND date = '$current_date'"));

        $num_rows =$count[0]->counts;
        // print_r($num_rows);die();

        if($num_rows > 0){
             $data = DB::select(DB::raw("UPDATE attendance SET shift_end = '$time'  WHERE emp = $id AND date = '$current_date'"));
        }else{
            $user_name = DB::select(DB::raw("SELECT CONCAT(first_name,' ',last_name) AS name FROM `users` WHERE id=$id"));
            $emp_name = $user_name[0]->name;
            $data = DB::select(DB::raw("INSERT INTO attendance (emp, date, shift_end, emp_name) VALUES($id, '$current_date', '$time', '$emp_name')"));
        }  
       
        if ($data) {
            echo 'success';
        }else{
            echo 'failed';
        }
       
    }

    public function tea_in(Request $request)
    {
        $id = Auth::id();
        $today_date = Carbon::now();
        $current_date = date("Y-m-d");
        $var  = Carbon::now('Asia/Kolkata');
        $time = $var->toTimeString();

        $count = DB::select(DB::raw("SELECT count(*) as counts FROM `attendance` WHERE emp = $id AND date = '$current_date'"));

        $num_rows =$count[0]->counts;
        // print_r($num_rows);die();

        if($num_rows > 0){
             $data = DB::select(DB::raw("UPDATE attendance SET tea_break = '$time'  WHERE emp = $id AND date = '$current_date'"));
        }else{
            $user_name = DB::select(DB::raw("SELECT CONCAT(first_name,' ',last_name) AS name FROM `users` WHERE id=$id"));
            $emp_name = $user_name[0]->name;
            $data = DB::select(DB::raw("INSERT INTO attendance (emp, date, tea_break, emp_name) VALUES($id, '$current_date', '$time', '$emp_name')"));
        }  
       
        if ($data) {
            echo 'success';
        }else{
            echo 'failed';
        }
       
    }
    public function tea_out(Request $request)
    {
        $id = Auth::id();
        $today_date = Carbon::now();
         $current_date = date("Y-m-d");
        $var  = Carbon::now('Asia/Kolkata');
        $time = $var->toTimeString();

        $count = DB::select(DB::raw("SELECT count(*) as counts FROM `attendance` WHERE emp = $id AND date = '$current_date'"));

        $num_rows =$count[0]->counts;
        // print_r($num_rows);die();

        if($num_rows > 0){
             $data = DB::select(DB::raw("UPDATE attendance SET tea_break_out = '$time'  WHERE emp = $id AND date = '$current_date'"));
        }else{
            $user_name = DB::select(DB::raw("SELECT CONCAT(first_name,' ',last_name) AS name FROM `users` WHERE id=$id"));
            $emp_name = $user_name[0]->name;
            $data = DB::select(DB::raw("INSERT INTO attendance (emp, date, tea_break_out, emp_name) VALUES($id, '$current_date', '$time', '$emp_name')"));
        } 
       
        if ($data) {
            echo 'success';
        }else{
            echo 'failed';
        }
       
    }

    public function lunch_in(Request $request)
    {
        $id = Auth::id();
        $today_date = Carbon::now();
         $current_date = date("Y-m-d");
        $var  = Carbon::now('Asia/Kolkata');
        $time = $var->toTimeString();

        $count = DB::select(DB::raw("SELECT count(*) as counts FROM `attendance` WHERE emp = $id AND date = '$current_date'"));

        $num_rows =$count[0]->counts;
        // print_r($num_rows);die();

        if($num_rows > 0){
             $data = DB::select(DB::raw("UPDATE attendance SET lunch_break = '$time'  WHERE emp = $id AND date = '$current_date'"));
        }else{
            $user_name = DB::select(DB::raw("SELECT CONCAT(first_name,' ',last_name) AS name FROM `users` WHERE id=$id"));
            $emp_name = $user_name[0]->name;
            $data = DB::select(DB::raw("INSERT INTO attendance (emp, date, lunch_break, emp_name) VALUES($id, '$current_date', '$time', '$emp_name')"));
        } 
       
        if ($data) {
            echo 'success';
        }else{
            echo 'failed';
        }
       
    }

    public function lunch_out(Request $request)
    {
        $id = Auth::id();
        $today_date = Carbon::now();
         $current_date = date("Y-m-d");
        $var  = Carbon::now('Asia/Kolkata');
        $time = $var->toTimeString();

        $count = DB::select(DB::raw("SELECT count(*) as counts FROM `attendance` WHERE emp = $id AND date = '$current_date'"));

        $num_rows =$count[0]->counts;
        // print_r($num_rows);die();

        if($num_rows > 0){
             $data = DB::select(DB::raw("UPDATE attendance SET lunch_break_out = '$time'  WHERE emp = $id AND date = '$current_date'"));
        }else{
            $user_name = DB::select(DB::raw("SELECT CONCAT(first_name,' ',last_name) AS name FROM `users` WHERE id=$id"));
            $emp_name = $user_name[0]->name;
            $data = DB::select(DB::raw("INSERT INTO attendance (emp, date, lunch_break_out, emp_name) VALUES($id, '$current_date', '$time', '$emp_name')"));
        } 

        if ($data) {
            echo 'success';
        }else{
            echo 'failed';
        }
       
    }

    public function meeting_in(Request $request)
    {
        $id = Auth::id();
        $today_date = Carbon::now();
         $current_date = date("Y-m-d");
        $var  = Carbon::now('Asia/Kolkata');
        $time = $var->toTimeString();

        $count = DB::select(DB::raw("SELECT count(*) as counts FROM `attendance` WHERE emp = $id AND date = '$current_date'"));

        $num_rows =$count[0]->counts;
        // print_r($num_rows);die();

        if($num_rows > 0){
             $data = DB::select(DB::raw("UPDATE attendance SET meeting_break = '$time'  WHERE emp = $id AND date = '$current_date'"));
        }else{
            $user_name = DB::select(DB::raw("SELECT CONCAT(first_name,' ',last_name) AS name FROM `users` WHERE id=$id"));
            $emp_name = $user_name[0]->name;
            $data = DB::select(DB::raw("INSERT INTO attendance (emp, date, meeting_break, emp_name) VALUES($id, '$current_date', '$time', '$emp_name')"));
        } 
       
        if ($data) {
            echo 'success';
        }else{
            echo 'failed';
        }
       
    }
//ujwala start code//
    public function meeting_out(Request $request)
    {
        $id = Auth::id();
        $today_date = Carbon::now();
         $current_date = date("Y-m-d");
        $var  = Carbon::now('Asia/Kolkata');
        $time = $var->toTimeString();

        $count = DB::select(DB::raw("SELECT count(*) as counts FROM `attendance` WHERE emp = $id AND date = '$current_date'"));

        $num_rows =$count[0]->counts;
        // print_r($num_rows);die();

        if($num_rows > 0){
             $data = DB::select(DB::raw("UPDATE attendance SET meeting_break_out = '$time'  WHERE emp = $id AND date = '$current_date'"));
        }else{
            $user_name = DB::select(DB::raw("SELECT CONCAT(first_name,' ',last_name) AS name FROM `users` WHERE id=$id"));
            $emp_name = $user_name[0]->name;
            $data = DB::select(DB::raw("INSERT INTO attendance (emp, date, meeting_break_out, emp_name) VALUES($id, '$current_date', '$time', '$emp_name')"));
        } 
       
        if ($data) {
            echo 'success';
        }else{
            echo 'failed';
        }
       
    }

    //kishori start code location//

    public function fetch_location(Request $request){
        $data = DB::table('location')
        ->where('id',$request->id)
        ->pluck('financial_year','id');
        return response()->json($data);
     //print_r($data); die();
    }
// start code on search location base

function test(Request $request)
{
    // print_r($_POST['location']);die();
   
    // $dat = DB::table('users')->where('lname', $_SESSION["loc"])->get();
// echo "<pre>";
//    print_r($_SESSION);die();
//redirect('/dashboard');
//return redirect('/bdashoard');
//return view('bdashoard.index');
}



}
//end code//
