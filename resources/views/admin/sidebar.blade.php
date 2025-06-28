    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.index') }}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.wisata.index') }}">
        <i class="mdi mdi-airballoon  menu-icon"></i>
        <span class="menu-title">Wisata</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.event') }}">
        <i class="mdi mdi-pine-tree  menu-icon"></i>
        <span class="menu-title">Daftar Event</span>
      </a>
    </li>
    <li class="nav-item">
      <!-- <div class="nav-link"> -->
        <form method="POST" action="{{ route('logout') }}">
          @csrf
            <button class="nav-link" type="submit">
                  <i class="mdi mdi-logout menu-icon"></i>
                  <span class="menu-title">Logout</span>
            </button>
        </form>
      <!-- </div> -->
    </li>