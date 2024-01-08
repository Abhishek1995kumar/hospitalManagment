<?php

namespace App\Http\Controllers;
use App\Models\pharmacybill;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Medicine;
use App\Models\Preot;
use App\Models\Preottest;
use App\Models\Role;
use App\Models\Department;
use DB;
use Illuminate\Support\Facades\Validator;
class RoleController extends Controller
{
    function show ()
    {
        $rolemasters = Role::all();
        return view('masterrole.list')->with(compact('rolemasters'));
    }

    function add (){
        // session_start();
        // $dd = $_SESSION["system_list"];
        // echo "<pre>";
        // print_r($dd);die();
        // echo "</pre>";
        $rolemasters = Role::all();
        //$rolemasterlist = DB::table('roles_master_list')->select(array('title','type'))->get();
        $rolemasterlist = DB::table('roles_master_list')->select('*')->get();
        // echo "<pre>";
        // print_r($rolemasterlist);die();
        // echo "</pre>";
       
        return view('masterrole.add',compact('rolemasters','rolemasterlist'));
     }

    function save (Request $request)
    {
        $validator = Validator::make($request->all(),[
            // 'patinet_id'=>'required',
            // 'diagnosis' => 'required',
            // 'investigation' => 'required',
            // 'investigation for' => 'required', 
            

        ]);
            if($validator->passes())
            {
              
                $rolemasters=new role;
                if( (isset($_POST['is_admin'])) && ($_POST['is_admin'] != '') ) $is_admin = (($_POST['is_admin'] == 'Admin') ? 'Y' : 'N' );
		        else $is_admin = 'N';
                $data_process = $this->insert_data();
                // echo "<pre>";
                // print_r($data_process); die();

                $system_list = $data_process['system_list'];
                $commonmaster_list = $data_process['commonmaster_list'];
                $productmaster_list = $data_process['productmaster_list'];
                $supplychain_list = $data_process['supplychain_list'];
                $transactionmaster_list = $data_process['transactionmaster_list'];
                $hrmmaster_list = $data_process['hrmmaster_list'];
                $masters_list = $data_process['masters_list'];
                $doctor_list = $data_process['doctor_list'];
                $lab_list = $data_process['lab_list'];
               // print_r($lab_list);die();
                $patient_list = $data_process['patient_list'];
                $bloodbank_list = $data_process['bloodbank_list'];
                $bed_list = $data_process['bed_list'];
                $reports_list = $data_process['reports_list'];
                $services_list = $data_process['services_list'];
                $frontcms_list = $data_process['frontcms_list'];
                $smsmail_list = $data_process['smsmail_list'];
                $documents_list = $data_process['documents_list'];
                $diagnosis_list = $data_process['diagnosis_list'];
                $hospitalcharges_list = $data_process['hospitalcharges_list'];
                $finance_list = $data_process['finance_list'];
                $frontoffice_list = $data_process['frontoffice_list'];
                $setting_list = $data_process['setting_list'];

                 $rolemasters->role_description = $request['role_description'];
                 $rolemasters->status = $request['status'];
                 $rolemasters->is_admin = $is_admin;
                
                 $rolemasters->system_list = $system_list;
                 $rolemasters->commonmaster_list = $commonmaster_list;
                 $rolemasters->productmaster_list = $productmaster_list;
                 $rolemasters->supplychain_list = $supplychain_list;
                 $rolemasters->transactionmaster_list = $transactionmaster_list;
                 $rolemasters->hrmmaster_list = $hrmmaster_list;
                 $rolemasters->masters_list = $masters_list;
                 $rolemasters->doctor_list = $doctor_list;
                 $rolemasters->lab_list = $lab_list;
                 $rolemasters->patient_list = $patient_list;
                 $rolemasters->bloodbank_list = $bloodbank_list;
                 $rolemasters->bed_list = $bed_list;
                 $rolemasters->reports_list = $reports_list;
                 $rolemasters->services_list = $services_list;
                 $rolemasters->frontcms_list = $frontcms_list;
                 $rolemasters->smsmail_list = $smsmail_list;
                 $rolemasters->documents_list = $documents_list;
                 $rolemasters->diagnosis_list = $diagnosis_list;
                 $rolemasters->hospitalcharges_list = $hospitalcharges_list;
                 $rolemasters->finance_list = $finance_list;
                 $rolemasters->frontoffice_list = $frontoffice_list;
                 $rolemasters->setting_list = $setting_list;
            
                // echo "<pre>";
                // print_r($rolemasters);die();
                //code for insert data on two table//
                $resp = $rolemasters->save();
                $insert_id = $rolemasters->id;
                $actions = $data_process['actions'];
                // print_r($insert_id); die();
                if($resp){

                    if($insert_id != '') {
                        
                        $actions = $data_process['actions'];
                        $actions['per_ref_id'] = $insert_id;
                        //print_r($actions);die();
                        // $action_data[]
                        // $actions_data['created_on']	= time();
                        $query = DB::table('role_submenu_list')->insert($actions, $actions['per_ref_id']);
                        // if($query) return true;
                        // else return false; n
                    }
                  }
                if($resp){
                    $input = new Department;
                    $input->name = $request['role_description'];
                    $input->guard_name = 'web';
                    $input->is_active = '1';
                    $resp2 = $input->save();
                }
                $request->session()->flash('msg','Save Succesfully');
                return redirect('/masterrole');
            }
            else{
                return redirect('masterrole/add')->withErrors($validator)->withInput();
            }
       }

    public function deleterole($id,Request $request)
    {
        Role::where('id',$id)->delete();
        $request->session()->flash('msg','Record Has Been Delete Succesfully');
        return redirect('/masterrole');
        //echo "<pre>";
        //print_r($customer);
     }

