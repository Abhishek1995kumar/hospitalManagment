<div id="addModal" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{ __('messages.advanced_payment.new_advanced_payment') }}</h2>
                <button type="button" aria-label="Close" class="btn btn-sm btn-icon btn-active-color-primary"
                        data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
						<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                             version="1.1">
							<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                               fill="#000000">
								<rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"/>
								<rect fill="#000000" opacity="0.5"
                                      transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                      x="0" y="7" width="16" height="2" rx="1"/>
							</g>
						</svg>
					</span>
                </button>
            </div>
            {{ Form::open(['id'=>'addNewForm']) }}
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <div class="alert alert-danger display-none hide" id="validationErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-lg-12 mb-5 mt-5">
                        {{ Form::label('patient_id', __('messages.advanced_payment.patient').(':'), ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-1']) }}
                        {{ Form::select('patient_id', $patients, null, ['class' => ' form-control fw-bold bg-white py-2 border border-2', 'id' => 'patientId','placeholder' => 'Select Patient', 'required','data-control' => 'select2'] ) }}
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
                        <script>
                            width:'100%',
                            $('#patientId').select2({ });
                            if(!'patient') function(e){
                                document.ready('width');
                            }
                        </script>
                    </div>
                    <div class="form-group col-lg-12 mb-5 mt-5">
                        {{ Form::label('receipt_no', __('messages.advanced_payment.receipt_no').(':'),['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-1']) }}
                        {{ Form::text('receipt_no', $receiptNo, ['class' => ' border border-2 bg-white py-2 form-control form-control-solid','required','readonly']) }}
                    </div>
                    <div class="form-group col-lg-12 mb-5 mt-5">
                        {{ Form::label('amount', __('messages.advanced_payment.amount').(':'),['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-1']) }}
                        {{ Form::text('amount', null, ['class' => ' border border-2 bg-white py-2 form-control price-input form-control-solid','required', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")', 'maxlength' => '7']) }}
                    </div>
                    <div class="form-group col-lg-12 mb-5 mt-5">
                        {{ Form::label('date', __('messages.advanced_payment.date').(':'),['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-1']) }}
                        {{ Form::text('date', null, ['class' => ' border border-2 bg-white py-2 form-control form-control-solid','required','id' => 'date', 'autocomplete' => 'off']) }}
                    </div>
                </div>
                <div class="text-right mt-5">
                    {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary me-2 border border-2 py-2 ','id' => 'btnSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" class="border border-2 py-2 btn btn-light btn-active-light-primary me-2"
                            data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
