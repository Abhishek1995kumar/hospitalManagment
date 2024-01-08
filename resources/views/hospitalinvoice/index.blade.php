@extends('layouts.app')
@section('title')
    {{ __('Hospital Invoice') }}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">
@endsection
@section('content')
    @include('flash::message')
    <div class="card">
       <div class="d-flex align-items-center p-5">
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Hospital Invoice Records </h1>
            </div>
        <div class="card-header border-0 pt-6">
           <!--State code serch-->
<div>
        <input type="search" id="hospitalin" data-datatable-filter="search" name="search" 
               class="form-control form-control-solid w-250px ps-14" placeholder="Search"/>
</div>
<!--end code serch -->
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
                        <a href="{{ route('hospitalinvoice.create') }}"
                               class="menu-link px-5">{{ __('Add Hospital Invoice') }}</a>
                        </div>
                        <div class="menu-item px-5">
                            <a href="{{ route('patient.excel') }}"
                               class="menu-link px-5">{{ __('messages.common.export_to_excel') }}</a>
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
                <table class="table table-responsive-sm align-middle table-row-dashed fs-6 gy-5 dataTable no-footer w-100" id="hospitalinvoice">
            <thead>
            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                        <th>Sr.No</th>
                                        <th>Mr.Date</th>
                                        <th>Doctor Name</th>
                                        <th>Patient Name</th>
                                        <!-- <th>Cancel Status</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="hospitals">
                                @foreach($contacts as $item)
                                <tr class="border-top border-light">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->mr_discharge_date}}</td>
                                        <td>{{$item->df_name}} {{$item->dl_name}}</td>
                                        <td>{{$item->first_name}} {{$item->last_name}}</td>
                                        <td>

                                           <!--  <a href="{{url('/hospitalinvoice/delete/')}}/{{$item->id}}">
                        <button class="btn"><i class="fa fa-2xs fa-trash"></i></button>
                        </a>
                        <a href="{{url('/hospitalinvoice/edit/')}}/{{$item->id}}">
                        <button class="btn   "><i class="fa fa-lg  fa-edit"></i></button>
                        </a>
                        <a>
                        <button type="button"  value="{{$item->id}}" class="btn showid"><i class="fa fa-lg  fa-eye"></i></button>
                        </a> -->

                            <a>
                        <button type="button"  value="{{$item->id}}" class="btn showid"><i class="fa fa-lg  fa-eye"></i></button>
                        </a>

                                       <!--  <a  href="{{ ('/hospitalinvoice/'. $item->id) }}">
                                            <button class="btn btn-light"><i class="fa fa-eye clicks" class="btn btn-info btn-sm"></i></button></a> -->
                                            
                                            <a href="{{ url('/hospitalinvoice/' . $item->id . '/edit') }}">
                                                <button class="btn"><i class="fa fa-lg  fa-edit"></i></button></a>
                                            <form method="POST" action="{{ url('/hospitalinvoice' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-2xs fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div></div>
</div>

