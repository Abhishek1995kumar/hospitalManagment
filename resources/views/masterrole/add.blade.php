@extends('layouts.app')
@section('title')
{{ __('Role Master') }}
    @endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">
@endsection
@section('header_toolbar')
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">@yield('title')</h1>
            </div>
            <div class="d-flex align-items-center py-1">
                <a href="{{ route('masterrole') }}"
                   class="btn btn-sm btn-light btn-active-light-primary pull-right">{{__('messages.common.back')}}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="d-flex flex-column flex-lg-row">
        <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
            <div class="row">
                <div class="col-12">
                    @include('layouts.errors')
                </div>
            </div>
           
            <div class="card">
                <div class="card-body p-12">
                    
                <form action="{{url('submit_role_permitn')}}" method="POST" id="doctoranalysis" name="doctoranalysis">
                    @csrf
                    @method('POST')
                        <div class="row gx-10 mb-5">
                        <div class="col-md-3">
                                        <div class="form-group mb-5">
                                           <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Role Description:</label>
                                            <input class='form-control  select2Patient' name="role_description"  id="role_description" >  
                                      </div>
                                    </div>

                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Status :</label>
                                        <select name="status" id ="status" class="form-control">
                                    <option value="">--Select Type--</option>
                                    <option value="Enable">Enable</option>
                                    <option value="Disable">Disable</option>
                                </select>  
                            </div>
                            </div>


                            
                            <div class="col-md-3">
                                <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">IS admin :</label>
                                        <div class="checkbox ">
                                                <label class="container2" for="selectall" style="padding-left: 24px;">Admin
                                                    <input type="checkbox"  name="is_admin" id="selectall" value="Admin">
                                                    <!-- <span class="checkmark"></span> -->
                                                     </label>
                                                </div>
                                            </div>
                                      </div>
                                      <hr>
                    <script type="text/javascript">
                    $('#selectall').click(function() {
                        if($(this).is(':checked')) {
                            $('input[type = "checkbox"]').prop('checked', true);
                        } else {
                            $('input[type = "checkbox"]').prop('checked', false);
                        }
                    });
                </script>

<div class="col-md-12">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-striped active" width="100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="list">Options</th>
                                    <th scope="type">Type</th> 
                                    <th scope="delete">View</th>
                                    <th scope="add">Add</th>
                                    <th scope="edit">Edit</th>
                                    <th scope="delete">Delete</th>
                                    <th scope="print">Print</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($rolemasterlist as $data) 
                                <tr>
                                    <td>{{$data->title}}</td>
                                    <td>{{$data->type}}</td>
                                    <td><input type="checkbox" name="actions[]" value="{{$data->id}}_V"> </td>
                                    <td><input type="checkbox" name="actions[]" value="{{$data->id}}_A"> </td>
                                    <td><input type="checkbox" name="actions[]" value="{{$data->id}}_U"> </td>
                                    <td><input type="checkbox" name="actions[]" value="{{$data->id}}_D"> </td>
                                    <td><input type="checkbox" name="actions[]" value="{{$data->id}}_P"> </td>
                                 </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
         </div>
                   <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary mt-3">save</button>
                    </div>
                </form>
             </div>
        </div>
    </div>
 @endsection

 






