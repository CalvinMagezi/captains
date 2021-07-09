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
                        <li class="breadcrumb-item"><a href="#!">View Ongoing Kitchen Orders</a>
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
                        @if (Auth::user()->role == 'admin' || Auth::user()->position == 'bartender') 
                        <div class="col-12">
                            <div class="card table-card">
                                <div class="card-header">
                                    @if(session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session()->get('message') }}
                                        </div>
                                    @endif
                                    <h5>Kitchen Orders</h5>
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
                                                <tr class="text-center">
                                                    <td>For Order #</td>
                                                    <td>Item Name</td>
                                                    <td>Quantity</td>
                                                    <td>Specifics</td>
                                                    <td>Priority</td>                                                    
                                                    <td>Ready</td>                                                                
                                                </tr>
                                            </thead>
                                            <tbody id="main_bar_table">
                                                @foreach ($order_details as $details)
                                                 @if ($details->dispatched_to == 'kitchen')
                                                 @if ($details->ready == true)
                                                 <tr style="background:green; color:white;" class="text-center"> 
                                                @else
                                                <tr class="text-center"> 
                                                @endif                                                   
                                                    <td>
                                                        
                                                        <strong>{{$details->order_id}}</strong>
                                                    </td>
                                                    <td><strong>{{$details->item_name}}</strong></td>
                                                    <td><strong>{{$details->quantity}}</strong></td>
                                                    <td><strong>{{$details->specifics}}</strong></td>
                                                    <td><strong>{{$details->priority}}</strong></td>
                                                    @if ($details->ready == true)
                                                    <td><strong>Notified: {{$details->taken_by}}</strong></td>
                                                    @endif  
                                                   
                                                    @if ($details->ready != true)
                                                    <td>
                                                        
                                                        
                                                        <button class="btn btn-success" data-toggle="modal" data-target="#edit{{$loop->iteration}}">Ready</button>
                                                        
                                                        
                                                        
                                                          <!-- Modal -->
                                                            <div class="modal fade" id="edit{{$loop->iteration}}" tabindex="-1" aria-labelledby="edit{{$loop->iteration}}Label" aria-hidden="true">
                                                                 <div class="modal-dialog">
                                                                         <div class="modal-content">
                                                                              <div class="modal-header">
                                                                                <h5 class="modal-title" id="edit{{$loop->iteration}}Label">Notify: {{ $details->taken_by}}</h5>
                                                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                               <span aria-hidden="true">&times;</span>
                                                                              </button>
                                                                            </div>
                                                                         <div class="modal-body">                                                               
                                                                         Notify <strong>{{ $details->taken_by}}</strong> 
                                                                        <br>
                                                                         that their <strong>{{ $details->item_name}}</strong> is ready to be picked?                                                              
                                                                      </div>
                                                                     <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>  
                                                                    <form action="{{route('item-ready')}}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="order_id" value="{{$details->order_id}}">
                                                                    <input type="hidden" name="item_name" value="{{$details->item_name}}">
                                                                    <input type="hidden" name="taken_by" value="{{$details->taken_by}}">
                                                                        <button type="submit" class="btn btn-success">Notify</button> 
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
                                        
                                    </div>
                                </div>
                                <div class="card-footer bg-c-red">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white m-b-0"><span id="total_main_bar"></span> items left</p>
                                        </div>
                                        <div class="col-3 text-right">
                                            <i class="fa fa-line-chart text-white f-16"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        @endif 
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

    $('#total_cocktails').html(cocktailBar)
    $('#total_main_bar').html(mainBar) 

    setInterval(() => {
        location.reload()
    }, 10000);
    
</script>

</body>

</html>