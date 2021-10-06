<x-app-header />
<x-app-sidebar />
<div class="page-body">
  <div class="container-fluid">
    <div class="page-header">
      <h3>{{ $pageTitle }}</h3>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        {{ $slot }}
      </div>
    </div>
  </div>
</div>
<x-app-footer />