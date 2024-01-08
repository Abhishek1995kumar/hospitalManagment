



@extends('layouts.app')
@section('title')
    {{ __('Role Master List') }}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">
@endsection
@section('content')
    @include('flash::message')
    <div class="card">
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
                        <a href="{{ route('masterrole.add') }}"
                               class="menu-link px-5">{{ __('Add Role') }}</a>
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
        <table class="table table-responsive-sm align-middle table-row-dashed fs-6 gy-5 dataTable no-footer w-100" id="preottb">
    <thead>
    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
        <th>Role ID</th>
        <th>Role Name </th>
        <th>Action</th> 
     </tr>
    </thead>
    <tbody class="text-gray-600 fw-bold">
    @foreach($rolemasters as $data)
      <tr>
        <td>{{$data->id}}</td>
        <td>{{$data->role_description}}</td>
       
       <td>
                       <!-- <a href="{{url('/masterrole/delete/')}}/{{$data->id}}">
                        <button class="btn">Delete Role</i></button>
                        </a> -->
                       
                        <!-- <a href="{{url('/masterrole/edit/')}}/{{$data->id}}">
                        <button class="button" id="edit_role" name="edit_role" class="btn btn-xs btn-success" >Edit</i></button>
                        </a> -->

                       

                       
                        <button type="button" id="edit_role" name="edit_role" class="btn btn-xs btn-success btn-sm">
						<a href="{{url('/masterrole/edit/')}}/{{$data->id}}" style="color:white;"> Edit 
						</button> </a> &nbsp;

                        <button type="button" id="status_role" name="status_role" class="btn btn-xs btn-success btn-sm">
                        {{$data->status}}
                        </button></a> &nbsp;

                    <!-- $setStatus = (($data['status'] == 'enable') ? 'disable' : 'enable');
					$setBtn = ($data['status'] == 'enable' ? 'btn-success' : 'btn-danger');
					$action_string .= '<button type="button" id="change_status" name="change_status" onclick="change_status(`'.$data["id"].'`,`'.$setStatus.'`)" class="btn btn-xs '.$setBtn.'" >'.($data['status'] == 'enable' ? "Disable" : "Enable").'</button> '; -->

                        <button type="button" id="delete_role" name="delete_role" class="btn btn-xs btn-primary btn-sm">
						<a href="{{url('/masterrole/delete/')}}/{{$data->id}}" style="color:white;">Delete Role
						</button> </a>&nbsp; 
                     </td>
            </tr>
            @endforeach
      </tbody>
</table>
</div>
<script>
        $(document).ready(function () {
            $('#preottb').DataTable({
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
<script>
function change_status(id) {
        if(id != '') {
            $.ajax({
                url: "{{url('/fetch_status')}}",
                method : 'POST',
                dataType: 'JSON',
                data : {id},
                success:function(resp) {
                    if(resp.status != 200) {
                      	alert(resp.msg);
                    }
                    else {
                        //alert(resp.msg);
                        location.reload();
                    }
                }
            });
        }
    }
</script>
@endsection















