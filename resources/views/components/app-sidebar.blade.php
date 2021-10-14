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

          @role('admin')
            <x-admin-menu />
          @endrole

          @role('user')
            <x-driver-menu />
          @endrole

          @role('passenger')
            <x-passenger-menu />
          @endrole
          
        </ul>
      </div>
      <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </div>
  </nav>
</header>
<!-- Page Sidebar Ends-->