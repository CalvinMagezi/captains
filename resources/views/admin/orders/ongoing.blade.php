@include('partials.admin-header')


<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Ongoing Orders</h5>
                        <p class="m-b-0">Welcome {{Auth::user()->first_name.' '.Auth::user()->last_name }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">View Ongoing Orders</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-body start -->
                <div class="page-body">                    
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card table-card">
                                <div class="card-header">
                                    <h5>Active Orders</h5>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                            <li><i class="fa fa-window-maximize full-card"></i></li>
                                            <li><i class="fa fa-minus minimize-card"></i></li>
                                            <li><i class="fa fa-refresh reload-card"></i></li>
                                            <li><i class="fa fa-trash close-card"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Order #</th>
                                                <th>Table #</th>
                                                <th>Taken By</th>
                                                <th>Status</th>
                                                <th>Total</th> 
                                                @if (Auth::user()->role == 'admin')   
                                                {{-- <th>Edit</th>                                             --}}
                                                <th>View</th>                                                                                   
                                                <th>Close Order</th>
                                                <th>Delete</th>
                                                @endif                                                
                                            </tr>
                                            </thead>
                                            <tbody>
    
                                                @foreach ($all_orders as $order)
                                                @if($order->status == 'ongoing')
                                                <tr>
                                                    <td># {{$order->id}}</td>
                                                    <td>Table: {{ $order->table_number }}</td>
                                                    <td>{{ $order->taken_by }}</td>
                                                    <td>{{ $order->status }}</td>
                                                    <td>KES {{ $order->prices_total }}</td>
                                                    {{-- <td>
                                                        <button class="btn btn-primary" data-toggle="modal" data-target="#edit_{{$order->id}}">Edit</button>
                                                    </td> --}}
                                                    <td>
                                                        <button class="btn btn-success" data-toggle="modal" data-target="#view_{{$order->id}}">View</button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="view_{{$order->id}}" tabindex="-1" aria-labelledby="edit_{{$order->id}}Label" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="edit_{{$order->id}}Label">View Order: {{ $loop->iteration}}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                                <div class="modal-body">                                                               
                                                                    <table class="table table-responsive">
                                                                        <thead>
                                                                            <tr>
                                                                                <td>Order Items</td>
                                                                                <td>Item Price</td>
                                                                                <td>Quantity</td>
                                                                                <td>Specifics</td>
                                                                                <td>Priority</td>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($order_details as $details)
                                                                                @if ($details->order_id == $order->id)
                                                                                    <tr>
                                                                                        <td>{{$details->item_name}}</td>
                                                                                        <td>{{$details->price}}</td>
                                                                                        <td>{{$details->quantity}}</td>
                                                                                        <td>{{$details->specifics}}</td>
                                                                                        <td>{{$details->priority}}</td>
                                                                                    </tr>
                                                                                @endif
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>                                                                
                                                                </div>
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>  
                                                                @if (Auth::user()->role == 'admin')
                                                                <form action="/edit-order" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{$order->id}}">
                                                                <button type="submit" class="btn btn-warning" style="color: #000;">Edit</button>                                                                                                                                    
                                                                </form>
                                                                @endif                                                              
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    @if (Auth::user()->role == 'admin' || Auth::user()->position == 'cashier')
                                                    <td>
                                                        <button class="btn btn-warning" data-toggle="modal" data-target="#close_{{$order->id}}" style="color: #000 !important;">Close Order</button>
                                                        
                                                        <div class="modal fade" id="close_{{$order->id}}" tabindex="-1" aria-labelledby="close_{{$order->id}}Label" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                            <div class="modal-content printing">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="close_{{$order->id}}Label">Close Order: {{ $loop->iteration}}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST" action="{{route('close-order')}}">
                                                                        @csrf
                                                                        <div class="row text-center mb-1">
                                                                            <div class="col-12">
                                                                        <h6>Confirm Closure for Order: <strong style="font-size: 1.5rem;">{{$order->id}}</strong></h6>
                                                                        <input type="hidden" name="order_id" value="{{$order->id}}">
                                                                        <h6>Taken By: <strong style="font-size: 1.5rem;">{{$order->taken_by}}</strong></h6>
                                                                        <input type="hidden" name="taken_by" value="{{$order->taken_by}}">
                                                                        <h6>Closed By: <strong style="font-size: 1.5rem;">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</strong></h6>
                                                                        <input type="hidden" name="closed_by" value="{{Auth::user()->first_name}} {{Auth::user()->last_name}}">
                                                                        <h6>On table number: <strong style="font-size: 1.5rem;">{{$order->table_number}}</strong></h6> 
                                                                        <input type="hidden" name="table_number" value="{{$order->table_number}}">
                                                                            </div>
                                                                        </div>
                                                                        <table class="table table-responsive confirm_table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <td>Order Items</td>
                                                                                    <td>Item Price</td>
                                                                                    <td>Quantity</td>
                                                                                    <td>Specifics</td>
                                                                                    <td>Priority</td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($order_details as $details)
                                                                                    @if ($details->order_id == $order->id)
                                                                                        <tr>
                                                                                            <td>{{$details->item_name}}</td>
                                                                                            <td>{{$details->price}}</td>
                                                                                            <td>{{$details->quantity}}</td>
                                                                                            <td>{{$details->specifics}}</td>
                                                                                            <td>{{$details->priority}}</td>
                                                                                        </tr>
                                                                                    @endif
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>  
                                                                          <hr>
                                                                        <div class="row mt-1 text-center">
                                                                        <div class="col-6">
                                                                            <h6>Amount Received:</h6>
                                                                            <br>
                                                                            <input type="text" id="received" name="amount_received" required>
                                                                        </div>  
                                                                        <div class="col-6">
                                                                        <h6>Expected Amount:</h6>
                                                                        <br>
                                                                            <input type="text" id="expected" value="{{$order->prices_total}}" placeholder="KES {{$order->prices_total}}" readonly>
                                                                        </div> 
                                                                        <div class="col-md-6"></div>
                                                                        <div class="col-md-6">
                                                                        <input type="text" class="discount" placeholder="Discount %" name="discount">                                                                            
                                                                        </div> 
                                                                        </div>                                                                                                                                     
                                                                </div>
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                                                                                                                               
                                                                <button type="submit" class="btn btn-success" id="close" disabled="disabled" >Close Order</button>
                                                            </form>
                                                            <form action="/print-receipt" method="POST" target="_blank">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{$order->id}}">
                                                                <button type="submit" class="btn btn-primary print_r">Print Receipt</button>
                                                                </form> 
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-danger" data-toggle="modal" data-target="#delete_{{$order->id}}">Delete</button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="delete_{{$order->id}}" tabindex="-1" aria-labelledby="delete_{{$order->id}}Label" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="delete_{{$order->id}}Label">Delete Order: {{ $loop->iteration}}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                Are you sure you wish to delete this order?
                                                                </div>
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <form action="{{route('soft-delete-order')}}" method="POST">
                                                                @csrf
                                                                    <input type="hidden" name="order_id" value="{{$order->id}}">
                                                                    <button type="submit" class="btn btn-danger">Delete Order</button>
                                                                </form>
                                                                
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </td>                                                        
                                                    @endif
                                                </tr>
                                                @endif
                                                @endforeach
                                        
                                                
                                            </tbody>                                        
                                        </table>                                        
                                        <div class="text-right m-r-20">
                                            <a href="#!" class=" b-b-primary text-primary">{{ $all_orders->render() }}</a>
                                        </div>
                                    </div>
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
<script type="text/javascript" src="{{ asset('admin/js/order.js') }}"></script>
<script>
    var cocktailBar = $('#cocktail_bar_table tr').length;
    var mainBar = $('#main_bar_table tr').length;
    var btnSubmit = $("#close");
    var discount = $('.discount').val().trim();
    var confirmTable = $('.confirm_table');

    $('#total_cocktails').html(cocktailBar)
    $('#total_main_bar').html(mainBar)

    $("#received").keyup(function () {
            //Reference the Button.
            
            var expected = $('#expected').val();
 
            //Verify the TextBox value.
            if ($(this).val().trim() == expected ) {
                //Enable the TextBox when TextBox has value.
                btnSubmit.removeAttr("disabled");                              
            } else {
                //Disable the TextBox when TextBox is empty.
                btnSubmit.attr("disabled", "disabled"); 
            }
        }); 
        
    $(".discount").keyup(function () {
            //Reference the Button. 
            
            var expected = $('#expected').val();
            var received = $('#received').val();
 
            //Verify the TextBox value.
            if ($(this).val().trim() > 0 ) {
                //Enable the TextBox when TextBox has value.
                btnSubmit.removeAttr("disabled"); 
                var new_val = expected - (expected * ($(this).val().trim() / 100));
                $('#received').val(new_val)                              
            } else {
                //Disable the TextBox when TextBox is empty.
                btnSubmit.attr("disabled", "disabled"); 
            }
        }); 

</script>

</body>

</html>