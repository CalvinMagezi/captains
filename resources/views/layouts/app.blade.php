<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Captains POS</title>

         <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="{{ asset('dash_admin/images/logo.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('dash_admin/images/logo.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('dash_admin/images/logo.png') }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
         @trixassets
        @livewireStyles
         <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script defer src="https://unpkg.com/alpinejs@3.4.2/dist/cdn.min.js"></script>


        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
        <link rel="stylesheet" href="{{ asset('css/mapping.css') }}">


        <link rel="stylesheet" href="{{ asset('pos_admin/css/templatemo-style.css') }}">

    </head>
    <body id="reportsPage" class="font-sans antialiased">

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')
            @if(session()->has('error'))
            <div class="row justify-content-center alert_message">
                <div class="col-12">
                    <button class="btn btn-danger btn-lg w-100">{{ session()->get('error') }}</button>
                </div>
            </div>

            @endif
            @if(session()->has('success'))
            <div class="row justify-content-center alert_message">
                <div class="col-12">
                    <button class="btn btn-success btn-lg w-100">{{ session()->get('success') }}</button>
                </div>
            </div>
            @endif

            <!-- Page Heading -->

                <header class="bg-white shadow">
                    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        @yield('header')
                    </div>
                </header>

            <!-- Page Content -->
            <main>
                <div class="fixed top-0 right-0 px-5 py-3 mt-3 mr-3 text-white duration-700 transform bg-green-400 rounded-sm shadow-lg opacity-0 event-notification-box">
                </div>
                @yield('content')
                 {{-- @livewire('chat-component') --}}
            </main>

            {{-- Sidebar Section --}}
            @include('layouts.includes.sidebar')
        </div>

        @stack('modals')

        @livewireScripts
        <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('pos_admin/js/jquery-ui-touch-punch-master/jquery.ui.touch-punch.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('pos_admin/js/popper.js/popper.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('pos_admin/pages/widget/excanvas.js') }}"></script>
        <script src="{{ url('/js/socket.js') }}"></script>
        @stack('chat-websocket')
         <!-- https://jquery.com/download/ -->
        <script src="{{ asset('pos_admin/js/moment.min.js') }}"></script>
        <!-- http://www.chartjs.org/docs/latest/ -->
        <script src="{{ asset('pos_admin/js/tooplate-scripts.js') }}"></script>
    <script>
        Chart.defaults.global.defaultFontColor = 'white';
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart;
        barChart, pieChart;
        // DOM is ready
        $(function () {
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart

            $(window).resize(function () {
                updateLineChart();
                updateBarChart();
            });
        })
    </script>
        <script>

            //Instantiate a connection
            var connection = clientSocket();

            //The event listener that will be dipatched to the web socket server
            window.addEventListener('event-notification', event => {
                connection.send(JSON.stringify({
                    eventName: event.detail.eventName,
                    eventMessage: event.detail.eventMessage
                }));
            })

               //When connected to web socket server
               connection.onopen = function () {
               console.log("Connection is open");
            }

            connection.onclose = function (){
                console.log("Connection was closed! ");
            }



            connection.onmessage = function (message){
                var result = JSON.parse(message.data);
                var notificationMessage = `
                    <h3>${result.eventName}</h3>
                    <p>${result.eventMessage}</p>
                `;

                //Begin Notification animation
                $(".event-notification-box").html(notificationMessage);
                $(".event-notification-box").removeClass("opacity-0");
                $(".event-notification-box").addClass("opacity-100");

                setTimeout(() => {
                    $(".event-notification-box").removeClass("opacity-100");
                    $(".event-notification-box").addClass("opacity-0");
                }, 3000);
            }


            $(document).ready(function(){
                setTimeout(() => {
                    $('.alert_message').remove();
                }, 5000);
            });
        </script>
        @yield('script')
        @stack('table-scripts')
    </body>
</html>
