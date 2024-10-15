<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
        <meta name="description" content="Do Micro Work - Admin" />
        <meta name="keywords" content="admin, admin panel" />
        <meta name="author" content="Do Micro Work - Admin" />
        <meta name="robots" content="noindex, nofollow" />
        <title>Do Micro Work Admin @yield('title') </title>

        <link rel="icon" type="image/x-icon" href="{{ asset('admin_assets/img/favicon.ico') }}" />

        <link rel="stylesheet" href="{{ asset('admin_assets/css/bootstrap.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('admin_assets/plugins/select2/css/select2.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('admin_assets/css/animate.css') }}" />

        <link rel="stylesheet" href="{{ asset('admin_assets/css/dataTables.bootstrap4.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('admin_assets/plugins/fontawesome/css/fontawesome.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('admin_assets/plugins/fontawesome/css/all.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('admin_assets/css/style.css') }}" />
        <style>
            @media screen and (max-width: 600px) {
                .admin_panel_logo {
                    max-width: 8%;
                }
            }
            @media screen and (min-width: 601px) and (max-width: 991px) {
                .admin_panel_logo {
                    max-width: 5%;
                }
            }
            @media screen and (min-width: 991px) {
                .admin_panel_logo {
                    min-width: 40%;
                }
            }
        </style>
    </head>
    <body>

    @php

        $admin = App\Models\Admin_user::admin();

        if (!empty($admin)) {

            session()->put('is_client', $admin->is_admin);

            session()->put('status', $admin->status);

            session()->put('balance', $admin->balance);

        }

    @endphp

        <div id="global-loader">
            <div class="whirly-loader"></div>
        </div>

        <div class="main-wrapper">
            <div class="header">
                <div class="header-left active">
                    <a href="{{ route('admin_panel.dashboard') }}" class="logo mt-2">
                        <img class="admin_panel_logo" src="{{ asset('admin_assets/img/logo.jpg') }}" alt="" />
                    </a>
                    <a href="{{ route('admin_panel.dashboard') }}" class="logo-small mt-2">
                        <img class="admin_panel_logo" src="{{ asset('admin_assets/img/logo-small.jpg') }}" alt="" />
                    </a>
                    <a id="toggle_btn" href="javascript:void(0);"> </a>
                </div>

                <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>

                <ul class="nav user-menu">
                    <li class="nav-item">
                        <div class="top-nav-search">
                            <a href="javascript:void(0);" class="responsive-search">
                                <i class="fa fa-search"></i>
                            </a>
                            <form action="#">
                                <div class="searchinputs">
                                    <input type="text" placeholder="Search Here ..." />
                                    <div class="search-addon">
                                        <span><img src="{{ asset('admin_assets/img/icons/closes.svg') }}" alt="img" /></span>
                                    </div>
                                </div>
                                <a class="btn" id="searchdiv"><img src="{{ asset('admin_assets/img/icons/search.svg') }}" alt="img" /></a>
                            </form>
                        </div>
                    </li>

                    <li class="nav-item dropdown has-arrow flag-nav">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
                            <img src="{{ asset('admin_assets/img/flags/us1.png') }}" alt="" height="20" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="javascript:void(0);" class="dropdown-item"> <img src="{{ asset('admin_assets/img/flags/us.png') }}" alt="" height="16" /> English </a>
                            <a href="javascript:void(0);" class="dropdown-item"> <img src="{{ asset('admin_assets/img/flags/fr.png') }}" alt="" height="16" /> French </a>
                            <a href="javascript:void(0);" class="dropdown-item"> <img src="{{ asset('admin_assets/img/flags/es.png') }}" alt="" height="16" /> Spanish </a>
                            <a href="javascript:void(0);" class="dropdown-item"> <img src="{{ asset('admin_assets/img/flags/de.png') }}" alt="" height="16" /> German </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown"> <img src="{{ asset('admin_assets/img/icons/notification-bing.svg') }}" alt="img" /> <span class="badge rounded-pill">4</span> </a>
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
                                                    <img alt="" src="{{ asset('admin_assets/img/profiles/avatar-02.jpg') }}" />
                                                </span>
                                                <div class="media-body flex-grow-1">
                                                    <p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
                                                    <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="activities.html">
                                            <div class="media d-flex">
                                                <span class="avatar flex-shrink-0">
                                                    <img alt="" src="{{ asset('admin_assets/img/profiles/avatar-03.jpg') }}" />
                                                </span>
                                                <div class="media-body flex-grow-1">
                                                    <p class="noti-details"><span class="noti-title">Tarah Shropshire</span> changed the task name <span class="noti-title">Appointment booking with payment gateway</span></p>
                                                    <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="activities.html">
                                            <div class="media d-flex">
                                                <span class="avatar flex-shrink-0">
                                                    <img alt="" src="{{ asset('admin_assets/img/profiles/avatar-06.jpg') }}" />
                                                </span>
                                                <div class="media-body flex-grow-1">
                                                    <p class="noti-details">
                                                        <span class="noti-title">Misty Tison</span> added <span class="noti-title">Domenic Houston</span> and <span class="noti-title">Claire Mapes</span> to project
                                                        <span class="noti-title">Doctor available module</span>
                                                    </p>
                                                    <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="activities.html">
                                            <div class="media d-flex">
                                                <span class="avatar flex-shrink-0">
                                                    <img alt="" src="{{ asset('admin_assets/img/profiles/avatar-17.jpg') }}" />
                                                </span>
                                                <div class="media-body flex-grow-1">
                                                    <p class="noti-details"><span class="noti-title">Rolland Webber</span> completed task <span class="noti-title">Patient and Doctor video conferencing</span></p>
                                                    <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="activities.html">
                                            <div class="media d-flex">
                                                <span class="avatar flex-shrink-0">
                                                    <img alt="" src="{{ asset('admin_assets/img/profiles/avatar-13.jpg') }}" />
                                                </span>
                                                <div class="media-body flex-grow-1">
                                                    <p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> added new task <span class="noti-title">Private chat module</span></p>
                                                    <p class="noti-time"><span class="notification-time">2 days ago</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="topnav-dropdown-footer">
                                <a href="activities.html">View all Notifications</a>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown has-arrow main-drop">
                        <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                            <span class="user-img"><img src="{{ asset('admin_assets/img/profiles/avator1.jpg') }}" alt="" /> <span class="status online"></span></span>
                        </a>
                        <div class="dropdown-menu menu-drop-user">
                            <div class="profilename">
                                <div class="profileset">
                                    <span class="user-img"><img src="{{ asset('admin_assets/img/profiles/avator1.jpg') }}" alt="" /> <span class="status online"></span></span>
                                    <div class="profilesets">
                                        <h6>{{ session()->get('name') }}</h6>
                                        <h5>{{ session()->get('role_name') }}</h5>
                                    </div>
                                </div>
                                <hr class="m-0" />
                                <a class="dropdown-item" href="profile.html"> <i class="me-2" data-feather="user"></i> My Profile</a>
                                <a class="dropdown-item" href="generalsettings.html"><i class="me-2" data-feather="settings"></i>Settings</a>
                                <hr class="m-0" />
                                <a class="dropdown-item logout pb-0" href="{{ route('logout') }}"><img src="{{ asset('admin_assets/img/icons/log-out.svg') }}" class="me-2" alt="img" />Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>

                <div class="dropdown mobile-user-menu">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="profile.html">My Profile</a>
                        <a class="dropdown-item" href="generalsettings.html">Settings</a>
                        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                    </div>
                </div>
            </div>

            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <ul>
                            <li>
                                <a href="{{ route('admin_panel.dashboard') }}"><img src="{{ asset('admin_assets/img/icons/dashboard.svg') }}" alt="img" /><span> Dashboard</span> </a>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><img src="{{ asset('admin_assets/img/icons/category.svg') }}" alt="img" /><span> Category</span> <span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="{{ route('admin_panel.add_category') }}">Add Category</a></li>
                                    <li><a href="{{ route('admin_panel.categories') }}">View Categories</a></li>
                                    <li><a href="{{ route('admin_panel.add_sub_category') }}">Add Sub Category</a></li>
                                    <li><a href="{{ route('admin_panel.sub_categories') }}">View Sub Categories</a></li>
                                    {{-- <li><a href="salesreport.html">Sales Report</a></li>
                                    <li><a href="invoicereport.html">Invoice Report</a></li>
                                    <li><a href="purchasereport.html">Purchase Report</a></li>
                                    <li><a href="supplierreport.html">Supplier Report</a></li>
                                    <li><a href="customerreport.html">Customer Report</a></li> --}}
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><img src="{{ asset('admin_assets/img/icons/time.svg') }}" alt="img" /><span> Tasks</span> <span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="{{ route('admin_panel.add_social_task') }}">Add Social Task</a></li>
                                    <li><a href="{{ route('admin_panel.social_tasks') }}">View Social Tasks</a></li>
                                    <li><a href="{{ route('admin_panel.add_click_task') }}">Add Click Task</a></li>
                                    <li><a href="{{ route('admin_panel.click_tasks') }}">View Click Tasks</a></li>
                                    <li><a href="{{ route('admin_panel.task_requests') }}">Task Approval</a></li>
                                    <li><a href="{{ route('admin_panel.confirm_tasks') }}">Confirm Tasks</a></li>
                                    {{-- <li><a href="salesreport.html">Sales Report</a></li>
                                    <li><a href="invoicereport.html">Invoice Report</a></li>
                                    <li><a href="purchasereport.html">Purchase Report</a></li>
                                    <li><a href="supplierreport.html">Supplier Report</a></li>
                                    <li><a href="customerreport.html">Customer Report</a></li> --}}
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><img src="{{ asset('admin_assets/img/icons/product.svg') }}" alt="img" /><span> Package</span> <span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="{{ route('admin_panel.packages') }}">Package List</a></li>
                                    <li><a href="{{ route('admin_panel.add_package') }}">Add Package</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><img src="{{ asset('admin_assets/img/icons/list.svg') }}" alt="img" /><span> Notice</span> <span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="{{ route('admin_panel.packages') }}">View Notices</a></li>
                                    <li><a href="{{ route('admin_panel.create_notice') }}">Create Notice</a></li>
                                </ul>
                            </li>
                            {{-- <li>
                                <a href="components.html"><i data-feather="layers"></i><span> Components</span> </a>
                            </li> --}}
                            @if (session()->get('is_admin') == 1 && session()->get('role_id') < 3)
                                <li>
                                    <a href="{{ route('admin_panel.total_passbooks') }}"><img src="{{ asset('admin_assets/img/icons/task-list.svg') }}" alt="img" /><span> Total Passbooks</span> </a>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><img src="{{ asset('admin_assets/img/icons/users1.svg') }}" alt="img" /><span> Member Panel</span> <span class="menu-arrow"></span></a>
                                    <ul>
                                        {{-- <li><a href="{{ route('admin_panel.admin_users') }}">Member Users </a></li> --}}
                                        {{-- <li><a href="{{ route('admin_panel.member_package_requests') }}">Worker Request</a></li> --}}
                                        <li><a href="{{ route('admin_panel.deposit_requests') }}">Deposit Requests</a></li>
                                        <li><a href="{{ route('admin_panel.withdraw_approvals') }}">Withdraw Requests</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><img src="{{ asset('admin_assets/img/icons/users.svg') }}" alt="img" /><span> Admin Panel</span> <span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="{{ route('admin_panel.admin_users') }}">Admin Users </a></li>
                                        <li><a href="{{ route('admin_panel.admin_user_requests') }}">Admin Request</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><img src="{{ asset('admin_assets/img/icons/settings.svg') }}" alt="img" /><span> Settings</span> <span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="generalsettings.html">General Settings</a></li>
                                        <li><a href="emailsettings.html">Email Settings</a></li>
                                        <li><a href="paymentsettings.html">Payment Settings</a></li>
                                        <li><a href="currencysettings.html">Currency Settings</a></li>
                                        <li><a href="grouppermissions.html">Group Permissions</a></li>
                                        <li><a href="taxrates.html">Tax Rates</a></li>
                                    </ul>
                                </li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>

            @yield('content')

        </div>

        <script src="{{ asset('admin_assets/js/jquery-3.6.0.min.js') }}"></script>

        <script src="{{ asset('admin_assets/js/feather.min.js') }}"></script>

        <script src="{{ asset('admin_assets/js/jquery.slimscroll.min.js') }}"></script>

        <script src="{{ asset('admin_assets/js/bootstrap.bundle.min.js') }}"></script>

        <script src="{{ asset('admin_assets/js/jquery.dataTables.min.js') }}"></script>

        <script src="{{ asset('admin_assets/js/dataTables.bootstrap4.min.js') }}"></script>

        <script src="{{ asset('admin_assets/plugins/select2/js/select2.min.js') }}"></script>

        <script src="{{ asset('admin_assets/plugins/select2/js/custom-select.js') }}"></script>

        <script src="{{ asset('admin_assets/js/script.js') }}"></script>
    </body>
</html>