<div class="modal fade" id="userShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="margin-left:25rem;" class="modal-title" id="exampleModalLabel">Hospital Invoice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="stud_id"/>
                <div class='mp' style='font-size:12px;margin:10px;font-family:Times New Roman'>
                    <div class="row">
                        <table class='table' style='width:91%;margin:0 auto;border-color: black' frame="box">
                            <tr>
                                <td colspan="2" style="border:solid black;border-width:1px 1px 1px 1px;padding:  2px;">
                                    <img src = assets/img/logo-red-black.png style="margin-top:2rem;">
                                </td>
                                <td colspan="2" style="border:solid black;border-width:1px 1px 1px 1px;padding:  2px;">
                                    <p style="text-align: center;border:solid black;border-width:0px 0px 0px 0px;padding: 0px;margin: 0px;">
                                        <font size="5"><b>HMS PVT.LTD.</b></font><br/>
                                        <font size="3">(UNIT OF HMS  PVT.LTD.)</font><br/>
                                        <font size="2">Flat No 156, 157, 158 & Flat No 154, 155, 1st Floor, D Wing, Kasturi Plaza, Manpada Road,Dombivli, Maharashtra, 421201, India </font><br>
                                        <font size="2">Telephone No:9324999941</font><br>
                                        <font size="2">GST No:27AAACC6606P1ZD</font><br>
                                        <font size="2">Drug & Lic. No.:MH-TZ6-445865, MH-TZ6-445866, MH-TZ6-445867</font>
                                    </p>
                                </td>
                            </tr>
                        </table>
                        <table class='table' style='width:91%;margin:0 auto;border-color: black' frame="box">
                            <tr>
                                <td style="padding:1.5rem 0 0 1rem;border:solid black;border-width:0px 0px 0px 0px;"> 
                                    <strong>Hospitl Invoice NO:</strong> <span id="invoice_no"></span>
                                </td>

                                <td style="padding:1.5rem 0 0 0;border:solid black;border-width:0px 0px 0px 0px;"> 
                                    <strong>Patient Name:</strong> <span id="patient_name"></span>
                                </td>
                                <td style="padding:1.5rem 0 0 0;border:solid black;border-width:0px 0px 0px 0px;">            
                                    <strong>Doctor Name:</strong> <span id="doctor_name"></span>
                                </td>
                                <td  style="padding:1.5rem 0 0 0;border:solid black;border-width:0px 0px 0px 0px;">
                                    <strong>Patient Type:</strong> <span id="ptype"></span>
                                </td>
                            </tr>
                                <tr>
                                    <td style="padding-left:1rem;border:solid black;border-width:0px 0px 0px 0px;">
                                         <p><strong>Product Details:</strong> <span id="details"></span></p>
                                    </td>
                                    
                                </tr>
                            </table>
                            <table class='table' id="hosmaproductlist" style='width:91%;margin:0 auto;border-color: black;padding: 0px;' frame="box" >
                                <thead>
                                    <tr>
                                        <th class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;width: 10%;">
                                            SR.No
                                        </th>
                                        <th  class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;width:20%;">
                                            Product
                                        </th>
                                        <th  class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;width: 10%;">
                                            Quantity
                                        </th>
                                        <th class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;width: 20%;">
                                            MRP
                                        </th>
                                        <th class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;width: 10%;">
                                            Amount
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="text-end" colspan="4" style="border-top:1px solid black; border-right:1px solid black;">
                                             <p><strong class="text-center"> Discount  Amount</strong></p>
                                        </td>
                                       <td style="border-top:1px solid black;"><span id="discount"></span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-end" colspan="4" style="border-top:1px solid black;border-right:1px solid black;">
                                             <p ><strong class="text-center"> Total  Amount</strong></p>
                                        </td>
                                        <td style="border-top:1px solid black;"><span id="ttlamt"></span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-end" colspan="4" style="border-top:1px solid black;border-right:1px solid black;">
                                             <p ><strong class="text-center"> Discount Type</strong></p>
                                        </td>
                                        <td style="border-top:1px solid black;"><span id="disc_Type"></span></td>
                                    </tr>
                                 </tfoot>
                            </table>
                            <div style="margin-left:2.6rem; width:91.05%;border:0.5px solid black;padding:0.5rem;">
                                <table class='table' id="pharmapaytlist" style='width:91%;margin:0 auto;border-color: black;padding: 0px;' frame="box">
                                    <h3 class="text-center">Payment Details</h3>    
                                    <thead>
                                        <tr>
                                            <th class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                Payment Mode
                                            </th>
                                            <th class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                Payment Type
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
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="7" style="padding:1.2rem 0 0 1.5rem;border:1px solid black;">
                                                <p><strong> Total  Amount : </strong><span id="paidamt"></span></p>
                                            </td>
                                            
                                        </tr>
                                        <table class='table'  style='width:91%;margin:0 auto;border-color: black;padding: 0px; margin-top:2rem;margin-left: 0.5rem;'>
                                            <tbody>
                                                <tr>
                                                    <td colspan="4" class='text-left mt-2' style="width: 30rem;">
                                                        <strong> Created By : </strong><span id="adminsign"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class='text-left' style="width: 40rem;">
                                                        <strong> Reporting Time : </strong><span id="timing"></span>
                                                    </td>
                                                    <td colspan="4" class='text-right' style="width: 40rem;">
                                                        <strong style="margin-left: 21rem;">  Authorised Signatory </strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button onclick="myprints()" class="btn-sm btn-primary">Print</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
       
