@extends('layouts.app')
@section('title')
    {{ __('Atten') }}
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
                        <a href="{{ route('attenmodule.create') }}"
                               class="menu-link px-5">{{ __('Add Attendence') }}</a>
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
            <form action="{{ route('attenmodule.index') }}" method="post">
                 
                        <div class="table-responsive">
                            <div class="form-group row">
                                <label class="col-form-label">Date</label>
                              <div class="col-sm-3">
                                  <label class="col-form-label">From</label>
                                  <input type="date" name="fdate" id="fdate" class="form-control">
                              </div>
                               <div class="col-sm-3">
                                  <label class="col-form-label">To</label>
                                  <input type="date" name="tdate" id="tdate" class="form-control">
                              </div>
                               <div class="col-sm-4">
                                        <label class="col-form-label">Employe</label>
                                        <select class="form-control" id="employe" name="employe">
                                          <option value="0" disabled="true" selected="true">--select--</option>
                                            @foreach($user2 as $item)
                                            <option value="{{$item->id }}"->{{$item->first_name }} {{$item->last_name }}</option>
                                            @endforeach  
                                        </select>
                              </div>
                              <br>
        </form>  
                            </div><br>
                            <table class="table  table-bordered text-center" id="previousTables">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Employee Name</th>
                                        <th>Date</th>
                                        <th>Loging Time</th>
                                        <th>Logout Time</th>
                                        <th>Total Duty Hours</th>
                                        <th>Tea Break</th>
                                        <th>Lunch Break</th>
                                        <th>Meeting Break</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user as $item)
                                    <tr>
                                        <td>{{ $item->id  }}</td>
                                        <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>{{ $item->shift_start }}</td>
                                        <td>{{ $item->shift_end }}</td>
                                        <td>{{ $item->total_duty_hours . " hrs " }}</td>
                                        <td>{{ $item->total_tea_break ." hrs"}}</td>
                                        <td>{{ $item->total_lunch_break . " hrs " }}</td>
                                        <td>{{ $item->total_meeting_break . " hrs "}}</td>
 
                                        <td>
                                            <a href="{{ url('/attenmodule/'. $item->id . '/edit') }}"><button class="btn"><i class="fa fa-lg  fa-edit"></i></button></a> 

                                            <form method="POST" action="{{ url('/attenmodule' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn showid" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-2xs fa-trash"></i></button>
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
@endsection