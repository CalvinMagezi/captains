@include('partials.admin-header')

<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Dashboard</h5>
                        <p class="m-b-0">Welcome {{Auth::user()->first_name.' '.Auth::user()->last_name }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->
      <div class="pcoded-inner-content">
          <!-- Main-body start -->
          <div class="main-body">
              <div class="page-wrapper">
                  <!-- Page-body start -->
                  <div class="page-body">
                      <div class="row justify-content-center"> 
                        @if (session('success'))
                        <div class="alert alert-danger">
                            {{session('sucess')}}
                        </div>
                    @endif
                        <div class="col-8">                        
                            <div class="card">
                                <div class="card-header">
                                    Place A New Order
                                </div>
                            
                                <div class="card-body">
                                    <form action="{{ route("store-order") }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="customer_name">Order Taken By</label>
                                            <input type="text" id="customer_name" name="customer_name" value="{{Auth::user()->first_name.' '.Auth::user()->last_name }}" class="form-control"  readonly>                                           
                                            <p class="helper-block">
                                                
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <label for="customer_email">Table Number</label>
                                            <input type="email" id="customer_email" value="4" name="customer_email" class="form-control" readonly>                                           
                                            <p class="helper-block">
                                               
                                            </p>
                                        </div>
                            
                                        <div class="card">
                                            <div class="card-header">
                                                Order Details
                                            </div>
                            
                                            <div class="card-body">
                                                <table class="table" id="products_table">
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Quantity</th>
                                                            <th>Specifics</th>
                                                            <th>Priority</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach (old('products', ['']) as $index => $oldProduct)
                                                            <tr id="product{{ $index }}">
                                                                <td>
                                                                    <input class="typeahead form-control" type="text">

                                                                    {{-- <select name="products[]" class="form-control">
                                                                        <option value="">-- choose product --</option>
                                                                        @foreach ($products as $product)
                                                                            <option value="{{ $product->id }}"{{ $oldProduct == $product->id ? ' selected' : '' }}>
                                                                                {{ $product->name }} (KES {{ number_format($product->price, 2) }})
                                                                            </option>                                                                            
                                                                        @endforeach
                                                                    </select>
                                                                    <input type="hidden" name="prices[]" value="{{ old('prices.'. $index) ?? '1' }}"> --}}


                                                                </td>
                                                                <td>
                                                                    <input type="number" name="quantities[]" class="form-control" value="{{ old('quantities.' . $index) ?? '1' }}" />
                                                                </td>
                                                                <td>
                                                                    <div class="input-group mb-3">                                                                       
                                                                        <select class="custom-select" id="specifics">
                                                                          <option name="specifics[]" value="regular" selected>Regular</option>
                                                                          <option name="specifics[]" value="hot">Hot</option>
                                                                          <option name="specifics[]" value="cold">Cold</option>                                                                          
                                                                        </select>
                                                                      </div>                                                                    
                                                                </td>
                                                                <td>
                                                                    <div class="input-group mb-3">                                                                       
                                                                        <select class="custom-select" id="priority">
                                                                          <option name="priority[]" value="regular" selected>Regular</option>
                                                                          <option name="priority[]" value="hot">VIP</option>
                                                                          <option name="priority[]" value="cold">Rushed</option>                                                                          
                                                                        </select>
                                                                      </div>                                                                     
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        <tr id="product{{ count(old('products', [''])) }}"></tr>
                                                    </tbody>
                                                </table>
                            
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <button id="add_row" class="btn btn-default pull-left">+ Add Row</button>
                                                        <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <input class="btn btn-danger" type="submit" value="{{ trans('Place Order') }}">
                                        </div>
                                    </form>
                            
                            
                                </div>
                            </div>
                    </div>
                      </div>
                  </div>
                  <!-- Page-body end -->
              </div>
              <div id="styleSelector"> </div>
          </div>
      </div>
  </div>
</div>
</div>
</div>
</div>



@include('partials.admin-footer')
{{-- <script type="text/javascript" src="{{ asset('admin/js/mapping.js') }}"></script> --}}
{{-- <script type="text/javascript" src="{{ asset('admin/js/order.js') }}"></script> --}}
<script>
    $(document).ready(function(){
    let row_number = {{ count(old('products', [''])) }};
    $("#add_row").click(function(e){
      e.preventDefault();
      let new_row_number = row_number - 1;
      $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
      $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
      row_number++;
    });

    $("#delete_row").click(function(e){
      e.preventDefault();
      if(row_number > 1){
        $("#product" + (row_number - 1)).html('');
        row_number--;
      }
    });

    var path = "{{ route('autocomplete') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
    
  });
  </script>
</body>

</html>