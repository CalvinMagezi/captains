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
                                        <div class="row fixed-bottom">
                                        <div class="col-12 text-right pb-2">                                            
                                            @if (Auth::user()->position == 'wait' || Auth::user()->position == 'head waitress' || Auth::user()->role == 'admin') 
    
                                            @foreach ($my_orders as $order) 
                                        <!-- Button trigger modal -->
                                            <button type="button"  class="btn btn-danger text-left mr-2" data-toggle="modal" data-target="#Modal{{$loop->iteration}}">
                                                Order For Table: {{$order->table_number}}
                                            </button>
                                        
                                            <style>
                                                .modal-backdrop {
                                                z-index: -1 !important;
                                                background-color: grey !important;
                                                width: 100%;
                                                }
                                            </style>
                                            
                                            <!-- Modal -->
                                            <div class="modal fade text-center" id="Modal{{$loop->iteration}}" tabindex="-1" aria-labelledby="ModalLabel{{$loop->iteration}}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="ModalLabel{{$loop->iteration}}">Order For Table: {{$order->table_number}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @foreach ($order_details as $order_d)
                                                        @if ($order->id == $order_d->order_id )
                                                        <br>
                                                        <p><strong style="font-size: 1.2rem">({{$loop->iteration}}) Item:</strong> {{$order_d->item_name}}
                                                            <br>
                                                            <strong style="font-size: 1.1rem">Dispatched to:</strong> {{$order_d->dispatched_to}}
                                                            <br>
                                                            @if ($order_d->ready == '0')
                                                            <strong style="font-size: 1.1rem;">Status: </strong><span style="color:red;">preparing</span>                                                            
                                                            @else
                                                            <strong style="font-size: 1.1rem;">Status: </strong> <span style="color:green;">ready</span>
                                                            @endif
                                                            </p>
                                                        <br>
                                                        @endif                        
                                                        @endforeach 
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                
                                                    </div>
                                                </div>
                                                </div>
                                            </div>  
                                        
                                              @endforeach
                                        @endif
                                        </div>
                                        </div>                                       
                                        <div class="row justify-content-center">
                                            <!-- task, page, download counter  start -->
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row justify-content-center text-center align-items-center">
                                                            <div class="col-8">
                                                                @if (Auth::user()->role != 'admin')
                                                                <h4 class="text-c-purple">{{ $my_order_count }}</h4>                                                                
                                                                <h6 class="text-muted m-b-0">My Open Orders</h6>
                                                                @else
                                                                <h4 class="text-c-purple">{{ $all_orders }}</h4> 
                                                                <h6 class="text-muted m-b-0">All Open Orders</h6>
                                                                @endif                                                                
                                                            </div>                                                            
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-purple">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0">% change from yesterday</p>
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="fa fa-line-chart text-white f-16"></i>                                                            
                                                            </div>
                                                        </div>
            
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row justify-content-center text-center  align-items-center">
                                                            <div class="col-8">
                                                                @if (Auth::user()->role != 'admin')
                                                                <h4 class="text-c-green">{{ $my_closed_order_count}}</h4>
                                                                <h6 class="text-muted m-b-0">My Closed Orders</h6>
                                                                @else
                                                                <h4 class="text-c-green">{{ $all_closed_orders }}</h4>
                                                                <h6 class="text-muted m-b-0">Closed Orders</h6>
                                                                @endif                                                                
                                                            </div>                                                           
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-green">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0">% change from yesterday</p>
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="fa fa-line-chart text-white f-16"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row justify-content-center text-center  align-items-center">
                                                            <div class="col-8">
                                                                @if (Auth::user()->role != 'admin')
                                                                <h4 class="text-c-red">{{ $my_assigned_tables }}</h4>
                                                                <h6 class="text-muted m-b-0">My Assigned Tables</h6>
                                                                @else 
                                                                <h4 class="text-c-red">{{ $total_active_tables }}</h4>
                                                                <h6 class="text-muted m-b-0">Active Tables</h6>
                                                                @endif
                                                            </div>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-red">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0">% change</p>
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="fa fa-line-chart text-white f-16"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row justify-content-center text-center  align-items-center">
                                                            <div class="col-8">
                                                                @if (Auth::user()->role != 'admin')
                                                                <h4 class="text-c-blue">KES {{$my_sales}}</h4>
                                                                <h6 class="text-muted m-b-0">My Sales Today</h6>
                                                                @else 
                                                                <h4 class="text-c-blue">KES {{$todays_sales}}</h4>
                                                                <h6 class="text-muted m-b-0">Today's Sales </h6>
                                                                @endif                                                               
                                                            </div>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-blue">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0">% change</p>
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="fa fa-line-chart text-white f-16"></i>                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- task, page, download counter  end -->
    
                                            <!--  sale analytics start -->
                                            <div class="col-xl-8 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Table Maps</h5>
                                                        <h3 class="text-center">Color Coding</h3>
                                                        <div class="row justify-content-center">
                                                            @foreach ($waiters as $waiter)
                                                            <div class="col-3">
                                                                <div class="p-3 mr-1 text-center" style="color: #fff; background: {{$waiter->color_code}}; border:1px solid grey; border-radius:5px;">{{$waiter->first_name}}</div>
                                                            </div>                                        
                                                        @endforeach
                                                        <div class="col-3">
                                                            <div class="p-3 m-1 text-center" style="color: #fff; border:1px solid grey; border-radius:5px; background:red;">Free</div>
                                                        </div>
                                                        </div> 
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                                                <li><i class="fa fa-minus minimize-card"></i></li>
                                                                <li><i class="fa fa-refresh reload-card"></i></li>
                                                                <li><i class="fa fa-edit close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        @include('partials.maps')
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-12">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row">
                                                            <div class="col">
                                                                @if (Auth::user()->role != 'admin')
                                                                <h4>My Active Tables</h4>
                                                                @else
                                                                <h4>All Active Tables</h4>
                                                                @endif                                                                
                                                                <p class="text-muted">Today</p>
                                                            </div>
                                                            <div class="col-auto">
                                                                <label class="label label-success">+</label>
                                                            </div>
                                                        </div>
                                                        @if (Auth::user()->role == 'admin')
                                                        <div class="row justify-content-center">
                                                            @foreach ($tables as $table)  
                                                            @if($table->status == 'active')                                                                                                                  
                                                            <div class="col-lg-3 col-md-4 col-sm-6 p-1 mr-1 mb-1 text-center" style="border:1px solid black; background:green;">
                                                                <button style="border: none; width:100%; color:white; background:green;" type="button" data-toggle="modal" data-target="#mod_{{ $table->table_number}}">
                                                                    {{ $table->table_number }}
                                                                </button>   
                                                                
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="mod_{{ $table->table_number}}" tabindex="-{{ $loop->iteration}}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                        </div>
                                                                        <div class="modal-body">                                                                            
                                                                                                                                        
                                                                        View Info For table number <strong>{{ $table->table_number}}</strong>.
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary view-table">View Table</button>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                </div> 
                                                                                                                                   
                                                            </div>
                                                            @endif
                                                            @endforeach
                                                        </div>
                                                        @endif
                                                        @if(Auth::user()->role != 'admin')
                                                        <div class="row justify-content-center">
                                                            @foreach ($tables as $table)  
                                                            @if($table->status == 'active')
                                                            @if ($table->managed_by == Auth::user()->first_name)                                                                                                                                                                                                                                                                                                       
                                                            <div class="col-lg-3 col-md-4 col-sm-6 p-1 mr-1 mb-1 text-center" style="border:1px solid black; background:green;">
                                                                <button style="border: none; width:100%; background:green;" type="button" data-toggle="modal" data-target="#mod_{{ $table->table_number}}">
                                                                    {{ $table->table_number }}
                                                                </button>   
                                                                
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="mod_{{ $table->table_number}}" tabindex="-{{ $loop->iteration}}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                        </div>
                                                                        <div class="modal-body">                                                                            
                                                                                                                                        
                                                                        View Info For table number <strong>{{ $table->table_number}}</strong>.
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary view-table">View Table</button>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                </div> 
                                                                                                                                   
                                                            </div>
                                                            @endif
                                                            @endif
                                                            @endforeach
                                                        </div>
                                                        @endif                                                       
                                                    </div>
                                                </div>
                                                {{-- <div class="card quater-card">
                                                    <div class="card-block">
                                                        <h6 class="text-muted m-b-15">This Month</h6>
                                                        <h4>KES 3,9452.50</h4>
                                                        <p class="text-muted">KES 3,9452.50</p>
                                                        <h5>87</h5>
                                                        <p class="text-muted">Outside Revenue<span class="f-right">60%</span></p>
                                                        <div class="progress"><div class="progress-bar bg-c-blue" style="width: 60%"></div></div>
                                                        <h5 class="m-t-15">68</h5>
                                                        <p class="text-muted">Inside Revenue<span class="f-right">40%</span></p>
                                                        <div class="progress"><div class="progress-bar bg-c-green" style="width: 40%"></div></div>
                                                    </div>
                                                </div> --}}

                                            </div>

                                            <!--  sale analytics end -->
    
                                            <!--  project and team member start -->
                                            <div class="col-xl-8 col-md-12">
                                                
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
                                                                    <th>View</th>
                                                                    @if (Auth::user()->role == 'admin')
                                                                    {{-- <th>Edit</th> --}}
                                                                    <th>Delete</th>
                                                                    @endif                                                
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                        
                                                                    @foreach ($orders as $order)
                                                                    @if($order->status == 'ongoing')
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
                                                                        {{-- <td>
                                                                            <button class="btn btn-warning" data-toggle="modal" data-target="#close_{{$order->id}}">Edit</button>
                                                                            
                                                                            <div class="modal fade" id="close_{{$order->id}}" tabindex="-1" aria-labelledby="close_{{$order->id}}Label" aria-hidden="true">
                                                                                <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                    <h5 class="modal-title" id="close_{{$order->id}}Label">Close Order: {{ $loop->iteration}}</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <form action="">
                                                                                            @csrf
                        
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
                                                                                                                <td>
                                                                                                                    <input type="text" name="detail_name" placeholder="{{$details->item_name}}">                                                                                                
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" name="detail_price" placeholder="{{$details->price}}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" name="detail_quantity" placeholder="{{$details->quantity}}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" name="detail_specifics" placeholder="{{$details->specifics}}">
                                                                                                                    
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" name="detail_priority" placeholder="{{$details->priority}}">                                                                                                
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        @endif
                                                                                                    @endforeach
                                                                                                </tbody>
                                                                                            </table>
                        
                        
                                                                                        
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                    <button type="submit" class="btn btn-success">Save Changes</button>
                                                                                </form>
                                                                                    </div>
                                                                                </div>
                                                                                </div>
                                                                            </div>
                                                                        </td> --}}
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
                                                                <a href="#!" class=" b-b-primary text-primary">{{ $orders->render() }}</a>
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
    <script type="text/javascript" src="{{ asset('admin/js/mapping.js') }}"></script>
</body>

</html>