     public function editrole($id)
    {
       $rolemasters = Role::find($id);
       
    //echo"<pre>";
    //print_r($rolemasters);die();
    $statusone= Role::all();
   // print_r($statusone);die();
       
      $role_data=DB::table('role_submenu_list')
      ->select('*')
      ->where('per_ref_id','=',$id)
      ->get();
    // echo"<pre>";
    // print_r($role_data);die();
    
      $role_details=DB::table('rolemaster')
      ->select('*')
      ->get();


    //    echo"<pre>";
    //    print_r($role_details);die();

    //   print_r($data['rolemasters']); die();
    //    $rolemasterlist = DB::table('roles_master_list')
    //                 ->select('*')
    //                 ->where('id','=',$id)
    //                 ->get()
    //                 ->toarray();
    $rolemasterlist = DB::table('roles_master_list')->select('*')->get();

    

        // echo"<pre>";
        // print_r($rolemasterlist);die();
        $editrole = DB::table('rolemaster')
        ->select('role_submenu_list.*','rolemaster.*') 
        ->from('rolemaster')
        ->leftjoin('role_submenu_list', 'rolemaster.id','=' ,'role_submenu_list.per_ref_id')
        ->where('rolemaster.id','=',$id)
        ->get();
        //          echo"<pre>";
        //  print_r($editrole);die();
       
       foreach($editrole as $data)
       {
        // echo "<pre>";
        // print_r( $data); die();
        

            $action = array();
            $lm_actions = $data->lm_actions;
            $rm_actions =  $data->rm_actions;
            $nur_actions = $data->nur_actions;
            $tickma_actions=$data->tickma_actions;
            $lp_actions=$data->lp_actions;
            $app_actions=$data->app_actions;
            $pro_actions=$data->pro_actions;
            $categ_actions=$data->categ_actions;
            $subcateg_actions=$data->subcateg_actions;
            $tm_actions=$data->tm_actions;
            $vr_actions=$data->vr_actions;
            $vpo_actions=$data->vpo_actions;
            $nppo_actions=$data->nppo_actions;
            $hi_actions=$data->hi_actions;
            $ap_actions=$data->ap_actions;
            $ipp_actions=$data->ipp_actions;
            $sd_actions=$data->sd_actions;
            $pb_actions=$data->pb_actions;
            $um_actions=$data->um_actions;
            $lem_actions=$data->lem_actions;
            $al_actions=$data->al_actions;
            $am_actions=$data->am_actions;
            $pm_actions=$data->pm_actions;
            $da_actions=$data->da_actions;
            $ce_actions=$data->ce_actions;
            $preot_actions=$data->preot_actions;
            $postot_actions=$data->postot_actions;
           $doct_actions = $data->doct_actions;
           $dd_actions = $data->dd_actions;
           $sch_actions = $data->sch_actions;
           $rc_actions = $data ->rc_actions;
           $rt_actions=$data->rt_actions;
           $pc_actions=$data->pc_actions;
           $pt_actions=$data->pt_actions;
           $pati_actions=$data->pati_actions;
           $pa_actions=$data->pa_actions;
           $pf_actions=$data->pf_actions;
           $bb_actions=$data->bb_actions;
           $bdo_actions=$data->bdo_actions;
           $bds_actions=$data->bds_actions;
           $bi_actions=$data->bi_actions;
          
           $br_actions=$data->br_actions;
           $dr_actions=$data->dr_actions;
           $ir_actions=$data->ir_actions;
           $or_actions=$data->or_actions;
           $ambu_actions=$data->ambu_actions;
           $ac_actions=$data->ac_actions;
           $lt_actions=$data->lt_actions;
           $cm_actions=$data->cm_actions;
           $fcs_actions=$data->fcs_actions;
           $nb_actions =$data->nb_actions;
           $testi_actions=$data->testi_actions;
           $sm_actions=$data->sm_actions;
           $mai_actions=$data->mai_actions;
           $doc_actions=$data->doc_actions;
           $dt_actions=$data->dt_actions;
           $dc_actions=$data->dc_actions;
           $diat_actions=$data->diat_actions;
           $enq_actions=$data->enq_actions;
           $cc_actions=$data->cc_actions;
           $cha_actions=$data->cha_actions;
           $docharg_actions=$data->docharg_actions;
           $in_actions=$data->in_actions;
           $ex_actions=$data->ex_actions;
           $cl_actions=$data->cl_actions;
           $vis_actions=$data->vis_actions;
           $pr_actions=$data->pr_actions;
           $pd_actions=$data->pd_actions;
           $gen_actions=$data->gen_actions;
           $hs_actions=$data->hs_actions;
           $ss_actions=$data->ss_actions;


           $id=$data->id;
           $role_description=$data->role_description;
           $status=$data->status;
           $is_admin=$data->is_admin;
           $system_list=$data->system_list;
           $productmaster_list=$data->productmaster_list;
           $commonmaster_list=$data->commonmaster_list;
           $supplychain_list=$data->supplychain_list;
           $transactionmaster_list=$data->transactionmaster_list;
           $hrmmaster_list=$data->hrmmaster_list;
           $masters_list=$data->masters_list;
           $doctor_list=$data->doctor_list;
           $lab_list=$data->lab_list;
           $patient_list=$data->patient_list;
           $bloodbank_list=$data->bloodbank_list;
           $reports_list=$data->reports_list;
           $services_list=$data->services_list;
           $frontcms_list=$data->frontcms_list;
           $smsmail_list=$data->smsmail_list;
           $documents_list=$data->documents_list;
           $diagnosis_list=$data->diagnosis_list;
           $hospitalcharges_list=$data->hospitalcharges_list;
           $finance_list=$data->finance_list;
           $frontoffice_list=$data->frontoffice_list;
           $setting_list=$data->setting_list;
        //   echo "<pre>";
        //  print_r($data->productmaster_list);die();
          

          $data = array();
            // print_r($ss_actions);
            // die();

            // //System//
             $actions['lm'] = (($lm_actions != '') ? explode(',', $lm_actions) : '');
             $actions['rm'] = (($rm_actions != '') ? explode(',', $rm_actions) : '');
                
          

            
	        //Common Master//
	    	$actions['nur'] = (($nur_actions != '') ? explode(',', $nur_actions) : '');
            $actions['tickma'] = (($tickma_actions != '') ? explode(',', $tickma_actions) : '');
            $actions['lp'] = (($lp_actions != '') ? explode(',', $lp_actions) : '');
	    	$actions['app'] = (($app_actions != '') ? explode(',', $app_actions) : '');
            // echo "<pre>";
            // print_r($actions['nur']);die();
           


          //Product Master//
            $actions['pro'] = (($pro_actions != '') ? explode(',', $pro_actions) : '');
	    	$actions['categ'] = (($categ_actions != '') ? explode(',', $categ_actions) : '');
            $actions['subcateg'] = (($subcateg_actions != '') ? explode(',', $subcateg_actions) : '');
	    	$actions['tm'] = (($tm_actions != '') ? explode(',', $tm_actions) : '');
            // echo "<pre>";
            // print_r($actions['pro']);die();
           
            
	    		
         //Supply Chain//
        $actions['vr'] = (($vr_actions != '') ? explode(',', $vr_actions) : '');
	    $actions['vpo'] = (($vpo_actions != '') ? explode(',', $vpo_actions) : '');
        $actions['nppo'] = (($nppo_actions != '') ? explode(',', $nppo_actions) : '');
      


        //Transaction Master//
        $actions['hi'] = (($hi_actions != '') ? explode(',', $hi_actions) : '');
	    $actions['ap'] = (($ap_actions != '') ? explode(',', $ap_actions) : '');
        $actions['ip'] = (($ipp_actions != '') ? explode(',', $ipp_actions) : '');
        $actions['sd'] = (($sd_actions != '') ? explode(',', $sd_actions) : '');
	    $actions['pb'] = (($pb_actions != '') ? explode(',', $pb_actions) : '');
        // echo "<pre>";
        // print_r($actions['ip']);die();
       


        //HRM//
        $actions['um'] = (($um_actions != '') ? explode(',', $um_actions) : '');
	    $actions['lem'] = (($lem_actions != '') ? explode(',', $lem_actions) : '');
        $actions['al'] = (($al_actions != '') ? explode(',', $al_actions) : '');
        $actions['am'] = (($am_actions != '') ? explode(',', $sd_actions) : '');
	    $actions['pm'] = (($pm_actions != '') ? explode(',', $pm_actions) : '');
      

        //Masters// 
        $actions['da'] = (($da_actions != '') ? explode(',', $da_actions) : '');
	    $actions['ce'] = (($ce_actions != '') ? explode(',', $ce_actions) : '');
        $actions['preot'] = (($preot_actions != '') ? explode(',', $preot_actions) : '');
        $actions['postot'] = (($postot_actions != '') ? explode(',', $postot_actions) : '');
      


        //Doctor// 
        $actions['doct'] = (($doct_actions != '') ? explode(',', $doct_actions) : '');
        $actions['dd'] = (($dd_actions != '') ? explode(',', $dd_actions) : '');
        $actions['sch'] = (($sch_actions!= '') ? explode(',', $sch_actions) : '');
        

        //Lab// 
        $actions['rc'] = (($rc_actions != '') ? explode(',', $rc_actions) : '');
        $actions['rt'] = (($rt_actions != '') ? explode(',', $rt_actions) : '');
        $actions['pc'] = (($pc_actions != '') ? explode(',', $pc_actions) : '');
        $actions['pt'] = (($pt_actions != '') ? explode(',', $pt_actions) : '');
       


          //Patient//
            $actions['pati'] = (($pati_actions != '') ? explode(',', $pati_actions) : '');
             $actions['pa'] = (($pa_actions != '') ? explode(',', $pa_actions) : '');
            $actions['pf'] = (($pf_actions != '') ? explode(',', $pf_actions) : ''); 
        

        //Blood Bank//
        $actions['bb']= (($bb_actions != '') ? explode(',', $bb_actions) : '');
        $actions['bdo']= (($bdo_actions != '') ? explode(',', $bdo_actions) : '');
        $actions['bds']= (($bds_actions != '') ? explode(',', $bds_actions) : '');
        $actions['bi']= (($bi_actions != '') ? explode(',', $bi_actions) : '');

       
        

         //Reports//
         $actions['br']= (($br_actions != '') ? explode(',', $br_actions) : '');
         $actions['dr']= (($dr_actions != '') ? explode(',', $dr_actions) : '');
         $actions['ir']= (($ir_actions != '') ? explode(',', $ir_actions) : '');
         $actions['or']= (($or_actions != '') ? explode(',', $or_actions) : '');
        

         //Services//
         $actions['ambu']= (($ambu_actions != '') ? explode(',', $ambu_actions) : '');
        $actions['ac']= (($ac_actions!= '') ? explode(',', $ac_actions) : '');
         $actions['lt']= (($lt_actions != '') ? explode(',', $lt_actions) : '');
     


        //Front CMS//
         $actions['cm']= (($cm_actions != '') ? explode(',', $cm_actions) : '');
        $actions['fcs']= (($fcs_actions != '') ? explode(',', $fcs_actions) : '');
        $actions['nb']= (($nb_actions != '') ? explode(',', $nb_actions) : '');
         $actions['testi']= (($testi_actions != '') ? explode(',', $testi_actions) : '');
       
         //sms-mail//
        $actions['sm']= (($sm_actions != '') ? explode(',', $sm_actions) : '');
        $actions['mai']= (($mai_actions != '') ? explode(',', $mai_actions) : '');
       



         //Documents//
        $actions['doc']= (($doc_actions != '') ? explode(',', $doc_actions) : '');
        $actions['dt']= (($dt_actions != '') ? explode(',', $dt_actions) : '');
        // echo "<pre>";
        // print_r($actions['dt']);die();
        

         //Diagnosis//
        $actions['dc']= (($dc_actions != '') ? explode(',', $dc_actions) : '');
        $actions['diat']= (($diat_actions != '') ? explode(',', $diat_actions) : '');
        $actions['enq']= (($enq_actions != '') ? explode(',', $enq_actions) : '');
        

         //Hospital Charges//
        $actions['cc']= (($cc_actions != '') ? explode(',', $cc_actions) : '');
        $actions['cha']= (($cha_actions != '') ? explode(',', $cha_actions) : '');
        $actions['docharg']= (($docharg_actions != '') ? explode(',', $docharg_actions) : '');
       

        //Finance//
        $actions['in']= (($in_actions != '') ? explode(',', $in_actions) : '');
        $actions['ex']= (($ex_actions != '') ? explode(',', $ex_actions) : '');
       
         //Front Office//
        $actions['cl']= (($cl_actions != '') ? explode(',', $cl_actions) : '');
        $actions['vis']= (($vis_actions != '') ? explode(',', $vis_actions) : '');
        $actions['pr']= (($pr_actions != '') ? explode(',', $pr_actions) : '');
        $actions['pd']= (($pd_actions != '') ? explode(',', $pd_actions) : '');

       

        //Setting//
         $actions['gen']= (($gen_actions != '') ? explode(',', $gen_actions) : '');
         $actions['hs']= (($hs_actions != '') ? explode(',', $hs_actions) : '');
         $actions['ss']= (($ss_actions != '') ? explode(',', $ss_actions) : '');

         $data['id'] = $id;
         $data['role_description'] = $role_description;
         $data['status']=$status;
         $data['is_admin']=$is_admin;
         
       
          $data['system_list'] = (($system_list != '') ? explode(',', $system_list) : '' );
          $data['productmaster_list'] = (($productmaster_list != '') ? explode(',', $productmaster_list) : '' );
          $data['supplychain_list'] = (($supplychain_list != '') ? explode(',', $supplychain_list) : '' );
          $data['commonmaster_list'] = (($commonmaster_list != '') ? explode(',', $commonmaster_list) : '' );
          $data['transactionmaster_list'] = (($transactionmaster_list != '') ? explode(',',$transactionmaster_list) : '');
          $data['hrmmaster_list'] = (($hrmmaster_list != '') ? explode(',', $hrmmaster_list) : '' );
          $data['masters_list'] = (($masters_list != '') ? explode(',', $masters_list) : '' );
          $data['doctor_list'] = (($doctor_list != '') ? explode(',', $doctor_list) : '' );
          $data['lab_list'] = (($lab_list != '') ? explode(',', $lab_list) : '' );
          $data['patient_list'] = (($patient_list != '') ? explode(',', $patient_list) : '' );
          $data['bloodbank_list'] = (($bloodbank_list != '') ? explode(',', $bloodbank_list) : '' );
         
          $data['reports_list'] = (($reports_list != '') ? explode(',', $reports_list) : '' );
          $data['services_list'] = (($services_list != '') ? explode(',', $services_list) : '' );
          $data['frontcms_list'] = (($frontcms_list != '') ? explode(',', $frontcms_list) : '' );
          $data['smsmail_list'] = (($smsmail_list != '') ? explode(',', $smsmail_list) : '' );
          $data['documents_list'] = (($documents_list != '') ? explode(',', $documents_list) : '' );
          $data['diagnosis_list'] = (($diagnosis_list != '') ? explode(',', $diagnosis_list) : '' );
          $data['hospitalcharges_list'] = (($hospitalcharges_list != '') ? explode(',', $hospitalcharges_list) : '' );
          $data['finance_list'] = (($finance_list != '') ? explode(',', $finance_list) : '' );
          $data['frontoffice_list'] = (($frontoffice_list != '') ? explode(',', $frontoffice_list) : '' );
          $data['setting_list'] = (($setting_list != '') ? explode(',', $setting_list) : '' );
         
        //  print($data['system_list']);die();
        }
        // echo "<pre>";
        // print_r($actions);die();
        // echo "<pre>";
        // print_r($actions); die();
        return view('masterrole.edit',compact('rolemasterlist','rolemasters','data','role_data', 'actions','statusone'));
    }




   

public function updaterole($id,Request $request)
    {
        $validator = Validator::make($request->all(),[
            // 'patinet_id'=>'required',
            // 'diagnosis' => 'required',
            // 'investigation' => 'required',
            // 'investigation for' => 'required', 
        ]);
        if($validator->passes())
        {
            $rolemasters = Role::find($id);
            $rolemasters->role_description = $request['role_description'];
            $rolemasters->status = $request['status'];

            $rolemasters->save();
            $request->session()->flash('msg','update Succesfully');
            return redirect('/masterrole');
        }
        else{
            return redirect('masterrole/edit/'.$id)->withErrors($validator)->withInput();
        }
    }


