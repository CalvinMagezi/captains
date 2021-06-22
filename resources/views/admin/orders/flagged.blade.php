@include('partials.admin-header')


<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Flagged Orders</h5>
                        <p class="m-b-0">Welcome {{Auth::user()->first_name.' '.Auth::user()->last_name }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">View Flagged Orders</a>
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
                                                <th>Taken By</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                @if (Auth::user()->role == 'admin')
                                                <th>Edit</th>
                                                <th>Close</th>
                                                <th>Delete</th>
                                                @endif                                                
                                            </tr>
                                            </thead>
                                            <tbody>
    
                                                @foreach ($all_orders as $order)
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
                                                    <td>{{ $order->taken_by }}</td>
                                                    <td>{{ $order->status }}</td>
                                                    <td>KES {{ $order->prices_total }}</td>
                                                    @if (Auth::user()->role == 'admin')
                                                    <td><button>Edit</button></td>
                                                    <td><button>Close</button></td>
                                                    <td><button>Delete</button></td>                                                        
                                                    @endif
                                                </tr>
                                                @endforeach
                                        
                                            </tbody>
                                        </table>                                        
                                        <div class="text-right m-r-20">
                                            <a href="#!" class=" b-b-primary text-primary">{{ $all_orders->render() }}</a>
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
{{-- <script type="text/javascript" src="{{ asset('admin/js/mapping.js') }}"></script> --}}
<script type="text/javascript" src="{{ asset('admin/js/order.js') }}"></script>

</body>

</html>