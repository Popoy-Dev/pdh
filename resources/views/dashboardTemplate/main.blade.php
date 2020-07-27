@include('dashboardTemplate.header')

<div class="main-wrapper" id="app">
  @if(Auth::guard('teacher')->check())
  @include('teacher.layout.sidebar')
  @elseif(Auth::guard('admin')->check())
  @include('admin.layout.sidebar')
  @else
  @include('dashboardTemplate.rightSidebar')
  @include('dashboardTemplate.leftbar')
  @endif
  <div class="page-wrapper">
    @if(Auth::guard('teacher')->check())
    @include('teacher.layout.topbar')
    @elseif(Auth::guard('admin')->check())
    @include('admin.layout.topbar')
    @else
    @include('dashboardTemplate.topbar')
    @endif
    
    @yield('content')
  </div>
</div>
@include('dashboardTemplate.footer')
