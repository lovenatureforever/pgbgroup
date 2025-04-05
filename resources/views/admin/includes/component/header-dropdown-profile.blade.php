<div class="dropdown-menu dropdown-menu-end me-1">
    <a href="javascript:" class="dropdown-item">Edit Profile</a>
    <a href="javascript:" class="dropdown-item">Setting</a>
    <div class="dropdown-divider"></div>
    {{-- <a href="{{ route('logout') }}" class="dropdown-item">Log Out</a> --}}

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="dropdown-item">Logout</button>
    </form>
</div>
