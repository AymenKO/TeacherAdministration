<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Dashboard</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{asset('admin/css/styles.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
             <!-- Navbar -->
                @include('layouts.partials.navbar')
            <!-- Sidebar -->
            <div id="layoutSidenav">
                <div class="layoutSidenav_nav">
                    @include('layouts.partials.sidebar')
                </div>
                <div id="layoutSidenav_content">
                <div class="content ms-3">
                    <main>
                        <div class="container-fluid px-4">
                            @yield('content')
                        </div>
                    {{-- @include ('layouts.partials.footer') --}}
                    </main>
                </div>
                </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script src="{{asset('js/scripts.js')}}"></script>
        </div>
    </body>
</html>
