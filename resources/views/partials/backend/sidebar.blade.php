<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15"></div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>

    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        <li>
            <a class="nav-link " style="color:white" href="{{ route('admin.products.index') }}">Products</a>

        </li>
        <li>
            <a class="nav-link " style="color:white" href="{{ route('admin.tags.index') }}">tags</a>

        </li>
        <li>
            <a class="nav-link " style="color:white" href="{{ route('admin.coupons.index') }}">coupons</a>

        </li>
        <li>
            <a class="nav-link " style="color:white" href="{{ route('admin.orders.index') }}">orders</a>

        </li>
        <li>
            <a class="nav-link " style="color:white" href="{{ route('admin.categories.index') }}">categories</a>

        </li>
        <li>
            <a class="nav-link " style="color:white" href="{{ route('admin.countries.index') }}">countries</a>

        </li>
        <li>
            <a class="nav-link " style="color:white" href="{{ route('admin.states.index') }}">states</a>

        </li>
        <li>
            <a class="nav-link " style="color:white" href="{{ route('admin.cities.index') }}">cities</a>

        </li>
        <li>
            <a class="nav-link " style="color:white" href="{{ route('admin.shipping_companies.index') }}">shipping_companies</a>

        </li>
        <li>
            <a class="nav-link " style="color:white" href="{{ route('admin.payment_methods.index') }}">payment_methods</a>

        </li>

    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    @forelse($admin_side_menu as $link)
    @can($link->permission_title)
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse{{ $link->as }}"
            aria-expanded="true" aria-controls="collapse{{ $link->as }}">
            <i class="{{ $link->icon }}"></i>
            <span>{{ $link->title }}</span>
        </a>
        <div id="collapse{{ $link->as }}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                @if(in_array($link->to, $routes_name))
                <a class="collapse-item" href="{{ route($link->to) }}">
                    {{ $link->title }}
                </a>
                @endif
            </div>
        </div>
    </li>
    @endcan
    @empty
    @endforelse
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading"></div>
    <!-- Sidebar Toggler (Sidebar) -->
    <!-- <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div> -->
</ul>