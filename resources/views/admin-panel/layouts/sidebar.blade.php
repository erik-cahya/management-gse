<div class="leftside-menu">

    <!-- Logo Light -->
    <a href="index.html" class="logo logo-light">
        <span class="logo-lg">
            {{-- <img src="{{ asset('admin') }}/assets/images/logo.png" alt="logo"> --}}
            <h4 class="mt-3 text-white">GseManagement</h4>
        </span>
        <span class="logo-sm">
            <img src="{{ asset('admin') }}/assets/images/logo-sm.png" alt="small logo">
            {{-- <h4 class="mt-3 text-white">GseManagement</h4> --}}
        </span>
    </a>

    <!-- Logo Dark -->
    <a href="index.html" class="logo logo-dark">
        <span class="logo-lg">
            {{-- <img src="{{ asset('admin') }}/assets/images/logo-dark.png" alt="dark logo"> --}}
            <h4 class="text-dark mt-3">GseManagement</h4>
        </span>
        <span class="logo-sm">
            <img src="{{ asset('admin') }}/assets/images/logo-sm.png" alt="small logo">
        </span>
    </a>

    <!-- Sidebar -->
    <div data-simplebar>
        <ul class="side-nav">
            <li class="side-nav-title">Main</li>

            <li class="side-nav-item {{ request()->routeIs('dashboard') ? 'menuitem-active' : '' }}">
                <a href="{{ route('dashboard') }}" class="side-nav-link">
                    <i class="ri-dashboard-2-line"></i>
                    <span> Dashboard </span>
                    <span class="badge bg-success float-end">9+</span>
                </a>
            </li>

            <li class="side-nav-title">Master Data</li>

            <li class="side-nav-item {{ request()->routeIs('gse.*') ? 'menuitem-active' : '' }}">
                <a data-bs-toggle="collapse" href="#gseMenu" aria-expanded="false" aria-controls="gseMenu" class="side-nav-link">
                    <i class="ri-compass-3-line"></i>
                    <span> GSE </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="{{ request()->routeIs('gse.*') ? 'show' : '' }} collapse" id="gseMenu">
                    <ul class="side-nav-second-level">
                        <li class="side-nav-item {{ request()->routeIs('gse.index') ? 'menuitem-active' : '' }}">
                            <a class="side-nav-link {{ request()->routeIs('gse.index') ? 'active' : '' }}" href="{{ route('gse.index') }}">List GSE</a>
                        </li>
                        <li class="side-nav-item {{ request()->routeIs('gse.create') ? 'menuitem-active' : '' }}">
                            <a class="side-nav-link {{ request()->routeIs('gse.create') ? 'active' : '' }}" href="{{ route('gse.create') }}">Create Data GSE</a>
                        </li>

                    </ul>
                </div>
            </li>

        </ul>
    </div>
</div>
