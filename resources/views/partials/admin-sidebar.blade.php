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
                    <span id="more-details">{{ Auth::user()->name }}<i class="fa fa-caret-down"></i></span>
                </div>
            </div>

            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="user-profile.html"><i class="ti-user"></i>View Profile</a>
                        <a href="#!"><i class="ti-settings"></i>Settings</a>
                        <a href="auth-normal-sign-in.html"><i class="ti-layout-sidebar-left"></i>Logout</a>
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
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Orders</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                  <li class=" ">
                      <a href="/create-order" class="waves-effect waves-dark">
                          <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                          <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">New Order</span>
                          <span class="pcoded-mcaret"></span>
                      </a>
                  </li>
                    <li class=" ">
                        <a href="accordion.html" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Ongoing</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="breadcrumb.html" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Ready To Pay</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="button.html" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Flagged</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="tabs.html" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Closed</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>                                      
                </ul>
            </li>
        </ul>
        <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Items &amp; Orders</div>
        <ul class="pcoded-item pcoded-left-item">
            <li>
                <a href="form-elements-component.html" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">All Items</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="bs-basic-table.html" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">All Orders</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

        </ul>

        <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Tables &amp; Mapping</div>
        <ul class="pcoded-item pcoded-left-item">
            <li>
                <a href="chart.html" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Table Info</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="map-google.html" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Mapping</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            

        </ul>

        @if (Auth::user()->role == 'admin')
            
        <div class="pcoded-navigation-label" data-i18n="nav.category.other">Admin</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu ">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-direction-alt"></i><b>M</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.menu-levels.main">Admin Functions</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-21">Edit Users</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>                                      
                    <li class="">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-23">Edit Tables & Mapping</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                      <a href="javascript:void(0)" class="waves-effect waves-dark">
                          <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                          <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-23">Edit Orders & Items</span>
                          <span class="pcoded-mcaret"></span>
                      </a>
                  </li>

                </ul>
            </li>
        </ul>
            
        @endif
        

    </div>
</nav>