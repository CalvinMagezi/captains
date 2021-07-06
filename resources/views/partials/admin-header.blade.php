<!DOCTYPE html>
<html lang="en">

<head>
    <title>Captains Terrace Admin Menu </title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Captains Terrace Restaurant, Bar and Lounge Nairobi" />
      <meta name="keywords" content="restaurant, pos, msimboit, captains terrace, bar, south c, lounge, responsive" />
      <meta name="author" content="msimboit" />
      <!-- Favicon icon -->
      <link rel="icon" href="{{ asset('admin/images/logo.png') }}" type="image/x-icon">
    <!-- Google font-->
    <link href="{{ url('https://fonts.googleapis.com/css?family=Roboto:400,500') }}" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="{{ asset('admin/pages/waves/css/waves.min.css') }}" type="text/css" media="all">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap/css/bootstrap.min.css') }}">
      <!-- waves.css -->
      <link rel="stylesheet" href="{{ asset('admin/pages/waves/css/waves.min.css') }}" type="text/css" media="all">
      <!-- themify icon -->
      <link rel="stylesheet" type="text/css" href="{{ asset('admin/icon/themify-icons/themify-icons.css') }}">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="{{ asset('admin/icon/font-awesome/css/font-awesome.min.css') }}">
      <!-- scrollbar.css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/jquery.mCustomScrollbar.css') }}">
        <!-- am chart export.css -->
        <link rel="stylesheet" href="{{ url('https://www.amcharts.com/lib/3/plugins/export/export.css') }}" type="text/css" media="all" />
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/mapping.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/style.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('css/search.css') }}">
      
  </head>

  <body>
  <!-- Pre-loader start -->
  <div class="theme-loader">
      <div class="loader-track">
          <div class="preloader-wrapper">
              <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
              <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Pre-loader end -->
  <div id="pcoded" class="pcoded" hidden-print>
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
          <nav class="navbar header-navbar pcoded-header">
              <div class="navbar-wrapper">
                  <div class="navbar-logo">
                      <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                          <i class="ti-menu"></i>
                      </a>
                      <div class="mobile-search waves-effect waves-light">
                          <div class="header-search">
                              <div class="main-search morphsearch-search">
                                  <div class="input-group">
                                      <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                      <input type="text" class="form-control" placeholder="Enter Keyword">
                                      <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <a href="/">
                          <img class="img-fluid img-responsive" style="max-width: 100px;" src="admin/images/logo.png" alt="Theme-Logo" />
                      </a>
                      <a class="mobile-options waves-effect waves-light">
                          <i class="ti-more"></i>
                      </a>
                  </div>
                
                  <div class="navbar-container container-fluid">
                      <ul class="nav-left">
                          <li>
                              <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                          </li>
                          <li class="header-search">
                              <div class="main-search morphsearch-search">
                                  <div class="input-group">
                                      <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                      <input type="text" class="form-control">
                                      <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                  </div>
                              </div>
                          </li>
                          <li>
                              <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                  <i class="ti-fullscreen"></i>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav-right">
                        @if (Auth::user()->role != 'admin')
                          <li class="header-notification">
                              <a href="#!" class="waves-effect waves-light">
                                  <i class="ti-bell"></i>
                                  <span class="badge bg-c-red"></span>
                              </a>
                              
                              <ul class="show-notification">
                                <li>
                                    <h6>My Tables</h6>
                                    <label class="label label-danger">{{ Auth::user()->role }}</label>
                                </li>
                                @if (Auth::user()->tables_incharge_of != 'free')
                                @foreach ($tables as $table)
                                @if ($table->managed_by == Auth::user()->first_name)  
                                <li class="waves-effect waves-light">
                                    <div class="media">                                      
                                        <div class="media-body">
                                            <h5 class="notification-user">Table number: {{ $table->table_number }}</h5>
                                            <p class="notification-msg">Table status: {{ $table->status}}</p>
                                            <span class="notification-time">Table location: {{ $table->position }}</span>
                                        </div>
                                    </div>
                                </li>
                                @endif                                    
                                @endforeach  
                                @endif
                                                                                              
                            </ul>
                        </li>
                              @else
                                  
                              @endif
                                                       

                          <li class="user-profile header-notification">
                              <a href="#!" class="waves-effect waves-light">
                                @if( Auth::user()->role  == 'admin' || Auth::user()->position == 'asst. accountant')
                                <img src="admin/images/roles/admin.png" alt="user image" class="img-radius img-40 align-top m-r-15">
                                @endif
                                @if(Auth::user()->position == 'cashier')
                                <img src="admin/images/roles/admin.png" alt="user image" class="img-radius img-40 align-top m-r-15">
                                @endif
                                @if(Auth::user()->position == 'cook' || Auth::user()->position == 'sous-chef')
                                <img src="admin/images/roles/cook.png" alt="user image" class="img-radius img-40 align-top m-r-15">
                                @endif
                                @if(Auth::user()->position == 'steward')
                                <img src="admin/images/roles/steward.png" alt="user image" class="img-radius img-40 align-top m-r-15">
                                @endif
                                @if(Auth::user()->position == 'wait' || Auth::user()->position == 'bartender')
                                <img src="admin/images/roles/wait.png" alt="user image" class="img-radius img-40 align-top m-r-15">
                                @endif
                                  <span>{{Auth::user()->first_name.' '.Auth::user()->last_name }}</span>
                                  <i class="ti-angle-down"></i>
                              </a>
                              <ul class="show-notification profile-notification">
                                  <li class="waves-effect waves-light">
                                      <a href="#!">
                                          <i class="ti-settings"></i> Settings
                                      </a>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <a href="#">
                                          <i class="ti-user"></i> Profile
                                      </a>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <a href="#">
                                          <i class="ti-email"></i> My Messages
                                      </a>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <a href="#">
                                          <i class="ti-lock"></i> Lock Screen
                                      </a>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <a href="/logout">
                                          <i class="ti-layout-sidebar-left"></i> Logout
                                      </a>
                                  </li>
                              </ul>
                          </li>
                      </ul>
                  </div>
              </div>
          </nav>

          <div class="pcoded-main-container">
              <div class="pcoded-wrapper">
                  <nav class="pcoded-navbar">
                      <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                      <div class="pcoded-inner-navbar main-menu">
                          <div class="">
                              <div class="main-menu-header">
                                @if( Auth::user()->role  == 'admin' || Auth::user()->position == 'asst. accountant')
                                <img src="admin/images/roles/admin.png" alt="user image" class="img-radius img-40 align-top m-r-15">
                                @endif
                                @if(Auth::user()->position == 'cashier')
                                <img src="admin/images/roles/admin.png" alt="user image" class="img-radius img-40 align-top m-r-15">
                                @endif
                                @if(Auth::user()->position == 'cook' || Auth::user()->position == 'sous-chef')
                                <img src="admin/images/roles/cook.png" alt="user image" class="img-radius img-40 align-top m-r-15">
                                @endif
                                @if(Auth::user()->position == 'steward')
                                <img src="admin/images/roles/steward.png" alt="user image" class="img-radius img-40 align-top m-r-15">
                                @endif
                                @if(Auth::user()->position == 'wait' || Auth::user()->position == 'bartender')
                                <img src="admin/images/roles/wait.png" alt="user image" class="img-radius img-40 align-top m-r-15">
                                @endif
                                  <div class="user-details">
                                      <span id="more-details">{{Auth::user()->first_name.' '.Auth::user()->last_name }}<i class="fa fa-caret-down"></i></span>
                                  </div>
                              </div>
        
                              <div class="main-menu-content">
                                  <ul>
                                      <li class="more-details">
                                          <a href="#"><i class="ti-user"></i>View Profile</a>
                                          <a href="#"><i class="ti-settings"></i>Settings</a>
                                          <a href="/logout"><i class="ti-layout-sidebar-left"></i>Logout</a>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                          <div class="p-15 p-b-0">
                              <form class="form-material">
                                  <div class="form-group form-primary">
                                      <input type="text" name="footer-email" class="form-control" required="">
                                      <span class="form-bar"></span>
                                      <label class="float-label"><i class="fa fa-search m-r-10"></i>Search Orders</label>
                                  </div>
                              </form>
                          </div>
                          <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Overall Management</div>
                          <ul class="pcoded-item pcoded-left-item">
                              <li class="active">
                                  <a href="/dashboard" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>                              
                          </ul>

                          <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Orders</div>
                          <ul class="pcoded-item pcoded-left-item">
                            <li class=" ">
                                <a href="/create-order" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">New Order</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                              <li class=" ">
                                  <a href="/ongoing-orders" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                      <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Ongoing</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>                                      
                              <li class=" ">
                                  <a href="/flagged-orders" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                      <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Flagged</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                              <li class=" ">
                                  <a href="/closed-orders" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                      <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Closed</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>  
                              <li class=" ">
                                <a href="/kitchen" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Kitchen</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li> 
                              <li class=" ">
                                <a href="/main-bar" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Main Bar</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li> 
                            <li class=" ">
                                <a href="/cocktail-bar" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Cocktail Bar</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>                                     
                          </ul>

                          <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Tables &amp; Mapping</div>
                          <ul class="pcoded-item pcoded-left-item">
                              @if (Auth::user()->role == 'admin')
                              <li>
                                <a href="/assign-tables" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Assign Tables</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                              @endif
                            <li>
                                <a href="/show-tables" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Mapping</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                              <li>
                                  <a href="#" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">Table Info</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                              
                              
        
                          </ul> 

                          

                          {{-- <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Reports</div>
                          <ul class="pcoded-item pcoded-left-item">
                              <li>
                                  <a href="#" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">Today's Sales</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                              <li>
                                  <a href="#" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">Inside Sales</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                              <li>
                                <a href="#" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Outside Sales</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">History</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
        
                          </ul> --}}
        
                          {{-- <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Items</div>
                          <ul class="pcoded-item pcoded-left-item">
                              <li>
                                  <a href="#" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">All Items</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                              <li>
                                  <a href="#" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">Most Popular</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
        
                          </ul>                            --}}
                          

                      </div>
                  </nav>