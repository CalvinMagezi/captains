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
                                            <div class="col-12 text-center">
                                                <h1>Sales History</h1>
                                                <hr>
                                            </div> 
                                            <!-- task, page, download counter  start -->
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row justify-content-center text-center align-items-center">
                                                            <div class="col-8">                                                                
                                                                <h4 class="text-c-purple">KES {{ $total }}</h4>                                                                
                                                                <h6 class="text-muted m-b-0">Total Sales</h6>                                                                                                                              
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
                                                                <h4 class="text-c-green">KES {{ $kitchen}}</h4>
                                                                <h6 class="text-muted m-b-0">Kitchen Total Sales</h6>                                                                                                                             
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
                                                                <h4 class="text-c-red">KES {{ $mainbar }}</h4>
                                                                <h6 class="text-muted m-b-0">Main Bar Total Sales</h6>                                                              
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
                                                                <h4 class="text-c-blue">KES {{$cocktailbar}}</h4>
                                                                <h6 class="text-muted m-b-0">Cocktail Bar Total Sales</h6>                                                                                                                           
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
    
    
                                            <!--  project and team member start -->
                                            <div class="col-xl-8 col-md-12">
                                                
                                                <div class="card table-card">
                                                    <div class="card-header">                                                        
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
                                                                    <th>Sale #</th>
                                                                    <th>ID</th>
                                                                    <th>Handled By</th>
                                                                    <th>Kitchen</th>
                                                                    <th>Main Bar</th>                                                
                                                                    <th>Cocktail Bar</th>
                                                                    <th>Total</th>
                                                                    <th>Made On</th>                                                                                                                   
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                        
                                                                    @foreach ($sales as $sale)
                                                                    <tr>
                                                                   <td>{{$sale->id}}</td>
                                                                   <td>{{$sale->unique_id}}</td>
                                                                   <td>{{$sale->handled_by}}</td>
                                                                   <td>KES {{$sale->kitchen}}</td>
                                                                   <td>KES {{$sale->mainbar}}</td>
                                                                   <td>KES {{$sale->cocktailbar}}</td>
                                                                   <td>KES {{$sale->total}}</td>
                                                                   <td>KES {{$sale->created_at}}</td>
                                                                    </tr>
                                                                    @endforeach                                                            
                                                                    
                                                                </tbody>                                        
                                                            </table>                                        
                                                            <div class="text-right m-r-20">
                                                                <a href="#!" class=" b-b-primary text-primary">{{ $sales->render() }}</a>
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
