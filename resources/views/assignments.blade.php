<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Device Assignments | Inventory System</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    <!-- Loader -->
    <div id="global-loader">
        <div class="whirly-loader"></div>
    </div>

    <div class="main-wrapper">
        <!-- Header -->
        <div class="header">
            <div class="header-left active">
                <a href="index.html" class="logo">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="">
                </a>
                <a href="index.html" class="logo-small">
                    <img src="{{ asset('assets/img/logo-small.png') }}" alt="">
                </a>
                <a id="toggle_btn" href="javascript:void(0);"></a>
            </div>

            <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <ul class="nav user-menu">
                <!-- Search -->
                <li class="nav-item">
                    <div class="top-nav-search">
                        <a href="javascript:void(0);" class="responsive-search">
                            <i class="fa fa-search"></i>
                        </a>
                        <form action="#">
                            <div class="searchinputs">
                                <input type="text" placeholder="Search Here ...">
                                <div class="search-addon">
                                    <span><img src="{{ asset('assets/img/icons/closes.svg') }}" alt="img"></span>
                                </div>
                            </div>
                            <a class="btn" id="searchdiv"><img src="{{ asset('assets/img/icons/search.svg') }}" alt="img"></a>
                        </form>
                    </div>
                </li>

                <!-- Notifications -->
                <li class="nav-item dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <img src="{{ asset('assets/img/icons/notification-bing.svg') }}" alt="img"> <span class="badge rounded-pill">4</span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifications</span>
                            <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt="" src="{{ asset('assets/img/profiles/avatar-02.jpg') }}">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
                                                <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- More notification items -->
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="activities.html">View all Notifications</a>
                        </div>
                    </div>
                </li>

                <!-- User Menu -->
                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                        <span class="user-img"><img src="{{ asset('assets/img/profiles/avator1.jpg') }}" alt="">
                            <span class="status online"></span></span>
                    </a>
                    <div class="dropdown-menu menu-drop-user">
                        <div class="profilename">
                            <div class="profileset">
                                <span class="user-img"><img src="{{ asset('assets/img/profiles/avator1.jpg') }}" alt="">
                                    <span class="status online"></span></span>
                                <div class="profilesets">
                                    <h6>John Doe</h6>
                                    <h5>Admin</h5>
                                </div>
                            </div>
                            <hr class="m-0">
                            <a class="dropdown-item" href="profile.html"> <i class="me-2" data-feather="user"></i> My Profile</a>
                            <a class="dropdown-item" href="generalsettings.html"><i class="me-2" data-feather="settings"></i>Settings</a>
                            <hr class="m-0">
                            <a class="dropdown-item logout pb-0" href="signin.html"><img src="{{ asset('assets/img/icons/log-out.svg') }}" class="me-2" alt="img">Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- /Header -->

        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li>
                            <a href="index.html"><img src="{{ asset('assets/img/icons/dashboard.svg') }}" alt="img"><span> Dashboard</span></a>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/product.svg') }}" alt="img"><span> Devices</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('devices.index') }}">Device List</a></li>
                                <li><a href="{{ route('devices.create') }}">Add Device</a></li>
                            </ul>
                        </li>
                        <li class="submenu active">
                            <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/assign.svg') }}" alt="img"><span> Assignments</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('assignments.index') }}" class="active">All Assignments</a></li>
                                <li><a href="{{ route('assignments.create') }}">New Assignment</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/users1.svg') }}" alt="img"><span> Staff</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="stafflist.html">Staff List</a></li>
                                <li><a href="addstaff.html">Add Staff</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/lab.svg') }}" alt="img"><span> Labs</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="labs.html">Lab List</a></li>
                                <li><a href="add-lab.html">Add Lab</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="reports.html"><img src="{{ asset('assets/img/icons/report.svg') }}" alt="img"><span> Reports</span></a>
                        </li>
                        <li>
                            <a href="settings.html"><img src="{{ asset('assets/img/icons/settings.svg') }}" alt="img"><span> Settings</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Sidebar -->

        <!-- Page Content -->
        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Device Assignments</h4>
                        <h6>Manage device assignments</h6>
                    </div>
                    <div class="page-btn">
                        <a href="{{ route('assignments.create') }}" class="btn btn-added">
                            <img src="{{ asset('assets/img/icons/plus.svg') }}" alt="img" class="me-1">
                            New Assignment
                        </a>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datanew">
                                <thead>
                                    <tr>
                                        <th>Device</th>
                                        <th>Serial No.</th>
                                        <th>Assigned To</th>
                                        <th>Assignment Date</th>
                                        <th>Return Date</th>
                                        <th>Status</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($assignments as $assignments)
                                    <tr>
                                        <td class="productimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                @if($assignments->device->device_image)
                                                    <img src="{{ asset('storage/'.$assignments->device->device_image) }}" alt="product" width="40">
                                                @else
                                                    <img src="{{ asset('assets/img/product/noimage.jpg') }}" alt="product" width="40">
                                                @endif
                                            </a>
                                            <a href="{{ route('devices.show', $assignments->device_id) }}">{{ $assignments->device->device_name }}</a>
                                        </td>
                                        <td>{{ $assignments->device->serial_number }}</td>
                                        <td>
                                            @if($assignments->assignee_type == 'staff')
                                                <div class="userimg">
                                                    <span class="userimg-circle">{{ substr($assignments->staff->name, 0, 1) }}</span>
                                                    <div class="user-email">
                                                        <span class="user-name">{{ $assignments->staff->name }}</span>
                                                        <span class="user-email">{{ $assignments->staff->email }}</span>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="userimg">
                                                    <span class="userimg-circle">L</span>
                                                    <div class="user-email">
                                                        <span class="user-name">{{ $assignments->lab->name ?? 'N/A' }}</span>
                                                        <span class="user-email">Lab</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                        <td>{{ $assignments->assigned_date->format('M d, Y') }}</td>
                                        <td>{{ $assignments->expected_return_date ? $assignments->expected_return_date->format('M d, Y') : 'N/A' }}</td>
                                        <td>
                                            <span class="badges bg-{{
                                                $assignments->status == 'active' ? 'lightgreen' :
                                                ($assignments->status == 'overdue' ? 'lightred' : 'lightgray')
                                            }}">
                                                {{ ucfirst($assignments->status) }}
                                            </span>
                                        </td>
                                        <td class="text-end">
                                            <a class="action-set" href="{{ route('assignments.edit', $assignments->id) }}">
                                                <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="Edit">
                                            </a>
                                            <a class="action-set" href="{{ route('assignments.show', $assignments->id) }}">
                                                <img src="{{ asset('assets/img/icons/eye.svg') }}" alt="View">
                                            </a>
                                            <form action="{{ route('assignments.destroy', $assignments->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="action-set confirm-delete" onclick="return confirm('Are you sure?')">
                                                    <img src="{{ asset('assets/img/icons/delete.svg') }}" alt="Delete">
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No assignments found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </div>

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Feather Icon JS -->
    <script src="{{ asset('assets/js/feather.min.js') }}"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>

    <!-- Datatable JS -->
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Select2 JS -->
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

    <!-- Sweet Alert JS -->
    <script src="{{ asset('assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('.datanew').DataTable({
                "pageLength": 10,
                "responsive": true
            });

            // Delete confirmation
            $('.confirm-delete').click(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).closest('form').submit();
                    }
                })
            });
        });
    </script>
</body>
</html>
