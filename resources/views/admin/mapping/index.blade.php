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
                            <a href="/"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Mapping</a>
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
                    {{-- @if (session('success'))
                    <div class="row justify-content-center text-center">
                        <div class="col-4">
                            <div class="alert alert-success" style="color:black; background:white;">
                                {{session('sucess')}}
                            </div>
                        </div>
                    </div>                    
                     @endif --}}
                      <div class="row justify-content-center"> 
                        

                         <div class="row justify-content-center">
                             {{-- Outside Tables --}}
                            <div class="col-lg-8 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Current Table Mapping Layout</h5>
                                        <span class="text-muted">View current table mapping and table status.<em style="color: red">Red</em> means inactive, <em style="color: green">Green</em> means active.</span>
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
                                    <div class="card-block align-items-center justify-content-center">
                                        <div id="mapping-container" class="mapping-container mx-auto" >
                                            <section id="outside-tables" class="outside-tables">
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

                         
                            @if (Auth::user()->role == 'admin')
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <h4 class="mb-1">Admin Privaleges</h4>
                                <hr>
                                <button type="button" class="btn btn-success save_tables mb-2">Save Changes</button>
                                <br>
                                <form action="{{route("new-inside-table")}}" method="POST">
                                    @csrf
                                <input type="hidden" name="position" value="inside">
                                <input type="hidden" name="table_number" class="inside_number">
                                <button type="submit" class="btn btn-primary mb-2">Add New Table</button>
                                </form>

                                {{-- <form action="{{ route("new-outside-table") }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="position" value="outside">
                                    <input type="hidden" name="table_number" class="outside_number">
                                    <button type="submit" class="btn btn-primary mb-2">Add An Outside Table</button>
                                </form> --}}
                                <hr>
                                <h5>Reset</h5>
                                <p class="disable">Click on a table and confirm reset.</p>
                                <hr>
                                
                                    <div class="row p-1" style="background:white; border:1px solid black;">
                                        @foreach ($tables as $table)
                                        
                                        <div class="col-lg-3 col-md-4 col-sm-6 p-1 mr-1 mb-1 text-center" style="border:1px solid black;">
                                            <form class="updateForm" action="{{ route("reset-table") }}" method="POST">
                                                @csrf
                                            
                                                <input class="form-check-input" type="hidden" id="check_{{ $table->table_number }}" name="table_number" value="{{ $table->table_number }}">    
                                                <button style="border: none; width:100%; background:none; " type="button" data-toggle="modal" data-target="#mod_{{ $table->table_number}}">
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
                                                        Confirm that you wish to reset table number <strong>{{ $table->table_number}}</strong>.
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary confirm">Confirm Reset</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div> 
                                            </form>                                             
                                        </div>                                                                                                                        
                                        @endforeach
                                    </div>                                                                   
                                
                            </div>
                                                          
                            @endif
                            
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