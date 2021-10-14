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
<li class="dropdown">
  <a class="nav-link menu-title" href="javascript:void(0)">
    <i data-feather="users"></i><span>Usuarios</span>
  </a>
  <ul class="nav-submenu menu-content">
    <li><a href="{{ route('users.create') }}">Nuevo</a></li>
    <li><a href="{{ route('users.index') }}">Lista de usuarios</a></li>
  </ul>
</li>