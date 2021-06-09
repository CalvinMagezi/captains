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
                                        <div class="row">
                                            <!-- task, page, download counter  start -->
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-purple">30</h4>
                                                                <h6 class="text-muted m-b-0">Open Orders</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa fa-bar-chart f-28"></i>
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
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-green">290</h4>
                                                                <h6 class="text-muted m-b-0">Closed Orders</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa fa-file-text-o f-28"></i>
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
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-red">145</h4>
                                                                <h6 class="text-muted m-b-0">Active Staff</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa fa-calendar-check-o f-28"></i>
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
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-blue">KES 500</h4>
                                                                <h6 class="text-muted m-b-0">Today's Sales </h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa fa-hand-o-down f-28"></i>
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
                                                        <h5>Balcony Table Map & Status</h5>
                                                        <span class="text-muted">View current outside table mapping and table status.<em style="color: red">Red</em> means inactive, <em style="color: green">Green</em> means active.</span>
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
                                                        <div id="mapping-container" class="mapping-container" >
                                                            <section class="outside-tables">
      
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
                                                                <h4>Active Tables</h4>
                                                                <p class="text-muted">Today</p>
                                                            </div>
                                                            <div class="col-auto">
                                                                <label class="label label-success">+</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-8">
                                                                <canvas id="this-month" style="height: 150px;"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card quater-card">
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
                                                </div>
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
                                                                    <th>
                                                                        <div class="chk-option">
                                                                            <div class="checkbox-fade fade-in-primary">
                                                                                <label class="check-task">
                                                                                    <input type="checkbox" value="">
                                                                                    <span class="cr">
                                                                                            <i class="cr-icon fa fa-check txt-default"></i>
                                                                                        </span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        Table #</th>
                                                                    <th>Order</th>
                                                                    <th>Status</th>
                                                                    <th class="text-right">Priority</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                    @foreach ($orders as $order)
                                                                    <tr>
                                                                        <td>
                                                                            <div class="chk-option">
                                                                                <div class="checkbox-fade fade-in-primary">
                                                                                    <label class="check-task">
                                                                                        <input type="checkbox" value="">
                                                                                        <span class="cr">
                                                                                                    <i class="cr-icon fa fa-check txt-default"></i>
                                                                                                </span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="d-inline-block align-middle">
                                                                                {{-- <img src="admin/images/avatar-4.jpg" alt="user image" class="img-radius img-40 align-top m-r-15"> --}}
                                                                                <div class="d-inline-block">
                                                                                    <h6>{{ $order->table_number }}</h6>
                                                                                    {{-- <p class="text-muted m-b-0">Graphics Designer</p> --}}
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>{{ $order->item_name }}</td>
                                                                        <td>{{ $order->status }}</td>
                                                                        <td class="text-right"><label class="label label-danger">{{ $order->priority }}</label></td>
                                                                    </tr>
                                                                    @endforeach
                                                            
                                                                </tbody>
                                                            </table>
                                                            <div class="text-right m-r-20">
                                                                <a href="#!" class=" b-b-primary text-primary">View Active Orders</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Inside Table Map & Status</h5>
                                                        <span class="text-muted">View current inside table mapping and table status.<em style="color: red">Red</em> means inactive, <em style="color: green">Green</em> means active.</span>
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
                                                        <div id="mapping-container" class="mapping-container" >
                                                            <section class="inside-tables">
      
                                                            </section>                                                      
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-12">
                                                <div class="card ">
                                                    <div class="card-header">
                                                        <h5>Staff Members</h5>
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
                                                                <h6>{{ $user->name }}</h6>
                                                                <p class="text-muted m-b-0">{{ $user->status }}</p>
                                                                <p class="text-muted m-b-0">{{ $user->position }}</p>
                                                            </div>
                                                        </div>
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
