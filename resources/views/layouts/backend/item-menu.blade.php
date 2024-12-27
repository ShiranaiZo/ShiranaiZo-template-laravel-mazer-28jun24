<li class="sidebar-item {{ routeIsActive('dashboard') }}">
    {{-- <a href="{{ route('dashboard') }}" class='sidebar-link'> --}}
    <a href="{{ route('dashboard') }}" class='sidebar-link'>
        <i class="bi bi-grid-fill"></i>
        <span>Dashboard</span>
    </a>
</li>

<li class="sidebar-item {{ routeIsActive('users.*') }}">
    <a href="{{ route('users.table') }}" class='sidebar-link'>
        <i class="bi bi-person-fill"></i>
        <span>Users</span>
    </a>
</li>

<li class="sidebar-item {{ routeIsActive('age.*') }}">
    <a href="{{ route('age.index') }}" class='sidebar-link'>
        <i class="bi bi-hourglass"></i>
        <span>Age Category</span>
    </a>
</li>

<li class="sidebar-item {{ routeIsActive('unit.*') }}">
    <a href="{{ route('unit.index') }}" class='sidebar-link'>
        <i class="bi bi-box"></i>
        <span>Unit Category</span>
    </a>
</li>

<li class="sidebar-item {{ routeIsActive('price.*') }}">
    <a href="{{ route('price.index') }}" class='sidebar-link'>
        <i class="bi bi-currency-dollar"></i>
        <span>Price Category</span>
    </a>
</li>

