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
        <script>
            function toggleChat() {
                var chatBox = document.getElementById('chat-box');
                chatBox.style.display = chatBox.style.display === 'none' ? 'block' : 'none';
            }

            function openChat(userId) {
                document.getElementById('chat-footer').classList.remove('d-none');
                // Fetch chat history for the user and display in the bubble (via AJAX or API)
            }

            function sendMessage() {
                var message = document.getElementById('chat-input').value;
                // Send the message (via AJAX or API)
                document.getElementById('chat-input').value = ''; // Clear the input field
            }
        </script>

        <style>
         #chat-button button {
    width: 35px; /* Set a fixed width */
    height: 35px; /* Set a fixed height */
    border-radius: 50%; /* Make sure it stays circular */
    padding: 0; /* Remove padding */
    font-size: 15px; /* Adjust icon size */
    margin-right: 15px;
}


        #chat-box {
            z-index: 1000;
            display: none;
            border-radius: 15px;
        }

        #unread-count {
            font-size: 0.8em;
            z-index: 1001;
        }

        </style>

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

                    <!-- Main dashboard -->
                    @if(Request::route()->getName() == 'teacher.dashboard')





                    @endif
                    <!-- Chat Button -->
                    <div id="chat-button" class="position-fixed bottom-0 end-0 p-3">
                        <a href="{{ route('chatify') }}" class="btn btn-primary rounded-circle position-relative">
                            <i class="fas fa-comment"></i>
                        </a>
                    </div>



                    </main>
                    </div>
                </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script src="{{asset('js/scripts.js')}}"></script>
        </div>
    </body>
</html>
