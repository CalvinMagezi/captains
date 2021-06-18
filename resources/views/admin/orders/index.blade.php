@include('partials.admin-header')


<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">New Order</h5>
                        <p class="m-b-0">Welcome {{Auth::user()->first_name.' '.Auth::user()->last_name }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Create New Order</a>
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
                              <h1>Place New Order</h1>
                              <hr>
                          </div>

                          <div class="row justify-content-center text-center mb-2">
                              <div class="col-12">
                                  <h3>My Tables</h3>
                                  
                              </div>
                              
                                @foreach ($tables as $table)  
                                      @if (Auth::user()->role != 'admin')
                                          @if ($table->managed_by == Auth::user()->first_name)
                                          <div class="col-lg-1 col-md-2 col-sm-3 p-1 mr-1 mb-1 text-center tb" style="border:1px solid black;">
                                            <button style="border: none; width:100%; background:none;" class="set-table text-center" type="button">
                                                {{ $table->table_number }}
                                            </button>                                                                                                                              
                                          </div>
                                          @endif
                                      @else
                                      <div class="col-lg-1 col-md-2 col-sm-3 p-1 mr-1 mb-1 text-center tb" style="border:1px solid black;">
                                        <button style="border: none; width:100%; background:none;" class="set-table text-center" type="button">
                                            {{ $table->table_number }}
                                        </button>                                                                                                                              
                                      </div>
                                      @endif                                                                                                                                                                
                            @endforeach
                            
                          </div>
                          <div class="row">
                        <div class="col-lg-7 col-md-12 col-sm-12 text-center">
                            <div class="row">
                                <div class="col-lg-6 col-md-9">
                                    <label for="search">Search For Item Name</label>
                                    <input name="search" id="search" class="search form-control" type="text">
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <label for="search">How Many</label>
                                    <div data-role="controlgroup" data-type="horizontal" data-mini="true">
                                        <button class="plus" id="plus" data-inline="true">+</button>
                                        <input type="text" id="number" value="1" class="text-center" style="width:30px;" readonly/>
                                        <button class="minus" id="minus" data-inline="true">-</button>
                                      </div>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <label for="specifics">Specifics</label>
                                    <div class="input-group mb-3">                                        
                                        <select class="custom-select" id="specifics">
                                          <option value="regular" selected>Regular</option>
                                          <option value="cold">Cold</option>
                                          <option value="Hot">Hot</option>                                          
                                        </select>
                                      </div>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <label for="priority">Priority</label>
                                    <div class="input-group mb-3">                                        
                                        <select class="custom-select" id="priority">
                                          <option value="regular" selected>Regular</option>
                                          <option value="first">Bring First</option>
                                          <option value="last">Bring Last</option>
                                          <option value="together">Bring With Everything</option>
                                        </select>
                                      </div>
                                </div>
                            </div>
                            
                            <button class="btn btn-md btn-success mb-3 mt-2" 
                                id="addBtn" type="button">
                                  Add Item To Order
                              </button>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th class="text-center">#</th>
                                      <th class="text-center">Name</th>
                                      <th class="text-center">Price</th>
                                      <th class="text-center">Quantity</th>                                      
                                      <th class="text-center">Remove</th>
                                    </tr>
                                  </thead>
                                  <tbody id="tbody">
                            
                                  </tbody>
                                </table>
                              </div>
                              
                        </div>
                        <div class="col-lg-5 col-md-12 col-sm-12 text-center">                           

                                <div class="card text-center">
                                    <div class="card-header">
                                        Preview Of Bill 
                                        <br>
                                        <h3 id="chosen_table"></h3>
                                        <br>
                                       Order taken by: <span id="waiter">{{Auth::user()->first_name.' '.Auth::user()->last_name }}</span> .
                                    </div>
                                    <div class="card-body">                                      
                                      
                                      <div class="table-responsive">
                                        <table class="table table-bordered confirm_table">
                                          <thead>
                                            <tr>
                                              <th class="text-center">#</th>
                                              <th class="text-center">Name & Quantity</th>
                                              <th class="text-center">Price</th>                                         
                                            </tr>
                                          </thead>
                                          <tbody id="tbody_confirm">
                                    
                                          </tbody>
                                        </table>
                                      </div>  
                                      
                                      <h5 class="card-title mb-2" id="price_total">Order Total: </h5>
                                    </div>
                                    <div class="card-footer text-muted">
                                        <input type="hidden" class="final_price" name="price_total" readonly>
                                        <div class="form-group">
                                            <label for="extra_notes">Extra Notes</label>
                                            <textarea class="form-control" id="extra_notes" rows="3"></textarea>
                                          </div>
                                        <a href="#" class="btn btn-primary mb-2">Print Order</a>
                                        <button type="submit" class="btn btn-success mb-2 save-order">Submit Order</button>
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