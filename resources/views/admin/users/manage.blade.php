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
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Manage Users</a>
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
                                    <h5>Current Users</h5>
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
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Pin</th>
                                                <th>Staff Number</th>                                                
                                                <th>Position</th>
                                                <th>Role</th>
                                                <th>Tables Assigned</th>
                                                <th>Casuals Assigned</th>
                                                <th>Color Code</th>
                                                <th>Email</th>                                                                                             
                                            </tr>
                                            </thead>
                                            <tbody>
    
                                                @foreach ($users as $user)                                                
                                                <tr>
                                                    <td># {{$loop->iteration}}</td>
                                                    <td>{{ $user->first_name }}</td>
                                                    <td>{{ $user->last_name }}</td>
                                                    <td>{{ $user->pin }}</td>
                                                    <td>{{ $user->staff_number }}</td>
                                                    <td>{{ $user->position }}</td>
                                                    <td>{{ $user->role }}</td>
                                                    <td>{{ $user->tables_incharge_of }}</td>
                                                    <td>{{ $user->casuals_assigned }}</td>
                                                    <td>{{ $user->color_code }}</td>
                                                    <td>{{ $user->email }}</td>                                                    
                                                    <td>
                                                        <button class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$user->id}}">Edit</button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="edit_{{$user->id}}" tabindex="-1" aria-labelledby="edit_{{$user->id}}Label" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="edit_{{$user->id}}Label">Edit {{ $user->first_name}} {{$user->last_name}}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                                <div class="modal-body">                                                               
                                                                   <form action="/edit-user" method="POST">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group form-primary">
                                                                                <label class="float-label">First Name</label>
                                                                                <input type="text" placeholder="{{$user->first_name}}" name="first_name" class="form-control" >                                                                                
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group form-primary">
                                                                                <label class="float-label">Last Name</label>
                                                                                <input type="text" placeholder="{{$user->last_name}}" name="last_name" class="form-control" >                                                                                                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                        
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group form-primary">
                                                                                <label class="float-label">Pin</label>
                                                                                <input type="text" placeholder="{{$user->pin}}" name="pin" class="form-control" >                                                                                                                                                                
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group form-primary">
                                                                                <label class="float-label">Position</label>
                                                                                <input type="text" placeholder="{{$user->position}}" name="position" class="form-control" >                                                                                                                                                              
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group form-primary">
                                                                                <label class="float-label">Color Code</label>
                                                                                <input type="text" placeholder="{{$user->color_code}}" name="color_code" class="form-control">
                                                                                <span class="form-bar"></span>                                        
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group form-primary">
                                                                                <label class="float-label">Staff Number</label>
                                                                                <input type="text" placeholder="{{$user->staff_number}}" name="staff_number" class="form-control" >                                                                                                                                                               
                                                                            </div>
                                                                        </div>
                                                                    </div>                                                                            
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group form-primary">
                                                                                <label class="float-label">Role</label>
                                                                                <input type="text" placeholder="{{$user->role}}" name="role" class="form-control">
                                                                                <span class="form-bar"></span>                                        
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group form-primary">
                                                                                <label class="float-label">Email</label>
                                                                                <input type="email" placeholder="{{$user->email}}" name="email" class="form-control" >                                                                                                                                                               
                                                                            </div>
                                                                        </div>
                                                                    </div>                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <input type="hidden" name="id" value="{{$user->id}}">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                                                                
                                                                <button type="submit" class="btn btn-success">Save Changes</button>                                                                
                                                                </div>
                                                            </form> 
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                          
                                                    <td>
                                                        <button class="btn btn-danger" data-toggle="modal" data-target="#delete_{{$user->id}}">Delete</button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="delete_{{$user->id}}" tabindex="-1" aria-labelledby="delete_{{$user->id}}Label" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="delete_{{$user->id}}Label">Delete User: {{ $user->first_name}} {{$user->last_name}}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                Are you sure you wish to delete {{ $user->first_name}} {{$user->last_name}}? This action is irreversible.
                                                                </div>
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <form action="/delete-user" method="POST">
                                                                @csrf
                                                                    <input type="hidden" name="id" value="{{$user->id}}">
                                                                    <button type="submit" class="btn btn-danger">Delete User</button>
                                                                </form>
                                                                
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <form action="/clear-casuals" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$user->id}}">
                                                            <button type="submit" class="btn btn-primary">Clear Casuals</button>  
                                                            </form>
                                                    </td>                                                                                                           
                                                </tr>                                                
                                                @endforeach
                                        
                                                
                                            </tbody>                                        
                                        </table>                                        
                                        <div class="text-right m-r-20">
                                            <a href="#!" class=" b-b-primary text-primary">{{ $users->render() }}</a>
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