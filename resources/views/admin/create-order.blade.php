@include('partials.admin-header')

<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Dashboard</h5>
                        <p class="m-b-0">Welcome {{ Auth::user()->name }}</p>
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
                        @section('content')
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-7"></div>
                                    <div class="col-md-5">
                                        <form action="{{route('orders.index')}}">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <input type="date" name="start_date" class="form-control" value="{{request('start_date')}}" />
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="date" name="end_date" class="form-control" value="{{request('end_date')}}" />
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="btn btn-outline-primary" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Customer Name</th>
                                            <th>Total</th>
                                            <th>Received Amount</th>
                                            <th>Status</th>
                                            <th>To Pay</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->getCustomerName()}}</td>
                                            <td>{{ config('settings.currency_symbol') }} {{$order->formattedTotal()}}</td>
                                            <td>{{ config('settings.currency_symbol') }} {{$order->formattedReceivedAmount()}}</td>
                                            <td>
                                                @if($order->receivedAmount() == 0)
                                                    <span class="badge badge-danger">Not Paid</span>
                                                @elseif($order->receivedAmount() < $order->total())
                                                    <span class="badge badge-warning">Partial</span>
                                                @elseif($order->receivedAmount() == $order->total())
                                                    <span class="badge badge-success">Paid</span>
                                                @elseif($order->receivedAmount() > $order->total())
                                                    <span class="badge badge-info">Change</span>
                                                @endif
                                            </td>
                                            <td>{{config('settings.currency_symbol')}} {{number_format($order->total() - $order->receivedAmount(), 2)}}</td>
                                            <td>{{$order->created_at}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            {{-- <th>{{ config('settings.currency_symbol') }} {{ number_format($total, 2) }}</th>
                                            <th>{{ config('settings.currency_symbol') }} {{ number_format($receivedAmount, 2) }}</th> --}}
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                                {{ $orders->links() }}
                            </div>
                        </div>
                        @endsection
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
<script type="text/javascript" src="{{ asset('admin/js/order.js') }}"></script>
<script>
    $(document).ready(function(){
      let row_number = {{ count(old('items', [''])) }};

    


      $("#add_row").click(function(e){

        e.preventDefault();
        var tr = $(this).parents('tr:first').clone();
        $('#items_table tbody').append(tr);
        $tr.append('<td><button class="remove">Remove</button></td>');
        var $td = $('#items_table > tbody > tr').find('td:eq(6)').hide();

        let new_row_number = row_number - 1;
        $('#item' + row_number).html($('#item' + new_row_number).html()).find('td:first-child');


        $('#items_table').append('<tr id="item' + (row_number + 1) + '"></tr>');


        row_number++;


      });
  


      $("#delete_row").click(function(e){
        e.preventDefault();
        if(row_number > 1){
          $("#item" + (row_number - 1)).html('');
          row_number--;
        }
      });
    });
  </script>
</body>

</html>