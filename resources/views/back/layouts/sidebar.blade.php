<div class="leftside-menu">
    
    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{asset('backend/assets/images/logo.png')}}" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{asset('backend/assets/images/logo_sm.png')}}" alt="" height="16">
        </span>
    </a>

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="{{asset('backend/assets/images/logo-dark.png')}}" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{asset('backend/assets/images/logo_sm_dark.png')}}" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar="">

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Navigation</li>

            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span>Dashboards</span>
                </a>
            </li>
            <li class="side-nav-title side-nav-item">ACCOUNTS</li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarUser" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-user-circle"></i><span> Users </span><span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarUser">
                    <ul class="side-nav-second-level">
                        <li><a href="{{route('users.index')}}">Index</a></li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarSeller" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-user-circle"></i><span> Sellers </span><span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarSeller">
                    <ul class="side-nav-second-level">
                        <li><a href="{{route('sellers.index')}}">Index</a></li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarAdmin" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-user-circle"></i><span> Admins </span><span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarAdmin">
                    <ul class="side-nav-second-level">
                        <li><a href="{{route('admins.index')}}">Index</a></li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title side-nav-item">ROLE VIE</li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarRole" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-user-circle"></i><span> Roles </span><span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarRole">
                    <ul class="side-nav-second-level">
                        <li><a href="{{route('users.index')}}">Index</a></li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPermission" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-user-circle"></i><span> Permissions </span><span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPermission">
                    <ul class="side-nav-second-level">
                        <li><a href="{{route('sellers.index')}}">Index</a></li>
                    </ul>
                </div>
            </li>

        </ul>

        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->