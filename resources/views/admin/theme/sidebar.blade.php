<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="bg-header-dark">
        <div class="content-header bg-white-10">
            <!-- Logo -->
            <a class="font-w600 text-white tracking-wide" href="{{route('dashboard')}}">
                            <span class="smini-visible">
                                D<span class="opacity-75">x</span>
                            </span>
                <span class="smini-hidden">
                                Farm<span class="opacity-75"> Management</span>
                            </span>
            </a>
            <!-- END Logo -->

            <!-- Options -->
            <div>
                <!-- Toggle Sidebar Style -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                {{--                <a class="js-class-toggle text-white-75" data-target="#sidebar-style-toggler" data-class="fa-toggle-off fa-toggle-on" onclick="Dashmix.layout('sidebar_style_toggle');Dashmix.layout('header_style_toggle');" href="javascript:void(0)">--}}
                <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
                </a>
                <!-- END Toggle Sidebar Style -->
                <!-- Close Sidebar, Visible only on mobile screens-->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <a class="d-lg-none text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                    <i class="fa fa-times-circle"></i>
                </a>
                <!-- END Close Sidebar -->
            </div>
            <!-- END Options -->
        </div>
    </div>
    <!-- END Side Header -->
    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{route('dashboard')}}">
                        <i class="nav-main-link-icon fa fa-location-arrow"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                    </a>
                </li>
                <li class="nav-main-item {{ request()->routeIs('ingredients.create') ? 'open' : (request()->routeIs('ingredients.list') ? 'open' : '') }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-list"></i>
                        <span class="nav-main-link-name">Ingredients</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('ingredients.create') ? 'active' : '' }}" href="{{route('ingredients.create')}}">
                                <span class="nav-main-link-name">Create ingredients</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('ingredients.list') ? 'active' : '' }}" href="{{route('ingredients.list')}}">
                                <span class="nav-main-link-name">Ingredients listings</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-item {{ request()->routeIs('formula.create') ? 'open' : (request()->routeIs('formula.list') ? 'open' : '') }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-calculator"></i>
                        <span class="nav-main-link-name">Formula</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('formula.create') ? 'active' : '' }}" href="{{route('formula.create')}}">
                                <span class="nav-main-link-name">Formula create</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('formula.list') ? 'active' : '' }}" href="{{route('formula.list')}}">
                                <span class="nav-main-link-name">Formula listings</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-item {{ request()->routeIs('batch.create') ? 'open' : (request()->routeIs('batch.list') ? 'open' : '') }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-shopping-bag"></i>
                        <span class="nav-main-link-name">Batch</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('batch.create') ? 'active' : '' }}" href="{{route('batch.create')}}">
                                <span class="nav-main-link-name">Batch create</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('batch.list') ? 'active' : '' }}" href="{{route('batch.list')}}">
                                <span class="nav-main-link-name">Batch listings</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ request()->routeIs('stock.list') ? 'active' : '' }}"  href="{{route('stock.list')}}">
                        <i class="nav-main-link-icon fa fa-calculator"></i>
                        <span class="nav-main-link-name">Stock</span>
                    </a>
                </li>
                <li class="nav-main-item {{ request()->routeIs('users.create') ? 'open' : (request()->routeIs('users.list') ? 'open' : '') }} ">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-user-friends"></i>
                        <span class="nav-main-link-name">Users</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('users.create') ? 'active' : '' }}" href="{{route('users.create')}}">
                                <span class="nav-main-link-name">Create user</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs('users.list') ? 'active' : '' }} " href="{{route('users.list')}}">
                                <span class="nav-main-link-name">Users List</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{url('/')}}">
                        <i class="nav-main-link-icon fa fa-file"></i>
                        <span class="nav-main-link-name">Reports</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>
