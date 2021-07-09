@include('partials.admin-header')


<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Flagged Orders</h5>
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
                                    <h5>Flagged Orders</h5>
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
                                                <th>View</th>
                                                @if (Auth::user()->role == 'admin')                                                
                                                <th>Restore</th>
                                                @endif                                                
                                            </tr>
                                            </thead>
                                            <tbody>
    
                                                @foreach ($all_orders as $order)
                                                @if($order->status == 'deleted' || $order->status == 'flagged')
                                                <tr>
                                                    <td># {{$loop->iteration}}</td>
                                                    <td>Table: {{ $order->table_number }}</td>
                                                    <td>{{ $order->taken_by }}</td>
                                                    <td>{{ $order->status }}</td>
                                                    <td>KES {{ $order->prices_total }}</td>
                                                    
                                                    <td>
                                                        <button class="btn btn-success" data-toggle="modal" data-target="#edit_{{$order->id}}">View</button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="edit_{{$order->id}}" tabindex="-1" aria-labelledby="edit_{{$order->id}}Label" aria-hidden="true">
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
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    @if (Auth::user()->role == 'admin')
                                                   
                                                    <td>
                                                        <button class="btn btn-warning" data-toggle="modal" data-target="#restore_{{$order->id}}">Restore</button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="restore_{{$order->id}}" tabindex="-1" aria-labelledby="restore_{{$order->id}}Label" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="restore_{{$order->id}}Label">Restore Order: {{ $loop->iteration}}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                Are you sure you wish to restore this order?
                                                                </div>
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <form action="{{route('restore-order')}}" method="POST">
                                                                @csrf
                                                                    <input type="hidden" name="order_id" value="{{$order->id}}">
                                                                    <button type="submit" class="btn btn-warning">Restore Order</button>
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

</body>

</html>