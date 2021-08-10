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
                          <div class="row justify-content-center">
                        <div class="col-lg-7 col-md-12 col-sm-12 text-center">
                            <div class="row">
                              <div class="col-12 justify-content-center">
                                <div class="row ">
                                  <div class="col-12 justify-content-center"><strong>Pick a Category</strong></div>
                                  <div class="col-6 text-center">
                                    <div class="pt-1 pb-1 text-center mx-auto" style="height:90px; width:90px;" >
                                      <!-- Scrollable modal -->
                                      <!-- Button trigger modal -->
                                      <button type="button" style="height: 100%; width:100%;" class="btn btn-warning pt-2 pb-2" data-toggle="modal" data-target="#foods">
                                        FOOD
                                      </button>
                                      
                                      <!-- Modal -->
                                      <div class="modal fade" id="foods" tabindex="-1" aria-labelledby="foodsLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="foodsLabel">All Foods</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <div class="row justify-content-center">
                                                @foreach ($foods as $food)
                                                <div class="col-4 mb-1 mr-1">                                              
                                                <button type="button" style="height: 100%; width:100%;" class="btn btn-primary pt-2 pb-2 m-1 p-1 mb-1 mr-1" data-toggle="modal" data-target="#cf_{{$loop->iteration}}">
                                                  {{$food}}
                                                </button>
  
                                                          <!-- Modal -->
                                                  <div class="modal fade" id="cf_{{$loop->iteration}}" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="for_f_category" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="for_f_category">Type: {{$food}}</h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                          </button>
                                                        </div>
                                                        <div class="modal-body">
                                                          <div class="row justify-content-left text-left">
                                                            @foreach ($products as $product)
                                                            @if ($product->category == $food )
                                                            <div class="col-6 mb-2 mr-1">
                                                             
                                                            <button type="button" data-dismiss="modal" class="btn btn-success pt_item" placeholder="{{$product->price}}" value="{{$product->name}}">
                                                              {{$product->name}}KES {{$product->price}}
                                                            </button>    
                                                         
                                                            </div>
                                                            @endif
                                                            @endforeach 
                                                          </div>
                                                                                                                 
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                                                        
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                @endforeach
                                              </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              <button type="button" class="btn btn-primary">Understood</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                    </div>
                                  </div>
                                  <div class="col-6">
                                    <div class="pt-1 pb-1 text-center mx-auto" style="height:90px; width:90px;" >
                                      
                                      <!-- Scrollable modal -->
                                      <!-- Button trigger modal -->
                                      <button type="button" style="height: 100%; width:100%;" class="btn btn-primary pt-2 pb-2" data-toggle="modal" data-target="#drinks">
                                        DRINKS
                                      </button>
                                      
                                      <!-- Modal -->
                                      <div class="modal fade" id="drinks" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="staticBackdropLabel">All Drinks</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <div class="row justify-content-center">
                                              @foreach ($drinks as $drink)
                                              <div class="col-4 mb-1 mr-1">                                              
                                              <button type="button" style="height: 100%; width:100%;" class="btn btn-primary pt-2 pb-2 m-1 p-1 mb-1 mr-1" data-toggle="modal" data-target="#c_{{$loop->iteration}}">
                                                {{$drink}}
                                              </button>

                                                        <!-- Modal -->
                                                <div class="modal fade" id="c_{{$loop->iteration}}" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="for_category" aria-hidden="true">
                                                  <div class="modal-dialog modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="for_category">Type: {{$drink}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <div class="row justify-content-left text-left">
                                                          @foreach ($products as $product)
                                                          @if ($product->category == $drink )
                                                          <div class="col-6 mb-2 mr-1">
                                                           
                                                          <button type="button" data-dismiss="modal" class="btn btn-success pt_item" placeholder="{{$product->price}}" value="{{$product->name}}">
                                                            {{$product->name}}KES {{$product->price}}
                                                          </button>    
                                                       
                                                          </div>
                                                          @endif
                                                          @endforeach 
                                                        </div>
                                                                                                               
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                                                        
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                              @endforeach
                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                                            
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                    </div>
                                  </div>
                                </div>
                                <div class="row mb-2 mt-2">
                                  <div class="col-6 pt-1 pb-1">
                                    <div class="form-row">
                                      <label class="col-2" for="search"><strong>Item Name: </strong></label>
                                      <input name="search" id="search" class="search col-10 form-control" type="text">
                                    </div>                                    
                                  </div>
                                  <div class="col-6 pt-1 pb-1">
                                    <div class="form-row">
                                      <label class="col-2" for="search_p"><strong>Item Price: </strong></label>
                                    <input name="search_p" id="search_p" class="search form-control col-10" type="text">
                                    </div>                                    
                                  </div>
                                </div>
                                
                              </div>
                               
                              <div class="col-12">
                              <div class="row text-center">
                                <div class="col-lg-4 col-md-4">
                                    <label for="search"><strong>How Many: </strong></label>
                                    <div data-role="controlgroup" data-type="horizontal" data-mini="true">
                                        <button class="plus" id="plus" data-inline="true">+</button>
                                        <input type="text" id="number" value="1" class="text-center" style="width:30px;" readonly/>
                                        <button class="minus" id="minus" data-inline="true">-</button>
                                      </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label for="specifics"><strong>Specifics: </strong></label>
                                    <div class="input-group mb-3">                                        
                                        <select style="width: 100%;" class="custom-select" id="specifics">
                                          <option value="regular" selected>Regular</option>
                                          <option value="cold">Cold</option>
                                          <option value="Hot">Hot</option>                                          
                                        </select>
                                      </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label for="priority"><strong>Priority: </strong></label>
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
                            </div>

                            </div>                          
                            
                            <button class="btn btn-md btn-success mb-3 mt-2" 
                                id="addBtn" type="button">
                                  Add Item To Order
                              </button>                                                          
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
                                      
                                      <div id="confirm_wrapper" class="table-responsive">
                                        <table id="confirm_table" class="table table-bordered confirm_table show-on-print" print>
                                          <thead>
                                            <tr>                                              
                                              <th class="text-center">#</th>
                                              <th class="text-center">Name & Quantity</th>
                                              <th class="text-center">Price</th> 
                                              <th class="text-center">Quantity</th>                                      
                                              <th class="text-center">Remove</th>                                        
                                            </tr>
                                          </thead>
                                          <tbody id="tbody">
                                    
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
                                        {{-- <button href="#" class="btn btn-primary mb-2 print_table">Print Order</button> --}}
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