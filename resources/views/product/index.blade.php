@extends('layouts.app')
@section('title')
    {{ __('Product Master') }}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">
@endsection
@section('content')
    @include('flash::message')
    <div class="card">
        <div class="d-flex align-items-center p-5">
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Product Master Records</h1>
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <input type="file" name="import_file"  style="margin-left:6rem" required>
        <a class="btn btn-success btn-sm" href="{{ route('export-template') }}">Downoad Template</a>
      
        <button class="btn btn-primary btn-sm">Import Products</button>
        <a class="btn btn-success btn-sm" href="{{ route('export-users') }}">Export Products</a>
        </form>
        </div>
           
        <div class="card-header border-0 pt-6">
      
           
            @include('layouts.search-component')
            
            <!-- <h1 style="margin-right:10rem;">gfg</h1> -->
          
       
     
   
           
           
            <div class="card-toolbar">
                
                
                <div class="d-flex align-items-center py-1">
                    <div class="me-4">     
                    <button type="button" class="btn bg-primary showid text-white" style="margin-right:0.7rem;">UPDATE</button>
  
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
                        <a href="{{ route('product.create') }}"
                               class="menu-link px-5">{{ __('Add Product') }}</a>
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
                        <div class="table-responsive">
                            <table class="table" id="productsmas">
                               <thead class="text-gray-700 fw-bold">
                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                       <!--<th>ID</th>-->
                                        <th>Product Code</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Product Name</th>
                                        <th>HSN No.</th>
                                        <th>Min Qty</th>
                                       <th>Max Qty</th>
                                       <th>Discount</th>
                                       <th>Supplier Name</th>
                                       <th>C.P</th>
                                        <th>MRP</th>
                                      
                                        <th>Actions</th>
                                  </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-bold">
                                @foreach($productdata as $item)
                                   <tr class="border-top border-light">
                                        <!--<td>{{ $loop->iteration  }}</td>-->
                                      <td>{{ $item->id }}</td>
                                        <td>{{ $item->cat_name }}</td>
                                        <td>{{ $item->subcat_name }}</td>
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ $item->hsnno }}</td>
                                        <td>{{ $item->min_qty }}</td>
                                        <td>{{ $item->max_qty }}</td>
                                       <td>{{ $item->discount }}</td>
                                       <td>{{ $item->supplier_name }}</td>
                                       <td>{{ $item->cp }}</td>
                                        <td>{{ $item->mrp }}</td>
                                       
                                       <td>
                                      
                                            <!-- <a href="{{ url('/contact/' . $item->id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a> -->
                                            <a href="{{ url('/product/' . $item->id . '/edit') }}" title="Edit Student"><button class="btn"><i class="fa fa-lg  fa-edit"></i></button></a>
                                            <form method="POST" action="{{ url('/product' . '/' . $item->id) }}" accept-charset="UTF-8"style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <!-- <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button> -->
                                                <button type="submit" class="btn showid" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-2xs fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="modal fade" id="userShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="" method="post" id="updateproducts" name="updatepharma">                   
                            {{csrf_field()}}
                                <div class="form-group row">
                                    
                                    <input type="hidden" name="idd" id="p_id" value=""> 
                                    <div class="col-sm-6">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3"> Product:</label>
                                        <select class="form-select" class="products" name="products[]"  id="products" onchange="fetchProductPrice()">
                                            <option value="">Select Product name</option>
                                            @foreach( $medicinesref as $items)
                                                <option value="{{ $items->id }}">{{ $items->product_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3"> MRP:</label>
                                         <input type="text" class="form-control  mrp" id="mrp" name="mrp"  />

                                    </div>
                                    <div class="col-sm-6">
                                        <label for="" class="form-label fs-6 fw-bolder text-gray-700 mb-3"> QUANTITY:</label>
                                         <input type="text" class="form-control  qty" id="max_qty" name="max_qty"  />

                                    </div>
                                    <div class="form-group">
                                            <input type="button" value="Update"  onclick="updatepro();" class="btn btn-primary mt-2" style="margin-left:50rem;">
                                        </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                    </div>
                </div>
            </div>
        </div>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
<script type="text/javascript" src="//media.twiliocdn.com/sdk/js/client/v1.3/twilio.min.js"></script>
<script type="text/javascript" src="{{ asset('js/browser-calls.js') }}"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">


<script>
           $(".showid").click(function(){
   
        
 
       $("#userShowModal").modal('show');
   
  
   
});
</script>
<script>
                                                function fetchProductPrice(){
                                                    var products_id =  $('#products').val();
                                                     // alert(products_id);
                                                    $.ajax({
                                                            url: "{{url('/Product_price')}}",
                                                            method:'POST',
                                                            data :{
                                                                "_token": "{{ csrf_token() }}",
                                                                id:products_id,
                                                            },
                                                            success:function(data){
                                                               if(data)
                                                               {
                                                                $('#mrp').val(data[0].mrp);
                                                                $('#max_qty').val(data[0].max_qty);
                                                                $('#p_id').val(data[0].id);
                                                               
                                                              
                                                              
                                                               }
                                                            },
                                                        });
                                                       
                                                    }
                                            </script>
                                            
<script>
                                                function updatepro(){
                                                    var products_id =  $('#products').val();
                                                   var url = "{{url('/Product_update')}}/"+products_id;
                                                //   var formdata =  $('#updateproducts').serialize();
                                                var products_mrp =  $('#mrp').val();
                                                var products_qty =  $('#max_qty').val();
                                                // console.log(products_mrp);
                                                // console.log(products_qty);
                                                    $.ajax({
                                                            url: url,
                                                            method:'POST',
                                                            data :{
                                                                "_token": "{{ csrf_token() }}",
                                                                'id':products_id,
                                                                'mrp':products_mrp,
                                                                'max_qty':products_qty,

                                                            },
                                                            success:function(response){
                                                                if (response.status == 200) {
                                                                    window.location.href = "{{url('/product')}}";
                                                                }

                                                              
                                                            },
                                                        });
                                                       
                                                     }
                                            </script>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function () {
            $('#productsmas').DataTable({
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