<!DOCTYPE html>
<html lang="en">

<head>
    <title>Captains Terrace</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Captains Terrace Restaurant, Bar and Lounge Nairobi" />
    <meta name="keywords" content="restaurant, pos, msimboit, captains terrace, bar, south c, lounge, responsive" />
    <meta name="author" content="msimboit & magezi tech solutions" />
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('dash_admin/images/logo.png') }}" type="image/x-icon">
  <!-- Google font-->
  <link href="{{ url('https://fonts.googleapis.com/css?family=Roboto:400,500') }}" rel="stylesheet">
  <!-- waves.css -->
  <link rel="stylesheet" href="{{ asset('dash_admin/pages/waves/css/waves.min.css') }}" type="text/css" media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dash_admin/css/bootstrap/css/bootstrap.min.css') }}">
    <!-- waves.css -->
    <link rel="stylesheet" href="{{ asset('dash_admin/pages/waves/css/waves.min.css') }}" type="text/css" media="all">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dash_admin/icon/themify-icons/themify-icons.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dash_admin/icon/font-awesome/css/font-awesome.min.css') }}">
    <!-- scrollbar.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dash_admin/css/jquery.mCustomScrollbar.css') }}">
      <!-- am chart export.css -->
      <link rel="stylesheet" href="{{ url('https://www.amcharts.com/lib/3/plugins/export/export.css') }}" type="text/css" media="all" />
    <!-- Style.css -->
    @livewireStyles
    <link rel="stylesheet" type="text/css" href="{{ asset('dash_admin/css/mapping.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dash_admin/css/style.css') }}">
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <form action="/update-happy" method="POST" class="md-float-material form-material">
                    @csrf
                    <div class="text-center">
                        <img src="{{ asset('dash_admin/images/logo.png') }}" style="max-width: 150px;" class="img img-responsive" alt="logo.png">
                    </div>
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center txt-primary">Adjust Happy Hour Time</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group form-primary">
                                        <label for="">Start Time</label>
                                        <input type="datetime-local" dateFormat="d/m/Y, H:i:s" name="start" class="form-control datetimepicker" required>
                                        <span class="form-bar"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-primary">
                                        <label for="">End Time</label>
                                        <input type="datetime-local" dateFormat="d/m/Y, H:i:s" name="end" class="form-control datetimepicker" required>
                                        <span class="form-bar"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <p>The time set shall repeat until changed, regardless of the date set.</p>
                                </div>
                            </div>

                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="submit" class="text-center btn btn-primary btn-md btn-block waves-effect m-b-20">Set</button>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-10">
                                    <p class="text-left text-inverse m-b-0">Teamwork Makes The Dream Work</p>
                                    <p class="text-left text-inverse"><a href="/app-dashboard"><b>Back to dashboard</b></a></p>
                                </div>
                                <div class="col-md-2">
                                    <img src="{{ asset('dash_admin/images/logo.png') }}" style="max-width: 50px" alt="small-logo.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container-fluid -->
</section>
 @livewireScripts
 <!-- Required Jquery -->
<script type="text/javascript" src="{{ asset('dash_admin/js/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('dash_admin/js/jquery-ui/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('dash_admin/js/popper.js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('dash_admin/js/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('dash_admin/pages/widget/excanvas.js') }}"></script>
<!-- waves js -->
<script src="{{ asset('dash_admin/pages/waves/js/waves.min.js') }}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{ asset('dash_admin/js/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{ asset('dash_admin/js/modernizr/modernizr.js') }}"></script>
<!-- slimscroll js -->
<script type="text/javascript" src="{{ asset('dash_admin/js/SmoothScroll.js') }}"></script>
<script src="{{ asset('dash_admin/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<!-- Chart js -->
<script type="text/javascript" src="{{ asset('dash_admin/js/chart.js/Chart.js') }}"></script>
<!-- amchart js -->
<script src="{{ url('https://www.amcharts.com/lib/3/amcharts.js') }}"></script>
<script src="{{ asset('dash_admin/pages/widget/amchart/gauge.js') }}"></script>
<script src="{{ asset('dash_admin/pages/widget/amchart/serial.js') }}"></script>
<script src="{{ asset('dash_admin/pages/widget/amchart/light.js') }}"></script>
<script src="{{ asset('dash_admin/pages/widget/amchart/pie.min.js') }}"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js') }}"></script>
<!-- menu js -->
<script src="{{ asset('dash_admin/js/pcoded.min.js') }}"></script>
<script src="{{ asset('dash_admin/js/vertical-layout.min.js') }}"></script>
<!-- custom js -->
<script type="text/javascript" src="{{ asset('dash_admin/pages/dashboard/custom-dashboard.js') }}"></script>
<script type="text/javascript" src="{{ asset('dash_admin/js/script.js') }}"></script>
<script>
    $('.datetimepicker').datetimepicker({
      format: 'LT'
    });
</script>
</body>

</html>
