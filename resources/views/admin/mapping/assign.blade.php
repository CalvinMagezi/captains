@include('partials.admin-header')
@include('partials.assign-css')

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
                            <a href="/"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Assign Table</a>
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
                    <div class="row assigning">
                        <div class="col-lg-5 col-md-12 col-sm-12">
                            <div id="left">
                                <div id="form-wrapper">                                                                    
                                  
                                    
                                    <h1 class="text-center">Assign Tables</h1>
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
                                    <div class="row justify-content-center">
                                        @foreach ($tables as $table)
                                           <div class="col-2 text-center m-1">
                                               @if ($table->managed_by == 'free')
                                               <button class="choose_this_table" id="tb{{ $table->table_number }}" style="border: 1px solid black; width:100%; background:white;" >
                                                {{ $table->table_number }}    
                                            </button>   
                                               @else
                                               <button disabled class="choose_this_table" id="tb{{ $table->table_number }}" style="border: 1px solid black; width:100%; color:white; background:{{ $table->color_code }};" >
                                                {{ $table->table_number }}    
                                            </button>   
                                               @endif
                                                  
                                          </div> 
                                        @endforeach
                                    </div>
                                    <div id="form-col-wrapper" class="justify-content-center text-center align-items-center">
                                      <div id="form-left mx-auto">
                                        <h3>Assign To: </h3>
                                        <div class="row justify-content-center text-center align-items-center radio-toolbar">
                                        @foreach ($waiters as $waiter)
                                        <div class="col-4" >                                             
                                            <input type="radio" value="{{ $waiter->first_name }}" id="{{$waiter->color_code}}" name="assignto" class="mr-1 assignto" required> 
                                            <label style="background:{{$waiter->color_code}}; color:white;" for="{{$waiter->color_code}}">{{ $waiter->first_name }} </label>                                                                                  
                                        </div>                                        
                                        @endforeach    
                                        </div>
                                                                                                                        
                                      </div>                                     
                                        <div class="form-footer mt-2">  
                                            <div class="row justify-content-center align-items-center text-center">
                                                <div class="col-4 mb-2">
                                                    <input class="submit-button mb-1 my-auto" type="submit" value="Assign Table" >
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-info mt-1 my-auto" type="submit" data-toggle="modal" data-target="#clear">Clear Assigned Tables</button>
                                                </div>
                                            </div>                                          
                                            

                                            <!-- Modal -->
                                            <div class="modal fade" id="clear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Clear Current Assigned Tables</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">                                                                            
                                                              Are you sure you wish to clear all table assignments?                                                                                                          
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <form action="{{ route('clear-assign')}}" method="POST">
                                                        @csrf
                                                    <button type="submit" class="btn btn-primary">Clear Assigned tables</button>
                                                    </form>
                                                    </div>
                                                </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>                                    
                                                                     
                                </div>
                              </div>
                        </div>
                        <div class="col-lg-7 col-md-12 col-sm-12">
                            <div id="right">
                                <div id="right-wrapper">
                                  <h2 class="text-center mb-2">Current Table Assignments</h2>
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
<script type="text/javascript" src="{{ asset('admin/js/assign-tables.js') }}"></script>
</body>

</html>