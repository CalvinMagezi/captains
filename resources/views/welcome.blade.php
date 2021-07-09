<!DOCTYPE html>
<html lang="en">

<head>
    <title>Captains Terrace</title>
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

  <body themebg-pattern="theme1">
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

    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    
                        <form action="{{ route('login') }}" method="post" class="md-float-material form-material">
                            @csrf
                            <div class="text-center">
                                <img style="max-width: 300px;" src="{{ asset('admin/images/logo.png') }}" alt="logo.png">
                            </div>
                            <div class="auth-box card">
                                <div class="card-block">
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <h3 class="text-center">Sign In</h3>
                                        </div>
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="text" name="email" class="form-control" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Your Email Address</label>
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="password" name="password" class="form-control" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Password</label>
                                    </div>
                                    <div class="row m-t-25 text-left">
                                        <div class="col-12">
                                            <div class="checkbox-fade fade-in-primary d-">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                    <span class="text-inverse">Remember me</span>
                                                </label>
                                            </div>
                                            <div class="forgot-phone text-right f-right">
                                                <a href="#" class="text-right f-w-600"> Forgot Password?</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Sign in</button>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p class="text-inverse text-left m-b-0">Karibu</p>
                                            {{-- <p class="text-inverse text-left"><a href="index.html"><b>Back to website</b></a></p> --}}
                                        </div>
                                        <div class="col-md-2">
                                            <img style="max-width: 60px;" src="{{ asset('admin/images/logo.png') }}" alt="small-logo.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- end of form -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
<!-- Required Jquery -->
<script type="text/javascript" src="{{ asset('admin/js/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/jquery-ui/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/popper.js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/pages/widget/excanvas.js') }}"></script>
<!-- waves js -->
<script src="{{ asset('admin/pages/waves/js/waves.min.js') }}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{ asset('admin/js/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{ asset('admin/js/modernizr/modernizr.js') }}"></script>
<!-- slimscroll js -->
<script type="text/javascript" src="{{ asset('admin/js/SmoothScroll.js') }}"></script>
<script src="{{ asset('admin/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<!-- Chart js -->
<script type="text/javascript" src="{{ asset('admin/js/chart.js/Chart.js') }}"></script>
<!-- amchart js -->
<script src="{{ url('https://www.amcharts.com/lib/3/amcharts.js') }}"></script>
<script src="{{ asset('admin/pages/widget/amchart/gauge.js') }}"></script>
<script src="{{ asset('admin/pages/widget/amchart/serial.js') }}"></script>
<script src="{{ asset('admin/pages/widget/amchart/light.js') }}"></script>
<script src="{{ asset('admin/pages/widget/amchart/pie.min.js') }}"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js') }}"></script>
<!-- menu js -->
<script src="{{ asset('admin/js/pcoded.min.js') }}"></script>
<script src="{{ asset('admin/js/vertical-layout.min.js') }}"></script>
<!-- custom js -->
<script type="text/javascript" src="{{ asset('admin/pages/dashboard/custom-dashboard.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/script.js') }}"></script>
</body>

</html>
