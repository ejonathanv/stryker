<x-app-header />
<x-app-sidebar />
<div class="page-body">
  <div class="container-fluid">
    <div class="page-header d-block d-sm-flex align-items-center">
      <h3 class="mb-3 mb-sm-0">{{ $pageTitle }}</h3>
      <div class="ms-auto">
        {{ $helperLinks }}
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">

        @if (session('message'))
            <div class="alert alert-success mb-4">
                {{ session('message') }}
            </div>
        @endif

        {{ $slot }}
      </div>
    </div>
  </div>
</div>
<x-app-footer />