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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

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

                        <!--Sidebar Content-->
                        <div class="container-fluid px-4">
                            @yield('content')
                        </div>
                    {{-- @include ('layouts.partials.footer') --}}


                    <!-- Main dashboard -->
                    @if(Request::route()->getName() == 'admin.dashboard')

                    <div class="d-flex flex-wrap mt-4 justify-content-center">
                        <div class="card text-dark bg-light shadow-sm p-3 m-2" style="width: 200px;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title">Total Teachers</h5>
                                    <p class="card-text fw-bold">{{ $totalTeachers }}</p>
                                </div>
                                <i class="fas fa-chalkboard-teacher fa-2x"></i>
                            </div>
                        </div>

                        <div class="card text-dark bg-light shadow-sm p-3 m-2" style="width: 200px;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title">Total Departments</h5>
                                    <p class="card-text fw-bold">{{ $totalDepartments }}</p>
                                </div>
                                <i class="fas fa-building fa-2x"></i>
                            </div>
                        </div>

                        <div class="card text-dark bg-light shadow-sm p-3 m-2" style="width: 200px;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title">Total Groups</h5>
                                    <p class="card-text fw-bold">{{ $totalGroups }}</p>
                                </div>
                                <i class="bi bi-people-fill fa-2x"></i>
                            </div>
                        </div>

                        <div class="card text-dark bg-light shadow-sm p-3 m-2" style="width: 200px;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title">Pending Leaves</h5>
                                    <p class="card-text fw-bold">{{ $pendingLeaves }}</p>
                                </div>
                                <i class="fas fa-clock fa-2x"></i>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap mt-4 justify-content-center">
                        <!-- Leave Analytics Table -->
                        <div class="col-lg-5">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 bg-dark text-white">
                                    <h6 class="m-0 font-weight-bold">Leaves Overview</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Status</th>
                                                    <th>Count</th>
                                                    <th>Percentage</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="table-warning">
                                                    <td>Pending</td>
                                                    <td>{{ $pendingLeaves }}</td>
                                                    <td>{{ number_format(($pendingLeaves / $totalLeaves) * 100, 2) }}%</td>
                                                </tr>
                                                <tr class="table-success">
                                                    <td>Accepted</td>
                                                    <td>{{ $acceptedLeaves }}</td>
                                                    <td>{{ number_format(($acceptedLeaves / $totalLeaves) * 100, 2) }}%</td>
                                                </tr>
                                                <tr class="table-danger">
                                                    <td>Rejected</td>
                                                    <td>{{ $rejectedLeaves }}</td>
                                                    <td>{{ number_format(($rejectedLeaves / $totalLeaves) * 100, 2) }}%</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Monthly Leaves Overview -->
                        <div class="col-lg-5 ml-20">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 bg-dark text-white">
                                    <h6 class="m-0 font-weight-bold">Leaves by Month</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Month</th>
                                                    <th>Pending</th>
                                                    <th>Accepted</th>
                                                    <th>Rejected</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($leavesByMonth as $month)
                                                    <tr>
                                                        <td>{{ $month->month }}</td>
                                                        <td>{{ $month->pending }}</td>
                                                        <td>{{ $month->accepted }}</td>
                                                        <td>{{ $month->rejected }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



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
