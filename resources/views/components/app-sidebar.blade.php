<!-- Page Sidebar Start-->
<header class="main-nav">
  <nav>
    <div class="main-navbar">
      <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
      <div id="mainnav">           
        <ul class="nav-menu custom-scrollbar">
          <li class="back-btn">
            <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
          </li>
          <li class="sidebar-main-title">
            <div>
              <h6>Menú</h6>
            </div>
          </li>
          <li>
            <a class="nav-link menu-title" href="{{ route('dashboard') }}">
              <i data-feather="home"></i>
              <span>Escritorio</span>
            </a>
          </li>
          <li class="dropdown">
            <a class="nav-link menu-title" href="javascript:void(0)">
              <i data-feather="calendar"></i><span>Viajes</span>
            </a>
            <ul class="nav-submenu menu-content">
              <li><a href="{{ route('trips.create') }}">Nuevo viaje</a></li>
              <li><a href="{{ route('trips.index') }}">Lista de viajes</a></li>
              <li><a href="{{ route('groups.create') }}">Nuevo grupo</a></li>
              <li><a href="{{ route('groups.index') }}">Lista de grupos</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="nav-link menu-title" href="javascript:void(0)">
              <i data-feather="users"></i><span>Pasajeros</span>
            </a>
            <ul class="nav-submenu menu-content">
              <li><a href="{{ route('passengers.create') }}">Nuevo</a></li>
              <li><a href="{{ route('passengers.index') }}">Lista de pasajeros</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="nav-link menu-title" href="javascript:void(0)">
              <i data-feather="user-check"></i><span>Conductores</span>
            </a>
            <ul class="nav-submenu menu-content">
              <li><a href="{{ route('drivers.create') }}">Nuevo</a></li>
              <li><a href="{{ route('drivers.index') }}">Lista de conductores</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="nav-link menu-title" href="javascript:void(0)">
              <i data-feather="truck"></i><span>Vehículos</span>
            </a>
            <ul class="nav-submenu menu-content">
              <li><a href="{{ route('vehicles.create') }}">Nuevo</a></li>
              <li><a href="{{ route('vehicles.index') }}">Lista de vehículos</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </div>
  </nav>
</header>
<!-- Page Sidebar Ends-->