<li class="sidebar-item {{ routeIsActive('dashboard') }}">
    <a href="{{ route('dashboard') }}" class='sidebar-link'>
        <i class="bi bi-grid-fill"></i>
        <span>Dashboard</span>
    </a>
</li>

<li class="sidebar-item {{ routeIsActive('users.*') }}">
    <a href="{{ route('users.index') }}" class='sidebar-link'>
        <i class="bi bi-person-fill"></i>
        <span>Users</span>
    </a>
</li>

<hr>

<li class="sidebar-item">
    <a href="#" class='sidebar-link' data-bs-toggle="modal" data-bs-target="#modal_logout" >
        <i class="bi bi-box-arrow-left"></i>
        <span>Logout</span>
    </a>
</li>

