<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">



    @can('sidebar-view-member')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('team-members.index') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Team Members</span>
            </a>
        </li>
    @endcan

    @can('sidebar-view-project')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('projects.index') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Projects</span>
            </a>
        </li>
    @endcan

    <li class="nav-item">
        <a class="nav-link" href="{{ route('tasks.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Tasks</span>
        </a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">


</ul>
