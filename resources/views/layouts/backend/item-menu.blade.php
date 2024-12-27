<li class="sidebar-item {{ routeIsActive('dashboard') }}">
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

<li class="sidebar-item {{ routeIsActive('age-categories*') }}">
    <a href="{{ route('age-categories.index') }}" class='sidebar-link'>
        <i class="bi bi-person-fill"></i>
        <span>Age Categories</span>
    </a>
</li>

