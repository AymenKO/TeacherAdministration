<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    @if (auth()->check() && auth()->user()->is_admin)
                        <div class="sb-sidenav-menu-heading">Users</div>
                        <a class="nav-link" href="{{ route('admin.users.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Users
                        </a>
                        <div class="sb-sidenav-menu-heading">Departments</div>
                        <a class="nav-link" href="{{ route('admin.departments.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                        Departments
                        </a>
                        <div class="sb-sidenav-menu-heading">Groups</div>
                        <a class="nav-link" href="{{ route('admin.groups.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Groups
                        </a>
                        <div class="sb-sidenav-menu-heading">Leaves</div>
                        <a class="nav-link" href="{{ route ('admin.leaves.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                            Leaves
                        </a>
                        <a class="nav-link" href="{{ route ('admin.leaves.history') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                            Leaves History
                        </a>
                    @endif
                    @if (auth()->check() && !auth()->user()->is_admin)
                        <div class="sb-sidenav-menu-heading">Courses</div>
                        <a class="nav-link" href="{{ route ('teacher.courses.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Courses
                        </a>
                        <div class="sb-sidenav-menu-heading">Grades</div>
                        <a class="nav-link" href="{{ route ('teacher.grades.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Grades
                        </a>


                        <div class="sb-sidenav-menu-heading">Leaves</div>
                        <a class="nav-link" href="{{ route ('teacher.leaves.create') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                            Apply for a Leave
                        </a>
                        <a class="nav-link" href="{{ route ('teacher.leaves.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                            Leaves Requests
                        </a>



                        {{-- <div class="sb-sidenav-menu-heading">Leaves</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLeaves" aria-expanded="false" aria-controls="collapseLeaves">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Leaves
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLeaves" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('teacher.leaves.create') }}">Apply for a Leave</a>
                                <a class="nav-link" href="{{ route('teacher.leaves.index') }}">View Leaves</a>
                            </nav>
                        </div> --}}

                    @endif

                    {{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                        data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Pages
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                aria-controls="pagesCollapseAuth">
                                Authentication
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="login.html">Login</a>
                                    <a class="nav-link" href="register.html">Register</a>
                                    <a class="nav-link" href="password.html">Forgot Password</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#pagesCollapseError" aria-expanded="false"
                                aria-controls="pagesCollapseError">
                                Error
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="401.html">401 Page</a>
                                    <a class="nav-link" href="404.html">404 Page</a>
                                    <a class="nav-link" href="500.html">500 Page</a>
                                </nav>
                            </div>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">Addons</div>
                    <a class="nav-link" href="charts.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Charts
                    </a>
                    <a class="nav-link" href="tables.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Tables
                    </a> --}}
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:
                </br>
                <strong>{{ auth()->user()->name }}</strong>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
             <div class="container-fluid px-4">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"></li>
                </ol>
            </div>
        </main>
        {{-- <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Teacher Administration</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer> --}}
    </div>
</div>
