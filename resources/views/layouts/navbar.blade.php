<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">
                <!-- Logo icon --><b>
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    {{--<img style="width:60px; height:60px;" src="{{asset('admin/dist/images/logo/mariba.png')}}" alt="homepage" class="dark-logo" />
                    <!-- Light Logo icon -->
                    <img style="width:60px; height:60px;" src="{{asset('admin/dist/images/logo/mariba.png')}}" alt="homepage" class="light-logo" />
                    --}}
                </b>
                <!--End Logo icon -->
                <span class="hidden-xs"><span class="font-bold">Kazi Masters Ltd</span></span>
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav me-auto">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                {{--
                    <li class="nav-item">
                    <form class="app-search d-none d-md-block d-lg-block">
                        <input type="text" class="form-control" placeholder="Search & enter">
                    </form>
                </li>
                --}}
            </ul>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">
                <!-- ============================================================== -->
                <!-- Comment -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- End Messages -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- mega menu -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- End mega menu -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- User Profile -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown u-pro">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img style="border-radius:50%; width:40px; height:40px;" src="{{asset('user_photo/'.auth()->user()->getLoggedInUserLogo())}}" alt="user" class=""> <span class="hidden-md-down text-white font-weight-1800">{{auth()->user()->name}} &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                    <a href="/logout" class="text-white font-weight-1700"><i class="ti-power-off"></i> Signout</a>
                    <div class="dropdown-menu dropdown-menu-end animated flipInY">
                        <!-- text-->
                        <a href="/profile" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                        <!-- text-->
                        <div class="dropdown-divider"></div>
                        <!-- text-->
                       
                        <!-- text-->
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- End User Profile -->
                <!-- ============================================================== -->
                <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
            </ul>
        </div>
    </nav>
</header>