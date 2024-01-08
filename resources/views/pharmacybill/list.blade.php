

@extends('layouts.app')
@section('title')
    {{ __('Pharmacy Bill') }}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">
@endsection
@section('content')
    @include('flash::message')
    <div class="card">
         <div class="d-flex align-items-center p-5">
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Pharmacy Bill Records</h1>
            </div>
        <div class="card-header border-0 pt-6">
            @include('layouts.search-component')
            <div class="card-toolbar">
                <div class="d-flex align-items-center py-1">
                    <div class="me-4">
                        <a href="#" class="btn btn-flex btn-light-primary fw-bolder"
                           data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                            <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                     viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path
                                            d="M5,4 L19,4 C19.2761424,4 19.5,4.22385763 19.5,4.5 C19.5,4.60818511 19.4649111,4.71345191 19.4,4.8 L14,12 L14,20.190983 C14,20.4671254 13.7761424,20.690983 13.5,20.690983 C13.4223775,20.690983 13.3458209,20.6729105 13.2763932,20.6381966 L10,19 L10,12 L4.6,4.8 C4.43431458,4.5790861 4.4790861,4.26568542 4.7,4.1 C4.78654809,4.03508894 4.89181489,4 5,4 Z"
                                            fill="#000000"></path>
                                    </g>
                                </svg>
                            </span>
                            {{ __('messages.common.filter') }}</a>
                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                             id="kt_menu_6113c71822d0d">
                            <div class="px-7 py-5">
                                <div class="fs-5 text-dark fw-bolder">{{ __('messages.common.filter_options') }}</div>
                            </div>
                            <div class="separator border-gray-200"></div>
                            <div class="px-7 py-5">
                           
                                <div class="d-flex justify-content-end">
                                    <button type="reset" class="btn btn-sm fs-6 btn-light btn-active-light-primary me-2"
                                            id="resetFilter"
                                            data-kt-menu-dismiss="true">{{ __('messages.common.reset') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn btn-primary ps-7 show menu-dropdown" data-kt-menu-trigger="click"
                       data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end"
                       data-kt-menu-flip="bottom">{{ __('messages.common.actions') }}
                        <span class="svg-icon svg-icon-2 me-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                               fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                <path
                                                                    d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z"
                                                                    fill="#000000" fill-rule="nonzero"
                                                                    transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                                                            </g>
                                                        </svg>
                                                    </span>
                    </a>
                    <div
                        class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold py-4 w-200px fs-6"
                        data-kt-menu="true">
                        <div class="menu-item px-5">
                        <a href="{{ route('pharma.add') }}"
                               class="menu-link px-5">{{ __('Add pharmacyBill') }}</a>
                        </div>
                      
                    </div>
                </div>
            </div>
            @if(Session::has('msg'))
            <div class="col-12">
                    <div class="alert alert-success">{{Session::get('msg')}}</div>
                </div>
            @endif
        </div>






        <div class="card-body pt-0 fs-6 py-8 px-8  px-lg-10 text-gray-700">
        <table class="table table-responsive-sm align-middle table-row-dashed fs-6 gy-5 dataTable no-footer w-100" id="pharmacytb">
    <thead>
    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
        <th>Bill Date</th>
        <th>Bill No</th>
        <th>Patient Name</th>
        <th>Doctar Name</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody class="text-gray-600 fw-bold">
    @foreach($pharama as $data)
        <tr>
        <td>{{$data->billdate}}</td>
        <td>{{$data->bill_no}}</td>
        <td>{{$data->first_name}} {{$data->last_name}}</td>
        <td>{{$data->df_name}} {{$data->dl_name}}</td>
        <td>
                        <a href="{{url('/pharma/delete/')}}/{{$data->id}}">
                        <button class="btn "><i class="fa fa-2xs fa-trash"></i></button>
                        </a>
                        <a href="{{url('/pharma/edit/')}}/{{$data->id}}">
                        <button class="btn   "><i class="fa fa-lg  fa-edit"></i></button>
                        </a>
                        <!-- <a href="{{url('/pharma/viewmodel/')}}/{{$data->id}}">
                        <button class="btn btn-primary">view</button>
                        </a> -->
                        
                        <!-- safe -->
                        <!-- <button type="button" value="{{$data->id}}" class="btn btn-primary showid  btn-lg" >show</button> -->
                        <a>
                        <button type="button"  value="{{$data->id}}" class="btn showid"><i class="fa fa-lg  fa-eye"></i></button>
                        </a>
                </td>
        


        </tr>

        @endforeach
    </tbody>
</table>

    <div class="modal fade" id="userShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width:900px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pharmacy Bill</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="stud_id"/>
                    <div class='mp' style='font-size:12px;margin:10px;font-family:Times New Roman'>
                        <div class="row">
                            <table class='table' style='width:91%;margin:0 auto;border-color: black;' frame="box">
                                <tr>
                                    <td colspan="2" style="border:solid black;border-width:1px 1px 1px 1px;padding:  2px;">
                                        <img src = assets/img/logo-red-black.png style="margin-top:5rem; padding:2px;">
                                    </td>
                                    <td colspan="2" style="border:solid black;border-width:1px 1px 1px 1px;padding:  5px;">
                                        <p style="text-align: center;border:solid black;border-width:0px 0px 0px 0px;padding: 0px;margin: 0px;">
                                            <font size="5"><b>HMS PVT.LTD.</b></font><br/>
                                            <font size="3">(UNIT OF HMS  PVT.LTD.)</font><br/>
                                            <font size="3" style=" word-spacing: 3px; line-height:1.8;">Flat No 156, 157, 158 & Flat No 154, 155, 1st Floor, D Wing, Kasturi Plaza, 
                                                Manpada Road,Dombivli, Maharashtra, 421201,
                                                 IndiaTelephone No:9324999941 GST No:27AAACC6606P1ZDDrug & Lic. No.:MH-TZ6-445865, MH-TZ6-445866, MH-TZ6-445867</font>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                            <table class='table' style='width:91%;margin:0 auto;border-color: black' frame="box">
                                <tr>
                                    <td style="border:solid black;border-width:0px 0px 0px 0px;"> 
                                        <p><strong style="margin-left:1rem;">Billdate:</strong> <span id="billdate"></span></p>
                                    </td>
                                    <td style="border:solid black;border-width:0px 0px 0px 0px;">            
                                        <p><strong>Patient Name:</strong> <span id="patient_name"></span></p>
                                    </td>
                                    <td  style="border:solid black;border-width:0px 0px 0px 0px;">
                                        <p><strong>Doctor Name:</strong> <span id="doctor_name"></span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border:solid black;border-width:0px 0px 0px 0px;">
                                        <p><strong style="margin-left:1rem;">Details:</strong> <span id="details"></span></p>
                                    </td>
                                    <td  style="border:solid black;border-width:0px 0px 0px 0px;">
                                        <p><strong>Patien Type:</strong> <span id="ptype"></span></p>
                                    </td>
                                    <td  style="border:solid black;border-width:0px 0px 0px 0px;">
                                        <p><strong>Bill No:</strong> <span id="billno"></span></p>
                                    </td>
                                </tr>
                            </table>
                            <table class='table' id="pharmaproductlist" style='width:91%;margin:0 auto;border-color: black;padding: 0px;' frame="box" >
                                <thead>
                                    <tr>
                                        <th class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;width: 10%;">
                                            SR.No
                                        </th>
                                        <th  class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;width:20%;">
                                            Product
                                        </th>
                                        <th  class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;width: 10%;">
                                            HSN Code
                                        </th>
                                        <th class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;width: 20%;">
                                            Expire Date
                                        </th>
                                        
                                        <th class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;width: 10%;">
                                            Mrp
                                        </th>
                                        <th class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;width: 5%;">
                                            Quanity
                                        </th>
                                        <th class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;width: 10%;">
                                            Amount
                                        </th>
                                        <th class='text-center' id="pregst" style="border:solid black;border-width:1px 1px 1px 1px;width: 10%;">
                                            Pre GST
                                        </th>
                                       
                                        <th class='text-center' id="cgstper" style="border:solid black;border-width:1px 1px 1px 1px;width: 10%;">
                                        CGST %
                                        </th>
                                        <th class='text-center' id="cgstamt"  style="border:solid black;border-width:1px 1px 1px 1px;width: 10%;">
                                        CGST AMT    
                                        </th>
                                        <th class='text-center' id="sgstper" style="border:solid black;border-width:1px 1px 1px 1px;width: 10%;">
                                        SGST %
                                        </th>
                                        <th class='text-center' id="sgstamt" style="border:solid black;border-width:1px 1px 1px 1px;width: 10%;">
                                        SGST AMT
                                        </th>
                                        <th class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;width: 10%;">
                                        IGST %
                                        </th>
                                        <th class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;width: 10%;">
                                        IGST AMT
                                        </th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="15" style="border-top:1px solid black;padding:7px;">
                                             <p style="text-align:right; margin-right:1rem; margin-bottom:0px;"><strong> Discount  Amount : </strong><span id="discount"></span></p>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td colspan="15" style="border-top:1px solid black;" class="text-right" >
                                             <p style="text-align:right; margin-right:1rem; margin-bottom:0px;" ><strong> Total  Amount : </strong><span id="ttlamt"></span></p>
                                        </td>
                                        
                                        <!-- <td colspan="7" style="border:1px solid black;">
                                             <p><strong> Total  Amount : </strong><span id="ttlamt"></span></p>
                                        </td> -->
                                    </tr>
                                    <tr>
                                        <td colspan="15" style="border-top:1px solid black;" class="text-right" >
                                             <p style="text-align:right; margin-right:1rem; margin-bottom:0px;"><strong> Discount Type : </strong><span id="discType"></span></p>
                                        </td>
                                        
                                       
                                    </tr>
                                    <tr>
                                    <td colspan="15" style="border:1px solid black;">
                                   
                                             <p style="text-align:right; margin-right:1rem; margin-bottom:0px;"><strong> Pending Amount : </strong><span id="pendingamt"></span></p>
                                        </td>
                                    </tr>
                                  
                                    
                                </tfoot>
                                   
                            </table>
                            <table class='table' id="pharmapaytlist" style='width:91%;margin:0 auto;border-color: black;padding: 0px;' frame="box">
                                <h1 class="text-center">Payment Details</h1>
                                <thead>
                                                <tr>
                                                        <th class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                            Payment Mode
                                                        </th>
                                                        <th class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                            Payment Date
                                                        </th>
                                                        <th  class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                            Remark
                                                        </th>
                                                        <th class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                            Amount
                                                        </th>
                                                </tr>
                                </thead>
                                <tbody>
                                                <!-- <tr>
                                                        <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                            <span id="payment_paymode"></span>
                                                        </td>
                                                        <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                            <span id="paymentdate"></span>
                                                        </td>
                                                        <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                            <span id="paymentremark"></span> 
                                                        </td>
                                                        <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                            <span id="amount"></span>
                                                        </td>
                                                </tr> -->

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="7" style="border:1px solid black; " class="text-right">
                                      
                                             <p style="text-align:right; margin-right:1rem; margin-bottom:0px;" > <strong> Total  Amount : </strong><span id="paidamt"></span></p>
                                        </td>
                                        
                                    </tr>
                                   <!-- <table style="margin-top:2rem; mergin-"> -->
                                   <table class='table'  style='width:91%;margin:0 auto;border-color: black;padding: 0px; margin-top:2rem;'  >

                                   <tbody>
                                   <tr>
                                   
					
                                    <td colspan="3" class='text-left mt-2' style="border:solid black;border-width:0px 0px 0px 0px;">
                                    <strong> Created By : </strong><span id="adminsign"></span>
                                    </td>
                                    
                                   
				                </tr>

                                <tr>
                                    <td colspan="6" class='text-left' style="border:solid black;border-width:0px 0px 0px 0px;">
                                   
                                    <strong> Reporting Time : </strong><span id="timing"></span>

                                   </td>
                                 
                                   <td colspan="6" class='text-right' style="border:solid black;border-width:0px 0px 0px 0px;">
                                        <strong style="margin-left:30rem;">  Authorised Signatory </strong>
                                    </td>
                                   
                                  
                               </tr>
                                
                                </tbody>
                                   </table>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button onclick="myprints()" class="btn btn-primary text-white ">Print</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
    </div>
        
</div>
        

@endsection

@section('scripts')
<script>
        function myprints()
        {
            window.print();
        }
    </script>

<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
<script type="text/javascript" src="//media.twiliocdn.com/sdk/js/client/v1.3/twilio.min.js"></script>
<script type="text/javascript" src="{{ asset('js/browser-calls.js') }}"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript">
       
$(document).ready(function () {  
    $(".showid").click(function(){
   
        
        var stud_id = $(this).val();
        // alert(stud_id);
       
            $("#userShowModal").modal('show');
        // var userURL = $(this).data('url');
        
        $.ajax({
            type    :"GET",
            url     :"/userspharma/"+stud_id,
            dataType:"json",
            success :function(response){
                console.log(response);
                if(response.status == "success"){
                    $("#pharmaproductlist tbody").html('');

                    let product_name = response.data[0].product_name;
                    let pro_array = product_name.split(",");
                    let taxcode_gst_array = response.data[0].product_taxcode.split(",");
                    // let taxcode_sgst_array = response.data[0].product_taxcode.split(",");
                    console.log(taxcode_gst_array);
                   
                    let hsncode_array = response.data[0].hsncode.split(",");
                   
                    let expire_date_array = response.data[0].expire_date.split(",");
                    let mrp_array = response.data[0].mrp.split(",");
                    let qty_array = response.data[0].qty.split(",");
                    let itemamount_array = response.data[0].itemamount.split(",");
                    let count = pro_array.length;
                    var all_pro_total_tax = 0;
                    
                    for(let i=0; i<pro_array.length; i++){
                        let html_row = '';
                         html_row += `<tr>
                                            <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                            <p><span id="id">${count}</span></p>
                                            </td>
                                            <td  class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                <p><span id="pr_name">${pro_array[i]}</span></p>   
                                            </td>
                                            <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                <p> <span id="hsncode">${hsncode_array[i]}</span></p>  
                                            </td>
                                            <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                <p> <span id="expire_date">${expire_date_array[i]}</span></p>    
                                            </td>
                                           
                                            <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                <p> <span id="mrp">${mrp_array[i]}</span></p>       
                                            </td>
                                            <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                <p><span id="qty">${qty_array[i]}</span></p>   
                                            </td>`;
                                let total_with_qty_amount = mrp_array[i] * qty_array[i];
                                let gst_amount = total_with_qty_amount - [total_with_qty_amount *(100/(100+parseFloat(taxcode_gst_array[i])))];
                                let pre_gst_amount = total_with_qty_amount - gst_amount;
                                let pre_gst_with_qty = pre_gst_amount * qty_array[i];
                                
                            html_row += ` <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                <p><span id="itemamount">${(total_with_qty_amount).toFixed(2)}</span></p>     
                                            </td>
                            
                            
                                            <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                <p> <span id="pregst">${(pre_gst_amount).toFixed(2)}</span></p>       
                                            </td>
                                           
                                            <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                <p><span id="cgstper">${(parseFloat(taxcode_gst_array[i])/2).toFixed(2)}</span></p>     
                                            </td>
                                            <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                <p><span id="cgstamt">${(gst_amount/2).toFixed(2)}</span></p>     
                                            </td>
                                            <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                <p><span id="sgstper">${(parseFloat(taxcode_gst_array[i])/2).toFixed(2)}</span></p>     
                                            </td>
                                            <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                <p><span id="sgstamt">${(gst_amount/2).toFixed(2)}</span></p>     
                                            </td>
                                            <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                <p><span id="">0</span></p>     
                                            </td>
                                            <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                <p><span id="">0</span></p>     
                                            </td>
                                             
                                           
                                                
                                           
                                    </tr>`;
                                    
                                    $("#pharmaproductlist tbody").prepend(html_row);
                                    count--;
                    }
                 
                    $("#patient_name").text(response.data[0].first_name + " " + response.data[0].last_name)
                    $("#doctor_name").text(response.data[0].df_name + " " + response.data[0].dl_name)
                    $("#billdate").text(response.data[0].billdate)
                    $("#ptype").text(response.data[0].patientType)
                    $("#details").text(response.data[0].details)
                    // $("#pr_name").text(response.data[0].pr_name)
                    // $("#expire_date").text(response.data[0].expire_date)
                    // $("#hsncode").text(response.data[0].hsncode)
                    // $("#mrp").text(response.data[0].mrp)
                    // $("#qty").text(response.data[0].qty)
                    // $("#itemamount").text(response.data[0].itemamount)
                    $("#discType").text(response.data[0].discType)
                    // $("#discRate").text(response.data[0].discRate)
                    $("#discount").text(response.data[0].discount)
                    $("#ttlamt").text((response.data[0].ttlamt ).toFixed(2))
                    $("#payment_paymode").text(response.data[0].py_name)
                    $("#paymentdate").text(response.data[0].paymentdate)
                    $("#paymentremark").text(response.data[0].paymentremark)
                    $("#amount").text(response.data[0].amount)


                    $("#pendingamt").text((response.data[0].ttlamt - response.data[0].paidamt).toFixed(2))

                   
                   
                    // $("#id").text(response.data[0].id)
                    $("#billno").text(response.data[0].bill_no);
                   

                    
                 
                   
                    // var b=parseInt($("#hdpendingamt"). val());
                    // var sum=a+b;
                    // alert($(sum));
                    
                   
                    
                    

                }else{
                    alert("fail");
                }
            }
        });
        
    });
    
});
   
</script>
<script type="text/javascript">
       
$(document).ready(function () {  
    $(".showid").click(function(){
   
        
        var stud_id = $(this).val();
        // alert(stud_id);
       
            $("#userShowModal").modal('show');
        // var userURL = $(this).data('url');
        
        $.ajax({
            type    :"GET",
            url     :"/userspharmapayment/"+stud_id,
            dataType:"json",
            success :function(response){
                console.log(response);
                if(response.status == "success"){
                    $("#pharmapaytlist tbody").html('');
                  
                   

                    let paymentmode_array = response.data[0].payment_name.split(",");
                    let pay_date = response.data[0].paymentdate;
                    let paydate_array = pay_date.split(",");
                    let paymentremark_array = response.data[0].paymentremark.split(",");
                    let amount_array = response.data[0].amount.split(",");
                    let count = paymentmode_array.length;
                    
                    for(let i=0; i<paymentmode_array.length; i++){
                        let html_row2 = ` <tr>
                                                <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                    <span id="paymentdate">${paymentmode_array[i]}</span>
                                                </td>
                                               
                                                <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                    <span id="paymentdate">${paydate_array[i]}</span>
                                                </td>
                                                <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                    <span id="paymentremark">${paymentremark_array[i]}</span> 
                                                </td>
                                                <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                    <span id="amount">${amount_array[i]}</span>
                                                </td>
                                            </tr>`;
                                   
                                    $("#pharmapaytlist tbody").prepend(html_row2);
                                    count--;
                    }
                    $("#paidamt").text(response.data[0].paidamt);
                    $("#adminsign").text(response.data[0].full_name)
                    $("#timing").text(response.data[0].timing)
                  
                  
                
                   
                   
                    
                   
                    
                    

                }else{
                    alert("fail");
                }
            }
        });
        
    });
    
});
   
</script>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#pharmacytb').DataTable({
				scrollX: true,
                "searching": false,
                pageLength : 5,
				dom: 'Blfrtip',
                buttons: [
                   {
                        extend: 'excelHtml5',
                        footer: true,
                        exportOptions: {
                            
                       }
                    }
                ],
                processing : true,
                order: [[0, 'desc']]
            });
        });
    </script>
    
@endsection