    function check_permission_exit($employee_id){
        $this->db->select('id');
        $this->db->where('employee_id',$employee_id);
        $this->db->from('rolemaster');
        $query = $this->db->get();
        //print_r($query);die();
        $result = $query->row_array();
        if($query->num_rows()>0){
            return $result['id'];
        }else{
            return false;
        }
    }


    public function allot_actions($array, $id) {
    	$action = array();
    	
    	foreach($array as $row => $val) {
			$actions = explode('_', $val);

			if($actions[0] == $id) {
				foreach($actions as $rows => $r_act) {
					$action[] = ( (!is_numeric($r_act)) ? $r_act : '');
				}
			}
		}

		$action_data = array_filter($action);

		if(!empty($action_data)) return implode(',',$action_data);
		else return false;
    }


    public function insert_data() {
        $role_list_details = DB::table('roles_master_list')->select('*')->get();
        
        $system_list = array();
       // print_r($system_list);die();
        $commonmaster_list = array();
        $productmaster_list = array();
        $supplychain_list = array();
        $transactionmaster_list = array();
        $hrmmaster_list = array();
        $masters_list = array();
        $doctor_list = array();
        $lab_list = array();
        $patient_list = array();
        $bloodbank_list = array();
        $bed_list=array();
        $reports_list= array();
        $services_list = array();
        $frontcms_list = array();
        $smsmail_list = array();
        $documents_list = array();
        $diagnosis_list = array();
        $hospitalcharges_list = array();
        $finance_list = array();
        $frontoffice_list = array();
        $setting_list = array();
        $actions = array();
        // $actions['per_ref_id'] = $insert_id ;
        foreach($role_list_details as $row) {
      
            if($row->type == 'System') {
                if($row->short_form == 'lm') {
                    $actions['lm_actions'] = $this->allot_actions($_POST['actions'], $row->id);
                    $system_list[] = ( (!empty($actions['lm_actions'])) ? strtoupper($row->short_form) : '');
                    
                }
                if($row->short_form == 'rm') {
                    $actions['rm_actions'] = $this->allot_actions($_POST['actions'], $row->id);
                    $system_list[] = ((!empty($actions['rm_actions'])) ? strtoupper($row->short_form) : '');
                }
               }

            if($row->type == 'Common Master') {
                if($row->short_form == 'nur') {
                    $actions['nur_actions'] = $this->allot_actions($_POST['actions'], $row->id);
                     $commonmaster_list[] = ( (!empty($actions['nur_actions'])) ? strtoupper($row->short_form) : '');
                }
                if($row->short_form == 'tickma') {
                    $actions['tickma_actions'] = $this->allot_actions($_POST['actions'], $row->id);
                    $commonmaster_list[] = ( (!empty($actions['tickma_actions'])) ? strtoupper($row->short_form) : '');
                }
                if($row->short_form == 'lp') {
                    $actions['lp_actions'] = $this->allot_actions($_POST['actions'], $row->id);
                    $commonmaster_list[] = ( (!empty($actions['lp_actions'])) ? strtoupper($row->short_form) : '');
                }
                if($row->short_form == 'app') {
                    $actions['app_actions'] = $this->allot_actions($_POST['actions'], $row->id);
                    $commonmaster_list[] = ( (!empty($actions['app_actions'])) ? strtoupper($row->short_form) : '');
                }
             }

            if($row->type == 'Product Master') {
                if($row->short_form == 'pro') {
                    $actions['pro_actions'] = $this->allot_actions($_POST['actions'],$row->id);
                    $productmaster_list[] = ( (!empty($actions['pro_actions'])) ? strtoupper($row->short_form) : '');
                }
                if($row->short_form == 'categ') {
                    $actions['categ_actions'] = $this->allot_actions($_POST['actions'],$row->id);
                    $productmaster_list[] = ((!empty($actions['categ_actions'])) ? strtoupper($row->short_form) : '');
                }
                if($row->short_form == 'subcateg') {
                    $actions['subcateg_actions'] = $this->allot_actions($_POST['actions'], $row->id);
                    $productmaster_list[] = ( (!empty($actions['subcateg_actions'])) ? strtoupper($row->short_form) : '');
                }
                if($row->short_form == 'tm') {
                    $actions['tm_actions'] = $this->allot_actions($_POST['actions'], $row->id);
                    $productmaster_list[] = ( (!empty($actions['tm_actions'])) ? strtoupper($row->short_form) : '');
                }
            }


            if($row->type == 'Supply Chain') {
                if($row->short_form  == 'vr') {
                    $actions['vr_actions'] = $this->allot_actions($_POST['actions'], $row->id);
                    $supplychain_list[] = ( (!empty($actions['vr_actions'])) ? strtoupper($row->short_form) : '');
                }
                if($row->short_form  == 'vpo') {
                    $actions['vpo_actions'] = $this->allot_actions($_POST['actions'], $row->id);
                    $supplychain_list[] = ( (!empty($actions['vpo_actions'])) ? strtoupper($row->short_form) : '');
                }
                if($row->short_form  == 'nppo') {
                    $actions['nppo_actions'] = $this->allot_actions($_POST['actions'], $row->id);
                    $supplychain_list[] = ( (!empty($actions['nppo_actions'])) ? strtoupper($row->short_form) : '');
                }
            }

            if($row->type == 'Transaction Master') {
                if($row->short_form == 'hi') {
                    $actions['hi_actions'] = $this->allot_actions($_POST['actions'], $row->id);
                    $transactionmaster_list[] = ((!empty($actions['hi_actions'])) ? strtoupper($row->short_form) : '');
                }
                if($row->short_form == 'ap') {
                    $actions['ap_actions'] = $this->allot_actions($_POST['actions'], $row->id);
                    $transactionmaster_list[] = ((!empty($actions['ap_actions'])) ? strtoupper($row->short_form) : '');
                }
                if($row->short_form == 'ip') {
                    $actions['ipp_actions'] = $this->allot_actions($_POST['actions'], $row->id);
                    $transactionmaster_list[] = ( (!empty($actions['ipp_actions'])) ? strtoupper($row->short_form) : '');
                    // print_r($transactionmaster_list);die();
                }

                if($row->short_form == 'sd') {
                    $actions['sd_actions'] = $this->allot_actions($_POST['actions'],$row->id);
                    $transactionmaster_list[] = ( (!empty($actions['sd_actions'])) ? strtoupper($row->short_form) : '');
                }

                if($row->short_form == 'pb') {
                    $actions['pb_actions'] = $this->allot_actions($_POST['actions'], $row->id);
                    $transactionmaster_list[] = ( (!empty($actions['pb_actions'])) ? strtoupper($row->short_form) : '');
                   // print_r($transactionmaster_list);die();
                }
            }

            if($row->type =='HRM') {
                if($row->short_form == 'um') {
                    $actions['um_actions'] = $this->allot_actions($_POST['actions'], $row->id);
                    $hrmmaster_list[] = ((!empty($actions['um_actions'])) ? strtoupper($row->short_form) :'');
                }
                if($row->short_form  == 'lem') {
                    $actions['lem_actions'] = $this->allot_actions($_POST['actions'], $row->id);
                    $hrmmaster_list[] = ((!empty($actions['lem_actions'])) ? strtoupper($row->short_form) :'');
                }
                if($row->short_form  == 'al') {
                    $actions['al_actions'] = $this->allot_actions($_POST['actions'], $row->id);
                    $hrmmaster_list[] = ((!empty($actions['al_actions'])) ? strtoupper($row->short_form) :'');
                }
                if($row->short_form  == 'am') {
                    $actions['am_actions'] = $this->allot_actions($_POST['actions'], $row->id);
                    $hrmmaster_list[] = ((!empty($actions['am_actions'])) ? strtoupper($row->short_form) :'');
                }
                if($row->short_form  == 'pm') {
                    $actions['pm_actions'] = $this->allot_actions($_POST['actions'], $row->id);
                    $hrmmaster_list[] = ((!empty($actions['pm_actions'])) ? strtoupper($row->short_form) :'');
                }
            }

            if($row->type == "Masters") {
                if($row->short_form == 'da') {
                    $actions['da_actions'] = $this->allot_actions($_POST['actions'], $row->id);
                    $masters_list[] = ((!empty($actions['da_actions'])) ? strtoupper($row->short_form) : '');
                }
                if($row->short_form == 'ce') {
                    $actions['ce_actions'] = $this->allot_actions($_POST['actions'],$row->id);
                    $masters_list[] = ((!empty($actions['ce_actions'])) ? strtoupper($row->short_form) : '');
                }
                if($row->short_form == 'preot') {
                    $actions['preot_actions'] = $this->allot_actions($_POST['actions'], $row->id);
                    $masters_list[] = ((!empty($actions['preot_actions'])) ? strtoupper($row->short_form) : '');
                }

                if($row->short_form == 'postot') {
                    $actions['postot_actions'] = $this->allot_actions($_POST['actions'], $row->id);
                    $masters_list[] = ((!empty($actions['postot_actions'])) ? strtoupper($row->short_form) : '');
                }
            }

            if($row->type == 'Doctor') {
                if($row->short_form == 'doct') {
                    $actions['doct_actions']=$this->allot_actions($_POST['actions'],$row->id);
                    $doctor_list[]=((!empty($actions['doct_actions'])) ? strtoupper($row->short_form) : '');
                }
                if($row->short_form == 'dd') {
                    $actions['dd_actions']=$this->allot_actions($_POST['actions'],$row->id);
                    $doctor_list[]=((!empty($actions['dd_actions'])) ? strtoupper($row->short_form) : '');
                }
                if($row->short_form == 'sch') {
                    $actions['sch_actions']=$this->allot_actions($_POST['actions'], $row->id);
                    $doctor_list[]=((!empty($actions['sch_actions'])) ? strtoupper($row->short_form) : '');
                }
              }

              if($row->type == 'Lab') {
                if($row->short_form == 'rc') {
                    $actions['rc_actions']=$this->allot_actions($_POST['actions'],$row->id);
                    $lab_list[]=((!empty($actions['rc_actions'])) ? strtoupper($row->short_form) : '');
                }
                if($row->short_form == 'rt') {
                    $actions['rt_actions']=$this->allot_actions($_POST['actions'],$row->id);
                    $lab_list[]=((!empty($actions['rt_actions'])) ? strtoupper($row->short_form) : '');
                }
                if($row->short_form == 'pc') {
                    $actions['pc_actions']=$this->allot_actions($_POST['actions'], $row->id);
                    $lab_list[]=((!empty($actions['pc_actions'])) ? strtoupper($row->short_form) : '');
                }
                if($row->short_form == 'pt') {
                    $actions['pt_actions']=$this->allot_actions($_POST['actions'], $row->id);
                    $lab_list[]=((!empty($actions['pt_actions'])) ? strtoupper($row->short_form) : '');
                }
              }
              

              if($row->type == 'Patient') {
                if($row->short_form == 'pati') {
                    $actions['pati_actions']=$this->allot_actions($_POST['actions'],$row->id);
                    $patient_list[]=((!empty($actions['pati_actions'])) ? strtoupper($row->short_form) : '');
                }
                if($row->short_form == 'pa') {
                    $actions['pa_actions']=$this->allot_actions($_POST['actions'],$row->id);
                    $patient_list[]=((!empty($actions['pa_actions'])) ? strtoupper($row->short_form) : '');
                }
                if($row->short_form == 'pf') {
                    $actions['pf_actions']=$this->allot_actions($_POST['actions'], $row->id);
                    $patient_list[]=((!empty($actions['pf_actions'])) ? strtoupper($row->short_form) : '');
                }
                
              }


              if($row->type == 'Bed Management') {
                if($row->short_form == 'bt') {
                    $actions['bt_actions']=$this->allot_actions($_POST['actions'],$row->id);
                    $bed_list[]=((!empty($actions['bt_actions'])) ? strtoupper($row->short_form) : '');
                   
                }
                if($row->short_form == 'bd') {
                    $actions['bd_actions']=$this->allot_actions($_POST['actions'],$row->id);
                    $bed_list[]=((!empty($actions['bd_actions'])) ? strtoupper($row->short_form) : '');
                 
                }
             }



              if($row->type == 'Blood Bank') {
                if($row->short_form == 'bb') {
                    $actions['bb_actions']=$this->allot_actions($_POST['actions'],$row->id);
                    $bloodbank_list[]=((!empty($actions['bb_actions'])) ? strtoupper($row->short_form) : '');
                }
                if($row->short_form == 'bdo') {
                    $actions['bdo_actions']=$this->allot_actions($_POST['actions'],$row->id);
                    $bloodbank_list[]=((!empty($actions['bdo_actions'])) ? strtoupper($row->short_form) : '');
                }
                if($row->short_form == 'bds') {
                    $actions['bds_actions']=$this->allot_actions($_POST['actions'], $row->id);
                    $bloodbank_list[]=((!empty($actions['bds_actions'])) ? strtoupper($row->short_form) : '');
                }
                if($row->short_form == 'bi') {
                    $actions['bi_actions']=$this->allot_actions($_POST['actions'], $row->id);
                    $bloodbank_list[]=((!empty($actions['bi_actions'])) ? strtoupper($row->short_form) : '');
                }
                
              }



             

              if($row->type == 'Reports') {
                if($row->short_form == 'br'){
                    $actions['br_actions']=$this->allot_actions($_POST['actions'],$row->id);
                    $reports_list[]=((!empty($actions['br_actions'])) ? strtoupper($row->short_form) : '');
                }
                if($row->short_form == 'dr'){
                    $actions['dr_actions']=$this->allot_actions($_POST['actions'],$row->id);
                    $reports_list[]=((!empty($actions['dr_actions'])) ? strtoupper($row->short_form) : '');
                }
                if($row->short_form == 'ir'){
                    $actions['ir_actions']=$this->allot_actions($_POST['actions'],$row->id);
                    $reports_list[]=((!empty($actions['ir_actions'])) ? strtoupper($row->short_form) : '');
                }
                if($row->short_form == 'or') {
                    $actions['or_actions']=$this->allot_actions($_POST['actions'],$row->id);
                    $reports_list[]=((!empty($actions['or_actions'])) ? strtoupper($row->short_form) : '');
                }
             }


             if($row->type == 'Services') {
                if($row->short_form == 'ambu'){
                    $actions['ambu_actions']=$this->allot_actions($_POST['actions'],$row->id);
                    $services_list[]=((!empty($actions['ambu_actions'])) ? strtoupper($row->short_form) : '');
                }
                if($row->short_form == 'ac'){
                    $actions['ac_actions']=$this->allot_actions($_POST['actions'],$row->id);
                    $services_list[]=((!empty($actions['ac_actions'])) ? strtoupper($row->short_form) : '');
                }
                if($row->short_form == 'lt'){
                    $actions['lt_actions']=$this->allot_actions($_POST['actions'],$row->id);
                    $services_list[]=((!empty($actions['lt_actions'])) ? strtoupper($row->short_form) : '');
                }
                }


                
             if($row->type == 'Front CMS'){
                if($row->short_form == 'cm'){
                    $actions['cm_actions']=$this->allot_actions($_POST['actions'],$row->id);
                    $frontcms_list[]=((!empty($actions['cm_actions'])) ? strtoupper($row->short_form) : '');
                }
                if($row->short_form == 'fcs'){
                    $actions['fcs_actions']=$this->allot_actions($_POST['actions'],$row->id);
                    $frontcms_list[]=((!empty($actions['fcs_actions'])) ? strtoupper($row->short_form) : '');
                }
                if($row->short_form == 'nb'){
                    $actions['nb_actions']=$this->allot_actions($_POST['actions'],$row->id);
                    $frontcms_list[]=((!empty($actions['nb_actions'])) ? strtoupper($row->short_form) : '');
                }
                if($row->short_form == 'testi'){
                    $actions['testi_actions']=$this->allot_actions($_POST['actions'],$row->id);
                    $frontcms_list[]=((!empty($actions['testi_actions'])) ? strtoupper($row->short_form) : '');
                }
                }



                if($row->type == 'SMS/Mail'){
                    if($row->short_form == 'sm'){
                        $actions['sm_actions']=$this->allot_actions($_POST['actions'],$row->id);
                        $smsmail_list[]=((!empty($actions['sm_actions'])) ? strtoupper($row->short_form) : '');
                    }
                    if($row->short_form == 'mai'){
                        $actions['mai_actions']=$this->allot_actions($_POST['actions'],$row->id);
                        $smsmail_list[]=((!empty($actions['mai_actions'])) ? strtoupper($row->short_form) : '');
                    }
                }

                if($row->type == 'Documents'){
                    if($row->short_form == 'doc'){
                        $actions['doc_actions']=$this->allot_actions($_POST['actions'],$row->id);
                        $documents_list[]=((!empty($actions['doc_actions'])) ? strtoupper($row->short_form) : '');
                    }
                    if($row->short_form == 'dt'){
                        $actions['dt_actions']=$this->allot_actions($_POST['actions'],$row->id);
                        $documents_list[]=((!empty($actions['dt_actions'])) ? strtoupper($row->short_form) : '');
                    }
                }


                if($row->type == 'Diagnosis'){
                    if($row->short_form == 'dc'){
                        $actions['dc_actions']=$this->allot_actions($_POST['actions'],$row->id);
                        $diagnosis_list[]=((!empty($actions['dc_actions'])) ? strtoupper($row->short_form) : '');
                    }
                    if($row->short_form == 'diat'){
                        $actions['diat_actions']=$this->allot_actions($_POST['actions'],$row->id);
                        $diagnosis_list[]=((!empty($actions['diat_actions'])) ? strtoupper($row->short_form) : '');
                    }
                    if($row->short_form == 'enq'){
                        $actions['enq_actions']=$this->allot_actions($_POST['actions'],$row->id);
                        $diagnosis_list[]=((!empty($actions['enq_actions'])) ? strtoupper($row->short_form) : '');
                    }
                }

                if($row->type == 'Hospital Charges'){
                    if($row->short_form == 'cc'){
                        $actions['cc_actions']=$this->allot_actions($_POST['actions'],$row->id);
                        $hospitalcharges_list[]=((!empty($actions['cc_actions'])) ? strtoupper($row->short_form) : '');
                    }
                    if($row->short_form == 'cha'){
                        $actions['cha_actions']=$this->allot_actions($_POST['actions'],$row->id);
                        $hospitalcharges_list[]=((!empty($actions['cha_actions'])) ? strtoupper($row->short_form) : '');
                    }
                    if($row->short_form == 'docharg'){
                        $actions['docharg_actions']=$this->allot_actions($_POST['actions'],$row->id);
                        $hospitalcharges_list[]=((!empty($actions['docharg_actions'])) ? strtoupper($row->short_form) : '');
                    }
                }

                if($row->type == 'Finance'){
                    if($row->short_form == 'in'){
                        $actions['in_actions']=$this->allot_actions($_POST['actions'],$row->id);
                        $finance_list[]=((!empty($actions['in_actions'])) ? strtoupper($row->short_form) : '');
                    }
                    if($row->short_form == 'ex'){
                        $actions['ex_actions']=$this->allot_actions($_POST['actions'],$row->id);
                        $finance_list[]=((!empty($actions['ex_actions'])) ? strtoupper($row->short_form) : '');
                    }
                    
                }


                
                if($row->type == 'Front Office'){
                    if($row->short_form == 'cl'){
                        $actions['cl_actions']=$this->allot_actions($_POST['actions'],$row->id);
                        $frontoffice_list[]=((!empty($actions['cl_actions'])) ? strtoupper($row->short_form) : '');
                    }
                    if($row->short_form == 'vis'){
                        $actions['vis_actions']=$this->allot_actions($_POST['actions'],$row->id);
                        $frontoffice_list[]=((!empty($actions['vis_actions'])) ? strtoupper($row->short_form) : '');
                    }
                    if($row->short_form == 'pr'){
                        $actions['pr_actions']=$this->allot_actions($_POST['actions'],$row->id);
                        $frontoffice_list[]=((!empty($actions['pr_actions'])) ? strtoupper($row->short_form) : '');
                    }
                    if($row->short_form == 'pd'){
                        $actions['pd_actions']=$this->allot_actions($_POST['actions'],$row->id);
                        $frontoffice_list[]=((!empty($actions['pd_actions'])) ? strtoupper($row->short_form) : '');
                    }
                }

                if($row->type == 'Setting'){
                    if($row->short_form == 'gen'){
                        $actions['gen_actions']=$this->allot_actions($_POST['actions'],$row->id);
                        $setting_list[]=((!empty($actions['gen_actions'])) ? strtoupper($row->short_form) : '');
                    }
                    if($row->short_form =='hs'){
                        $actions['hs_actions']=$this->allot_actions($_POST['actions'],$row->id);
                        $setting_list[]=((!empty($actions['hs_actions'])) ? strtoupper($row->short_form) : '');
                    }
                    if($row->short_form == 'ss'){
                        $actions['ss_actions']=$this->allot_actions($_POST['actions'],$row->id);
                        $setting_list[]=((!empty($actions['ss_actions'])) ? strtoupper($row->short_form) : '');
                    }

                }

               
}


        $system_list=((!empty( $system_list)) ? implode(',', array_filter($system_list)) : '');
        $commonmaster_list=((!empty($commonmaster_list)) ? implode(',', array_filter($commonmaster_list)) : '');
        $productmaster_list=((!empty($productmaster_list)) ? implode(',', array_filter($productmaster_list)) : '');
        $supplychain_list=((!empty($supplychain_list )) ? implode(',', array_filter($supplychain_list )) : '');
        $transactionmaster_list=((!empty( $transactionmaster_list)) ? implode(',', array_filter($transactionmaster_list)) : '');
        $hrmmaster_list = ((!empty($hrmmaster_list)) ? implode(',', array_filter($hrmmaster_list)) : '');
        $masters_list = ((!empty($masters_list)) ? implode(',', array_filter($masters_list)) : '');
        $doctor_list = ((!empty($doctor_list)) ? implode(',', array_filter($doctor_list)) : '');
        $lab_list = ((!empty($lab_list)) ? implode(',', array_filter($lab_list)) : '');
        $patient_list = ((!empty($patient_list)) ? implode(',', array_filter($patient_list)) : '');
        $bed_list = ((!empty($bed_list)) ? implode(',',array_filter($bed_list)) : '');
        $bloodbank_list = ((!empty($bloodbank_list)) ? implode(',', array_filter($bloodbank_list)) : '');
        $reports_list = ((!empty($reports_list)) ? implode(',', array_filter($reports_list)) : '');
        $services_list = ((!empty($services_list)) ? implode(',', array_filter($services_list)) : '');
        $frontcms_list = ((!empty($frontcms_list)) ? implode(',', array_filter($frontcms_list)) : '');
        $smsmail_list = ((!empty($smsmail_list)) ? implode(',', array_filter($smsmail_list)) : '');
        $documents_list = ((!empty($documents_list)) ? implode(',', array_filter($documents_list)) : '');
        $diagnosis_list = ((!empty($diagnosis_list)) ? implode(',', array_filter($diagnosis_list)) : '');
        $hospitalcharges_list=((!empty($hospitalcharges_list)) ? implode(',', array_filter($hospitalcharges_list)) : '');
        $finance_list=((!empty($finance_list)) ? implode(',', array_filter($finance_list)) : '');
        $frontoffice_list=((!empty($frontoffice_list)) ? implode(',', array_filter($frontoffice_list)) : '');
        $setting_list=((!empty($setting_list)) ? implode(',', array_filter($setting_list)) : '');
        
        return array(
            'system_list' =>$system_list,
            'commonmaster_list' =>$commonmaster_list,
            'productmaster_list' =>$productmaster_list,
            'supplychain_list' => $supplychain_list,
            'transactionmaster_list' => $transactionmaster_list,
            'hrmmaster_list' => $hrmmaster_list,
            'masters_list' =>$masters_list, 
            'doctor_list' =>$doctor_list,
            'lab_list' =>$lab_list,
            'patient_list'=>$patient_list,
            'bed_list'=>$bed_list,
            'bloodbank_list'=>$bloodbank_list,
            'reports_list'=>$reports_list,
            'services_list'=>$services_list,
            'frontcms_list'=>$frontcms_list,
            'smsmail_list'=>$smsmail_list,
            'documents_list'=>$documents_list,
            'diagnosis_list'=>$diagnosis_list,
            'hospitalcharges_list'=>$hospitalcharges_list,
            'finance_list'=>$finance_list,
            'frontoffice_list'=>$frontoffice_list,
            'setting_list'=>$setting_list,
            'actions' => $actions,
            

            
         

            //'reports_list' => $reports_list,
           //'actions' => $actions,
        );
    }
}


   


























    
	




