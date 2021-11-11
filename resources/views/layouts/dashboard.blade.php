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
        <script defer src="https://unpkg.com/alpinejs@3.4.2/dist/cdn.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        @include('partials.darkmodestyles')
        @stack('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.17/tailwind.min.css" integrity="sha512-yXagpXH0ulYCN8G/Wl7GK+XIpdnkh5fGHM5rOzG8Kb9Is5Ua8nZWRx5/RaKypcbSHc56mQe0GBG0HQIGTmd8bw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<div x-data="setup()" :class="{ 'dark': isDark }">
    <div class="flex flex-col flex-auto flex-shrink-0 min-h-screen antialiased text-black bg-white dark:bg-gray-700 dark:text-white">
        @livewire('top-bar')
        @livewire('dashboard-sidebar')
        <div class="h-full mb-10 ml-14 mt-14 md:ml-64">
            @yield('content')
        </div>
    </div>
</div>



@livewireScripts
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="{{ asset('assets/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pos_admin/js/jquery-ui-touch-punch-master/jquery.ui.touch-punch.min.js') }}"></script>
<script>
    const setup = () => {
      const getTheme = () => {
        if (window.localStorage.getItem('dark')) {
          return JSON.parse(window.localStorage.getItem('dark'))
        }
        return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
      }

      const setTheme = (value) => {
        window.localStorage.setItem('dark', value)
      }

      return {
        loading: true,
        isDark: getTheme(),
        toggleTheme() {
          this.isDark = !this.isDark
          setTheme(this.isDark)
        },
      }
    }
  </script>
  @stack('scripts')
</body>
</html>
