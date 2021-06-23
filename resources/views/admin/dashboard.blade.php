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
                                                                <h6 class="text-muted m-b-0">My losed Orders</h6>
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
                                            {{-- <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row justify-content-center text-center  align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-blue">KES 500</h4>
                                                                <h6 class="text-muted m-b-0">Today's Sales </h6>
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
                                            </div> --}}
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
                                                        <div id="mapping-container" class="mapping-container mx-auto" >
                                                            <section id="outside-tables">
                                                                <div class="balcony text-center">View Of Park</div>
                                                                <div class="long-table-1 text-center">Long Table 1</div>
                                                                <div class="bar text-center">Cocktail Bar</div>
                                                                <div class="long-table-2 text-center">Long Table 2</div>
                                                                <div class="dj text-center"> DJ Stand</div>
                                                                <div class="kitchen text-center">K I T C H E N</div>
                                                                <div class="page-line-l"></div>
                                                                <div class="page-line-r"></div>
                                                                <div class="vip-1 text-center">Prive' 1</div>
                                                                <div class="vip-2 text-center">Prive' 2</div>
                                                                <div class="bar-2 text-center">Bar</div>
                                                                <div class="station text-center">Station</div>
                                                                <div class="bar-3 text-center">Main Bar</div>
                                                                <div class="dj-2 text-center">DJ Stand</div>
                                                                {{-- <div class="curtain-1"></div>
                                                                <div class="curtain-2"></div>
                                                                <div class="curtain-3"></div>
                                                                <div class="curtain-4"></div>
                                                                <div class="curtain-5"></div>
                                                                <div class="curtain-6"></div> --}}
                                                            </section>                                                      
                                                        </div>
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
                                            <div class="col-xl-4 col-md-12">
                                                <div class="card ">
                                                    <div class="card-header">
                                                        <h5>Active Staff Members</h5>
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

                                                        @foreach($users as $user)   
                                                        @if($user->role == 'staff')
                                                        <div class="align-middle m-b-30">

                                                            @if($user->role == 'admin' || $user->position == 'asst. accountant')
                                                            <img src="admin/images/roles/admin.png" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                            @endif
                                                            @if($user->position == 'cashier')
                                                            <img src="admin/images/roles/admin.png" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                            @endif
                                                            @if($user->position == 'cook' || $user->position == 'sous-chef')
                                                            <img src="admin/images/roles/cook.png" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                            @endif
                                                            @if($user->position == 'steward')
                                                            <img src="admin/images/roles/steward.png" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                            @endif
                                                            @if($user->position == 'wait' || $user->position == 'bartender')
                                                            <img src="admin/images/roles/wait.png" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                            @endif
                                                            
                                                            <div class="d-inline-block">
                                                                <h6>{{ $user->first_name.' '.$user->last_name }}</h6>
                                                                <p class="text-muted m-b-0">{{ $user->status }}</p>
                                                                <p class="text-muted m-b-0">{{ $user->position }}</p>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @endforeach
                                                         
                                                        @if (Auth::user()->role == 'admin')
                                                        <div class="text-center">
                                                            <a href="#!" class="b-b-primary text-primary">Edit Staff</a>
                                                        </div>
                                                        @endif
                                                        
                                                    </div>
                                                </div>

                                                <br>

                                               
                                            </div>
                                            <!--  staff member end -->                                            
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
