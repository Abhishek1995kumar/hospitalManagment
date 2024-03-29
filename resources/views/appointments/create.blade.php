@extends('layouts.app')
@section('title')
    {{ __('messages.appointment.new_appointment') }}
@endsection
@section('header_toolbar')
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">@yield('title')</h1>
            </div>
            <!--rahul start code-->
            <div class="menu-item px-5 newpatientapp">
                <a href="{{ route('patients.create') }}"
                class="menu-link px-5 btn btn-sm btn-light btn-active-light-primary">{{ __('messages.patient.new_patient') }}</a>
            </div>
            <!--rahul end code-->
            <div class="d-flex align-items-center py-1">
                <a href="{{ route('appointments.index') }}"
                   class="btn btn-sm btn-light btn-active-light-primary pull-right">{{ __('messages.common.back') }}</a>
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
                    <div class="alert alert-danger display-none hide" id="validationErrorsBox"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-body p-12">
                    {{Form::open(['id' => 'appointmentForm']) }}

                    @include('appointments.fields')

                    {{Form::close()}}
                </div>
            </div>
        </div>
        @include('appointments.templates.appointment_slot')
    </div>
@endsection
@section('scripts')
    <script>
        let doctorDepartmentUrl = "{{ url('doctors-list') }}";
        let doctorScheduleList = "{{ url('doctor-schedule-list') }}";
        let appointmentSaveUrl = "{{ route('appointments.store') }}";
        let appointmentIndexPage = "{{ route('appointments.index') }}";
        let isEdit = false;
        let isCreate = true;
        let getBookingSlot = "{{ route('get.booking.slot') }}";
    </script>
    <script src="{{ asset('backend/js/moment-round/moment-round.js') }}"></script>
    <script src="{{mix('assets/js/appointments/create-edit.js')}}"></script>
@endsection
