@include('partials.admin-header')


<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">User Management</h5>
                        <p class="m-b-0">Welcome {{Auth::user()->first_name.' '.Auth::user()->last_name }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="/"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Manage Inventory</a>
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
                                    <h5>Product List</h5>
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
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Unique ID</th>
                                                <th>Description</th>
                                                <th>Quantity</th>                                                
                                                <th>Regular Price</th>
                                                <th>Happy Hour Price</th>
                                                <th>Major Category</th>
                                                <th>Secondary Category</th>
                                                <th>Status</th>                                                                                                                                             
                                            </tr>
                                            </thead>
                                            <tbody>
    
                                                @foreach ($items as $item)                                                
                                                <tr>
                                                    <td># {{$loop->iteration}}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->unique_id }}</td>
                                                    <td>{{ $item->description }}</td>
                                                    <td>{{ $item->quantity }}</td>
                                                    <td>{{ $item->price }}</td>
                                                    <td>{{ $item->hprice }}</td>
                                                    <td>{{ $item->major_category }}</td>
                                                    <td>{{ $item->category }}</td>
                                                    @if ($item->status  == true)
                                                    <td>Available</td> 
                                                    @else
                                                    <td>Not Available</td> 
                                                    @endif
                                                                                                      
                                                    <td>
                                                        <button class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$item->id}}">Edit</button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="edit_{{$item->id}}" tabindex="-1" aria-labelledby="edit_{{$item->id}}Label" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="edit_{{$item->id}}Label">Edit {{ $item->name}}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                                <div class="modal-body">                                                               
                                                                   <form action="/edit-item" method="POST">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group form-primary">
                                                                                <label class="float-label">Name</label>
                                                                                <input type="text" placeholder="{{$item->name}}" name="name" class="form-control" >                                                                                
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group form-primary">
                                                                                <label class="float-label">Quantity</label>
                                                                                <input type="number" placeholder="{{$item->quantity}}" name="quantity" class="form-control" >                                                                                                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label>Description</label>
                                                                                <textarea class="form-control" name="description" rows="3"></textarea>
                                                                              </div>
                                                                        </div>
                                                                    </div>
                                        
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group form-primary">
                                                                                <label class="float-label">Price</label>
                                                                                <input type="number" placeholder="{{$item->price}}" name="price" class="form-control" >                                                                                                                                                                
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group form-primary">
                                                                                <label class="float-label">Happy H Price</label>
                                                                                <input type="number" placeholder="{{$item->hprice}}" name="hprice" class="form-control" >                                                                                                                                                              
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group form-primary">
                                                                                <label class="float-label">Major Category</label>
                                                                                <input type="text" placeholder="{{$item->major_category}}" name="major_category" class="form-control">
                                                                                <span class="form-bar"></span>                                        
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group form-primary">
                                                                                <label class="float-label">Secondary Category</label>
                                                                                <input type="text" placeholder="{{$item->category}}" name="category" class="form-control" >                                                                                                                                                               
                                                                            </div>
                                                                        </div>
                                                                    </div>                                                                                                                                                 
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <input type="hidden" name="id" value="{{$item->id}}">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                                                                
                                                                <button type="submit" class="btn btn-success">Save Changes</button>                                                                
                                                                </div>
                                                            </form> 
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                          
                                                    <td>
                                                        <button class="btn btn-danger" data-toggle="modal" data-target="#delete_{{$item->id}}">Delete</button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="delete_{{$item->id}}" tabindex="-1" aria-labelledby="delete_{{$item->id}}Label" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="delete_{{$item->id}}Label">Delete: {{ $item->name}} </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                Are you sure you wish to delete {{ $item->name}}? This action is irreversible.
                                                                </div>
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <form action="/delete-item" method="POST">
                                                                @csrf
                                                                    <input type="hidden" name="id" value="{{$item->id}}">
                                                                    <button type="submit" class="btn btn-danger">Delete Item</button>
                                                                </form>
                                                                
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </td>                                                                                                            
                                                </tr>                                                
                                                @endforeach
                                        
                                                
                                            </tbody>                                        
                                        </table>                                        
                                        <div class="text-right m-r-20">
                                            <a href="#!" class=" b-b-primary text-primary">{{ $items->render() }}</a>
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
</body>

</html>