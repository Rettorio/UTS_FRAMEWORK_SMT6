    <li class="nav-item">
      <a class="nav-link" href="{{ route('penyelenggara.dashboard') }}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('penyelenggara.event.index') }}">
        <i class="mdi mdi-pine-tree  menu-icon"></i>
        <span class="menu-title">Event</span>
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