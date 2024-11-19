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
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

<script>
    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    editable: true,
    events: [], // Load tasks here
    dateClick: function(info) {
        // Optionally, handle date click
    },
    eventReceive: function(info) {
        // Handle event receive
    },
    });
    calendar.render();
    });
    $(function() {
    $(".task").draggable({
    revert: "invalid",
    helper: "clone"
    });

    $("#calendar").droppable({
    accept: ".task",
    drop: function(event, ui) {
        var taskDate = $(ui.draggable).data("date");
        var eventData = {
            title: ui.draggable.text(),
            start: taskDate
        };
        calendar.addEvent(eventData);
    }
    });
    });

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
        .fc-day:hover {
    background-color: #f0f8ff; /* Light background on hover */
    cursor: pointer;
        }
        #grade-chart {
        max-width: 800px; /* Adjust width as needed */
        max-height: 500px; /* Adjust height as needed */
    }
        </style>
        <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

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

                    <div class="d-flex flex-wrap mt-10 justify-content-center">
                        <div class="card text-dark bg-light shadow-sm p-3 m-2" style="width: 200px;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title">Total Courses</h5>
                                    <p class="card-text fw-bold">{{ $totalCourses }}</p>
                                </div>
                                <i class="fas fa-book fa-2x"></i>
                            </div>
                        </div>

                        <div class="card text-dark bg-light shadow-sm p-3 m-2" style="width: 200px;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title">Total Students</h5>
                                    <p class="card-text fw-bold">{{ $totalStudents }}</p>
                                </div>
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                        </div>

                        <div class="card text-dark bg-light shadow-sm p-3 m-2" style="width: 200px;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title">Average Grades</h5>
                                    <p class="card-text fw-bold">{{ $averageGrades ?? 0 }}</p>

                                </div>
                                <i class="fas fa-clipboard-list fa-2x"></i>
                            </div>
                        </div>
                    </div>

            <div>
                <div class="d-flex justify-content-between mt-20">
                    <!-- Calendar -->
                    <div id='calendar' class="col-lg-5"></div>

                    <!-- Chart -->
                    <div class="d-flex flex-column align-items-center col-lg-7">
                        <div class="mb-3">
                            <select id="student-dropdown" class="form-select">
                                <option value="" disabled selected>Select a Student ID</option>
                                @foreach($grades as $grade)
                                    <option value="{{ $grade->student_id }}">{{ $grade->student_id }}</option>
                                @endforeach
                            </select>
                        </div>

                        <canvas id="grade-chart"></canvas>
                    </div>
                </div>






                <script>
                    const ctx = document.getElementById('grade-chart').getContext('2d');
                    const chart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['DS', 'TP', 'EXAM'],
                            datasets: [{
                                label: 'Average Grades',
                                data: [0, 0, 0], // Placeholder data
                                backgroundColor: ['red', 'blue', 'green'],
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    max: 20
                                }
                            }
                        }
                    });
                </script>
<script>
    document.getElementById('student-dropdown').addEventListener('change', function() {
        let studentId = this.value;

        const selectedGrades = @json($grades); // Pass PHP variable to JavaScript
        const studentGrades = selectedGrades.find(g => g.student_id == studentId);

        if (studentGrades) {
            chart.data.datasets[0].data = [studentGrades.avg_ds, studentGrades.avg_tp, studentGrades.avg_exam];
            chart.update();
        }
    });
</script>


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

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script src="{{asset('js/scripts.js')}}"></script>
        </div>
    </body>
</html>
