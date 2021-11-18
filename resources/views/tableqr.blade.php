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
        @livewireStyles

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
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
@livewire('page-qr', ['table' => $table_number])
                        <!-- end of form -->
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
</body>

</html>


