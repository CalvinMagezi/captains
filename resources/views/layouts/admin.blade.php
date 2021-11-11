<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <title>Captains POS Admin Dashboard</title>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    @livewireStyles
        @stack('styles')
</head>

<body class="antialiased text-blueGray-800">

    <noscript>You need to enable JavaScript to run this app.</noscript>

    <div id="app">
        <x-sidebar />

        <div class="relative min-h-screen md:ml-64 bg-blueGray-50">
            <x-nav />

            <div style="background:lightblue;" class="relative pt-12 pb-32 md:pt-32">
                <div class="w-full px-4 mx-auto md:px-10">&nbsp;</div>
            </div>

            <div class="relative w-full min-h-full px-4 mx-auto -m-48 md:px-10">
                @if(session('status'))
                    <x-alert message="{{ session('status') }}" variant="indigo" role="alert" />
                @endif

                @yield('content')

                <x-footer />
            </div>
        </div>

    </div>

    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    @livewireScripts
        @yield('scripts')
        @stack('scripts')
        <script>
            function closeAlert(event){
        let element = event.target;
        while(element.nodeName !== "BUTTON"){
          element = element.parentNode;
        }
        element.parentNode.parentNode.removeChild(element.parentNode);
      }
        </script>
</body>

</html>
