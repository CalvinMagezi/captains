<div>
    <nav class="navbar navbar-expand-xl">
        <div class="container h-100">
            <a class="navbar-brand" href="{{ route('app-dashboard') }}">
                <h1 class="mb-0 tm-site-title">Captains POS</h1>
            </a>
            <button class="ml-auto mr-0 navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars tm-nav-icon"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="mx-auto navbar-nav h-100">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('app-dashboard') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pos') }}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            Waiter
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cashier') }}">
                            <i class="fa fa-dollar" aria-hidden="true"></i>
                            Cashier
                        </a>
                    </li>


                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-shopping-cart"></i>
                            <span>
                                Sections <i class="fas fa-angle-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/create-section">Create Section</a>
                            <a class="dropdown-item" href="#">Kitchen</a>
                            <a class="dropdown-item" href="#">Mainbar</a>
                            <a class="dropdown-item" href="#">Cocktail Bar</a>
                        </div>
                    </li> --}}


                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link d-block" href="/logout">
                            <b>Logout</b>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
</div>

{{-- <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto w-90 sm:px-6 lg:px-8">

           <div class="row">
               <div class="col-lg-1 lg:hidden">
                    <!-- Button trigger modal -->
                    <button type="button" class="px-3 py-3 mx-0 my-1 w-100 btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                        <i class="fas fa-bars"></i>
                    </button>
               </div>
               <div class="text-center nav-right col-lg-11 justify-content-center">
                    <ul class="flex pr-0 text-center">
                        <li class="mr-3">
                        <a href="/dashboard">
                           <i class="fa fa-home" aria-hidden="true"></i> Dashboard
                        </a>
                        </li>
                        <li class="mr-3">
                            <a href="/pos">
                               <i class="fa fa-cart-plus" aria-hidden="true"></i> Place Order
                            </a>
                            </li>
                        <li class="mr-3">
                            <a href="/cashier">
                              <i class="fa fa-plus" aria-hidden="true"></i> Cashier
                            </a>
                        </li>
                        <li class="mr-3">
                            <a href="#">
                              <i class="fa fa-bar-chart" aria-hidden="true"></i> Reports
                            </a>
                        </li>
                        <li class="mr-3">
                            <a href="/products">
                              <i class="fas fa-box "></i> Products
                            </a>
                        </li>
                        <li class="mr-3">
                            <a href="/products">
                              <i class="fas fa-user "></i> Customers
                            </a>
                        </li>
                        <li class="mr-3">
                            <a href="#">
                              <i class="fa fa-mail-forward" aria-hidden="true"></i> Requisitions
                            </a>
                        </li>
                    </ul>
               </div>
           </div>
    </div>
</nav>

<style>
    .nav-right li{
        background:#00b8b8;
        padding:10px;
        margin-top:5px;
        color:#fff;
        border-radius:20px;
    }
</style> --}}