// $(document).ready(function () {  
    $(".showid").click(function(){  
        var id = $(this).val();
       // alert(id);
        $("#userShowModal").modal('show');
        
        $.ajax({
            type    :"GET",
            url     :"/hospital_record/"+id,
            dataType:"json",
            success :function(response){
                // console.log(response);
                if(response.status == "success"){
                    $("#hosmaproductlist tbody").html('');
                    let product_name = response.data[0].product_name;
                    let pro_array = product_name.split(",");
                    let qty_array = response.data[0].qty.split(",");
                    let mrp_array = response.data[0].mrp.split(",");
                    let itemamount_array = response.data[0].price.split(",");
                    let count = pro_array.length;
                    // console.log(response.data[0]);
                    for(let i=0; i<pro_array.length; i++){
                        let html_row = `<tr>
                                            <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                            <p><span id="id">${count}</span></p>
                                            </td>
                                            <td  class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                <p><span id="pr_name">${pro_array[i]}</span></p>   
                                            </td>
                                            <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                <p> <span id="hsncode">${qty_array[i]}</span></p>  
                                            </td>
                                            <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                <p> <span id="expire_date">${mrp_array[i]}</span></p>    
                                            </td>
                                            <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                <p><span id="qty">${itemamount_array[i]}</span></p>   
                                            </td>
                                        </tr>`;
                                   
                                    $("#hosmaproductlist tbody").prepend(html_row);
                                    count--;
                    }

                    $("#patient_name").text(response.data[0].pf_name + " " + response.data[0].pl_name)
                    $("#doctor_name").text(response.data[0].df_name + " " + response.data[0].dl_name)
                    // $("#billdate").text(response.data[0].billdate)
                    $("#ptype").text(response.data[0].patienttype)
                    $("#details").text(response.data[0].details)
                    // $("#pr_name").text(response.data[0].pr_name)
                    // $("#product_name").text(response.data[0].pr_name)
                     $("#procedure").text(response.data[0].procedure)
                     //$("#mrp").text(response.data[0].mrp)
                     $("#discount").text(response.data[0].discount)
                    //  $("#price").text(response.data[0].price)
                    $("#disc_Type").text(response.data[0].discType)
                     $("#discRate").text(response.data[0].discRate)
                    // $("#discount").text(response.data[0].discount)
                     $("#ttlamt").text(response.data[0].ttlamt)
                     $("#invoice_no").text(response.data[0]. invoice_no)
                    
                    // $("#payment_paymode").text(response.data[0].pmode_name)
                    // $("#payment_amount").text(response.data[0].payment_amount)
                   
                    //  $("#paymentdate").text(response.data[0].paymentdate)
                    //  $("#paymentremark").text(response.data[0].paymentremark)
                    // $("#pamount").text(response.data[0].amount)
                    // $("#paidamt").text(response.data[0].paidamt)
                   
                }else{
                    alert("fail");
                }
            }
        });
        
    });
    
// });
   
</script>

<script type="text/javascript">
       
$(document).ready(function () {  
    $(".showid").click(function(){
   
        
        var stud_id = $(this).val();
        //alert(stud_id);
       
            $("#userShowModal").modal('show');
        // var userURL = $(this).data('url');
        
        $.ajax({
            type    :"GET",
            url     :"/usershospipayment/"+stud_id,
            dataType:"json",
            success :function(response){
                // console.log(response);
                if(response.status == "success"){
                    $("#pharmapaytlist tbody").html('');
                  
                   

                    let paymentmode_array = response.data[0].paymentmode.split(",");
                    console.log(paymentmode_array);
                    let pay_date = response.data[0].paymentdate;
                    let paydate_array = pay_date.split(",");
                    let paymentremark_array = response.data[0].paymentremark.split(",");
                    let paymentmaster_array = response.data[0].tpapaymenttype.split(",");
                    console.log(paymentmaster_array);
                    let amount_array = response.data[0].amount.split(",");
                    let count = paymentmode_array.length;
                  
                   
                    
                    for(let i=0; i<paymentmode_array.length; i++){
                        let html_row2 =     `<tr>
                                                <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                    <span id="paymentmode">${paymentmode_array[i]}</span>
                                                </td>
                                                <td class='text-center' style="border:solid black;border-width:1px 1px 1px 1px;">
                                                    <span id="paymentmaster">${paymentmaster_array[i]}</span>
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
                    $("#paidamt").text(response.data[0].paidamt)
                    $("#adminsign").text(response.data[0].full_name);
                    $("#timing").text(response.data[0].timing);

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
            $('#hospitalinvoice').DataTable({
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

<!--script for serch box-->
   <script type="text/javascript">
    $(document).ready(function(){
        $("#hospitalin").on("keyup",function(){
           var value = $(this).val().toLowerCase();
           //alert(value);
           $("#hospitals tr").filter(function(){
           $(this).toggle($(this).text().toLowerCase().indexOf(value)>-1);
           });
         });
       });
   </script>
   <!--end search code-->
@endsection