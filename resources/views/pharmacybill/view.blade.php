@extends('layouts.app')
@section('title')
    {{ __('pharmacy-bill') }}
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
                <a href="{{ route('pharma') }}"
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
                </div>
               
                

            </div>
           
            <div class="card">
                <div class="card-body p-12">
                    
                <form action="{{url('pharma/viewmodel/'.$pharama->id)}}" method="post" id="updatepharma" name="updatepharma">
                    @csrf
                        <div class="row gx-10 mb-5">
                            <div class="col-md-6">
                                        <div class="form-group mb-5">
                                            <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Bill date :</label>
                                           
                                            <input type="date" class="form-control" name="billdate" value="{{old('billdate',$pharama->billdate)}}" readonly>
                                        </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Patient Name :</label>

                                            
                                                        @foreach( $patientref as $items)
                                                        @if ( $pharama['pname'] == $items['id'] )
                                                        <input type="text" class="form-control" name="pname" value="{{old('pname',$items->full_name)}}" readonly>
                                                        @endif
                                                        @endforeach
                                        
                                            
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3">Doctor Name :</label>

                                                        @foreach( $doctorref as $items)
                                                        @if ( $pharama['dname'] == $items['id'] )
                                                        <input type="text" class="form-control" name="dname" value="{{old('dname',$items->full_name)}}" readonly>

                                                        @endif
                                                        @endforeach
                                            </select>
                                            
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <label for="patientType">Patient Type</label> 
                                    <select class="form-control patientType" id="patientType" name="patientType" readonly>
                                        <option value="New">New</option>
                                        <option value="Old">Old</option>
                                        <option value="Review">Review</option>
                                        <option value="Medicine">Medicine</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                        <div class="form-group mb-5">
                                            <label for="details">Details</label> 
                                            <textarea name="details" class="form-control" value="{{old('details')}}" readonly></textarea>
                                        </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-striped table-bordered text-center" id="itemTable_purchase" readonly>
                                        <tr>
                                            <th style="border: 1px solid #a9a5a5;">Action</th>
                                            <th style="border: 1px solid #a9a5a5;">Select Product</th>
                                            <th style="border: 1px solid #a9a5a5;">Packaging</th>
                                            <th style="border: 1px solid #a9a5a5;width:10%;">Batch No.</th>
                                            <th style="border: 1px solid #a9a5a5;">Expiry Date</th>
                                            <th style="border: 1px solid #a9a5a5;">HSN Code</th>
                                            <th style="border: 1px solid #a9a5a5;">MRP</th>
                                            <th style="border: 1px solid #a9a5a5;">QTY</th>
                                            <th style="border: 1px solid #a9a5a5;">Amount</th>
                                        </tr>
                                        <tr>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <button type="button" id='add_purchase_row' class="btn btn-default addButton_MedicalProduct"><i class="fa fa-plus"></i></button>
                                        </td>
                                       <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                                <input class='form-control  select2PurchaseProduct'  type='text' placeholder='select item' style="min-width:150px;"  name="pro_id[]" onchange="productPurchaseChange(this);"  required />
                                            </div>
                                        </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                                <select class="form-control packaging" id="packaging" name="packaging[]" required >
                                                    <option value="1">1</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="6">6</option>
                                                    <option value="10">10</option>
                                                    <option value="15">15</option>
                                                    <option value="18">18</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                              <!-- <input type="text" class="form-control batchno" name="batchno[]" placeholder="Enter Batch No." required /> -->
                                        <select class="form-control batchno" id="batchno" name="batchno[]" onchange="batchNoOnChange(this)"  >
                                                    
                                                </select>
                                            </div>
                                        </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                              <input type="text" class="form-control expire_date" name="expire_date[]" placeholder="Enter Expire Date" required />
                                              <lable class="lblExpireDate"></lable>
                                            </div>
                                        </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                              <input type="text" class="form-control hsncode" name="hsncode[]" placeholder="Enter HSN Code"  readonly />
                                            </div>
                                        </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                              <input type="text" class="form-control mrp" name="mrp[]" placeholder="Enter MRP" onkeyup="itemwiseAmountCalculation(this);"  required />
                                            </div>
                                        </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                              <input type="text" class="form-control qty" name="qty[]" placeholder="Enter QTY" onkeyup="itemwiseAmountCalculation(this);"  required />
                                            </div>
                                        </td>
                                        <td style="border: 1px solid #a9a5a5;">
                                            <div class="form-group">
                                              <input type="text" class="form-control itemamount" name="itemamount[]" placeholder="Enter Amount"  required readonly />
                                            </div>
                                        </td>
                                    </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                            Discount Amount:
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control discType" id="discType" name="discType">
                                                <option value="1">%</option>
                                                <option value="2">Lumpsum</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control discRate" name="discRate" value="0" id="discRate" />
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control discount" name="discount" value="0" id="discount"   readonly />
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px;">
                            
                                <div class="col-md-9">
                                    Total Amount
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control ttlamt" name="ttlamt" value="0" id="ttlamt" style="float:right;" readonly  />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <legend>Payment Details </legend>
                                    <table class="table table-striped table-bordered text-center" id="itemTablePayementDetails">
                                        <tr>
                                            <th style="border: 1px solid #a9a5a5;">Action</th>
                                            <th style="border: 1px solid #a9a5a5;">Select Payment Mode</th>
                                            <th style="border: 1px solid #a9a5a5;">Payment Date</th>
                                            <th style="border: 1px solid #a9a5a5;">Remark</th>
                                            <th style="border: 1px solid #a9a5a5;">Amount</th>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <button type="button" id='add_paymentdetails_row' class="btn btn-default addButton_PaymentDetails"><i class="fa fa-plus"></i></button>
                                            </td>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                    <select class="form-control payment_paymode" id="payment_paymode" name="payment_paymode[]" required>
                                                        <option value="Cash">Cash</option>
                                                        <option value="Debit Card">Debit Card</option>
                                                        <option value="Credit Card">Credit Card</option>
                                                        <option value="Cheque">Cheque</option>
                                                        <option value="CGHS">CGHS</option>
                                                        <option value="RSBY">RSBY</option>
                                                        <option value="TPA">TPA</option>
                                                        <option value="MJPJAY">MJPJAY</option>
                                                        <option value="FOC">FOC</option>
                                                        <option value="PDC">PDC</option>
                                                        <option value="NEFT">NEFT</option>
                                                        <option value="Railway">Railway</option>
                                                        <option value="Ayushman Bharat">Ayushman Bharat</option>
                                                        <option value="ECHS">ECHS</option>
                                                        <option value="Post Office">Post Office</option>
                                                        <option value="ESIC">ESIC</option>
                                                        <option value="Paytm">Paytm</option>
                                                        <option value="Corporate">Corporate</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control paymentdate" name="paymentdate[]" placeholder="Enter Payment Date" value="<?=date('d-m-Y');?>">
                                                </div>
                                            </td>
                                            
                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control paymentremark" name="paymentremark[]" placeholder="Enter Remark" >
                                                </div>
                                            </td>
                                            <td style="border: 1px solid #a9a5a5;">
                                                <div class="form-group">
                                                <input type="text" class="form-control amount" name="amount[]" placeholder="Enter Amount" onKeyup="paymentAmount(this);"  required >
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-12">
                                    <div class="col-md-9 text-right">
                                        Paid Amount
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control paidamt" name="paidamt" value="0" id="paidamt"  readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                </form>
                <button onclick="myprints()" class="btn-sm btn-primary">Print</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_scripts')
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/int-tel/js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('assets/js/int-tel/js/utils.min.js') }}"></script>
@endsection
@section('scripts')
    <script>
        function myprints()
        {
            window.print();
        }
    </script>
@endsection
