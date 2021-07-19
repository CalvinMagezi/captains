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
                    @if (session('success'))
                    <div class="row justify-content-center">             
                        <div class="col-12 btn btn-success" style="width: 100%">
                            <h4 style="color: white;" class="pt-2 pb-2">{{ session()->get('success') }}</h4>
                        </div>
                      </div>
                    @endif
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
     (function ($) {
    "user strict";

    $(document).ready(function(){
        $.ajaxSetup({

            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

            setInterval(() => {
            //Empty then populate Array With All Products                

            $(".table tbody").empty();

            $.ajax({          
                url: "/api/get-kitchen-items",
                type:"GET",          
                success:function(result){                           
                result.forEach((item) => {
                 
                    markup = "<tr class='text-center'><td> "+ item.order_id + "</td> <td>"+ item.item_name +"</td> <td>" + item.quantity +"</td> <td>"+ item.specifics +"</td><td>"+ item.priority +"<td><form action='/api/item-ready' method='POST'> <input type='hidden' name='item_name' value='"+item.item_name+"'/> <input type='hidden' name='taken_by' value='"+item.taken_by+"'/> <input type='hidden' name='order_id' value='"+item.order_id+"'/> <button type='submit' class='btn btn-success'>Notify "+item.taken_by+"</button></form></td></tr>";
                    tableBody = $(".table tbody");
                    tableBody.append(markup); 

                    }); 
                },
                error:function(){
                    console.log("error");              
                }
            });

            }, 5000);           

    })

})(jQuery);
</script>

</body>

</html>