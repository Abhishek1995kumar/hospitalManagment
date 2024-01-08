@extends('layouts.app')
@section('title')
    {{ __('Live Patient') }}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">
@endsection
@section('content')
    @include('flash::message')
    <div class="card">
      <div class="d-flex align-items-center p-5">
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Live Patients Records</h1>
            </div>
        <div class="card-header border-0 pt-6">
            <!--State code serch-->
<div>
        <input type="search" id="livepati" data-datatable-filter="search" name="search" 
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
                        <a href="{{ route('contact.create') }}"
                               class="menu-link px-5">{{ __('Add Live Patient') }}</a>
                        </div>
                        <!--<div class="menu-item px-5">
                            <a href="{{ route('patient.excel') }}"
                               class="menu-link px-5">{{ __('messages.common.export_to_excel') }}</a>
                        </div>-->
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
                <table class="table table-responsive-sm align-middle table-row-dashed fs-6 gy-5 dataTable no-footer w-100"  id="livepatients" >
            <thead>
            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                        <th>Sr.No</th>
                                        <th>Visit & Reference</th>
                                        <th>Patient Name</th>
                                        <th>Appointment type</th>
                                        <th>Doctor Name</th>
                                        <th>Date and Time</th>
                                        <th>Status</th>
                                        <!-- <th>Date and Time</th>
                                        <th>Status</th> --> 
                                        <!-- <th>Actions</th> -->
                                    </tr>
                                </thead>
                                <tbody id="live">
                                @foreach($contacts as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->visitreference }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->appointmenttype }}</td>
                                        <!--<td>{{ $item->doctor }}</td>-->
                                        <td>{{$item->df_name}} {{$item->dl_name}}</td>
                                        <td>{{ $item->updated_at }}</td>
                                        <td>
                                        <select name="status" class="status" id="{{ $item->id }}">
                                           
                                        <option value="">Select status</option>
                                              <option <?php echo $item->status == 'Registration' ?  "selected" : "" ?> value="1">Registration</option>
                                              <option <?php echo $item->status == 'OPD' ?  "selected" : "" ?>  value="2">OPD</option>
                                              <option <?php echo $item->status == 'Dilation' ?  "selected" : "" ?>  value="3">Dilation</option>
                                             <option <?php echo $item->status == 'DoctorVisit' ?  "selected" : "" ?>  value="4">DoctorVisit</option>
                                              <option <?php echo $item->status == 'Counsellor' ?  "selected" : "" ?>  value="5">Counsellor</option>
                                              <option <?php echo $item->status == 'Waiting' ?  "selected" : "" ?>  value="6">Waiting</option>
                                              <option <?php echo $item->status == 'Pharmacy' ?  "selected" : "" ?>  value="7">Pharmacy</option>
                                              <option <?php echo $item->status == 'Billing' ?  "selected" : "" ?>  value="8">Billing</option>
                                              <option <?php echo $item->status == 'Exit' ?  "selected" : "" ?>  value="9">Exit</option>

                                         </select>
                                         


                                        <td>
                                            <!-- <a href="{{ url('/contact/' . $item->id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a> -->
                                            <!-- <a href="{{ url('/contact/' . $item->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a> -->
                                            <!-- <form method="POST" action="{{ url('/contact' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form> -->
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
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#livepatients').DataTable({
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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
         
<script>
    $(document).ready(function(){
        $(document).on('change', '.status', function() {
            var id = $(this).attr("id");
            
            var status = $(this).find(":selected").text();
            // console.log(status); 
            if(status == "Exit"){
                $(this).closest("tr").remove();
                location.reload();
            }
            $.ajax({
                url: "{{url('status')}}",
                method: "GET",
                data: {
                    id: id,
                    status: status,
                },
                success: function(data) {
                    //alert('success');
                }
            });

        });
    });
</script>

<!--script for serch box-->
   <script type="text/javascript">
    $(document).ready(function(){
        $("#livepati").on("keyup",function(){
           var value = $(this).val().toLowerCase();
           //alert(value);
           $("#live tr").filter(function(){
           $(this).toggle($(this).text().toLowerCase().indexOf(value)>-1);

           });

        });

    });
   </script>
   <!--end search code -->


                                        