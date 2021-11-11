<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receipt</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.17/tailwind.min.css" integrity="sha512-yXagpXH0ulYCN8G/Wl7GK+XIpdnkh5fGHM5rOzG8Kb9Is5Ua8nZWRx5/RaKypcbSHc56mQe0GBG0HQIGTmd8bw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
    @include('partials.receiptstyles')
</head>
<body>
    <main>
        @yield('content')
    </main>

    @livewireScripts
    @stack('scripts')
</body>
</html>
