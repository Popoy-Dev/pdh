@include('layouts.style')
<div class="main-wrapper" id="app">
  <div class="page-wrapper full-page">
    <div class="page-content d-flex align-items-center justify-content-center">

      <div class="row w-100 mx-0 auth-page">
        <div class="col-md-8 col-xl-6 mx-auto">
          @yield('content')
        </div>
      </div>
    </div>
  </div>
</div>
@include('layouts.scripts')
