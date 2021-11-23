<ul class="navbar-nav  sidebar accordion text-white" id="accordionSidebar" style="background-color: #181616;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard.user.index') }}">
        <div class="sidebar-brand-icon" style="color: #c0392b">
            <i class="fas fa-th-large"></i>
        </div>
        <div class="sidebar-brand-text mx-3 text-white">Dashboard {{ auth()->user()->is_admin ? 'Admin' : 'User' }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @can('admin')
    <li class="nav-item {{ request()->routeIs('dashboard.admin.index') ? 'active' : '' }}">
        <a class="nav-link text-white" href="{{ route('dashboard.admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt" style="color: #c0392b"></i>
            <span>Dashboard</span>
        </a>
    </li>
    @else
    <li class="nav-item {{ request()->routeIs('dashboard.user.index') ? 'active' : '' }}">
        <a class="nav-link text-white" href="{{ route('dashboard.user.index') }}">
            <i class="fas fa-fw fa-tachometer-alt" style="color: #c0392b"></i>
            <span>Dashboard</span>
        </a>
    </li>
    @endcan
    <li class="nav-item">
        <a class="nav-link text-white" href="{{ route('films.index') }}">
            <i class="fas fa-fw fa-long-arrow-alt-left" style="color: #c0392b"></i>
            <span>Back Films</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        My Dashboard
    </div>

    @can('admin')
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ request()->routeIs('dashboard.admin.profile') ? 'active' : '' }}">
        <a class="nav-link collapsed text-white" href="{{ route('dashboard.admin.profile') }}" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user" style="color: #c0392b"></i>
            <span>Profile</span>
        </a>
    </li>
    @else
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ request()->routeIs('dashboard.user.profile') ? 'active' : '' }}">
        <a class="nav-link collapsed text-white" href="{{ route('dashboard.user.profile') }}" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user" style="color: #c0392b"></i>
            <span>Profile</span>
        </a>
    </li>
    @endcan

    @can('admin')
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ request()->routeIs('dashboard.admin.film*') ? 'active' : '' }}">
        <a class="nav-link collapsed text-white" href="{{ route('dashboard.admin.film.index') }}" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wallet" style="color: #c0392b"></i>
            <span>Crud Film</span>
        </a>
    </li>
    @else
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ request()->routeIs('dashboard.user.wallet') ? 'active' : '' }}">
        <a class="nav-link collapsed text-white" href="{{ route('dashboard.user.wallet') }}" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wallet" style="color: #c0392b"></i>
            <span>E-Wallet</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ request()->routeIs('dashboard.user.booking') ? 'active' : '' }}">
        <a class="nav-link collapsed text-white" href="{{ route('dashboard.user.booking') }}" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-shopping-cart" style="color: #c0392b"></i>
            <span>My-Booking</span>
        </a>
    </li>
    @endcan

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" style="background-color: #c0392b" id="sidebarToggle"></button>
    </div>

</ul>
