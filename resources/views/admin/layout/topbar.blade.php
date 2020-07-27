<nav class="navbar">
  <a href="#" class="sidebar-toggler">
    <i data-feather="menu"></i>
  </a>
  <div class="navbar-content">
    <!-- <form class="search-form">
    <div class="input-group">
    <div class="input-group-prepend">
    <div class="input-group-text">
    <i data-feather="search"></i>
  </div>
</div>
<input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
</div>
</form> -->
<ul class="navbar-nav">
  <li class="nav-item dropdown nav-notifications">
    <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i data-feather="bell" style="color:#FFC464;"></i>
      <!-- <div class="indicator">
      <div class="circle"></div>
    </div> -->
  </a>
  <div class="dropdown-menu" aria-labelledby="notificationDropdown">
    <div class="dropdown-header d-flex align-items-center justify-content-between">
      <p class="mb-0 font-weight-medium">New Notifications</p>
      <!-- <a href="javascript:;" class="text-muted">Clear all</a> -->
    </div>
    <div class="dropdown-body">

    </div>
    <div class="dropdown-footer d-flex align-items-center justify-content-center">
      <a href="javascript:;">View all</a>
    </div>
  </div>
</li>
<li class="nav-item nav-notifications">
  <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i data-feather="shopping-cart" style="color:#4A8EBA;"></i>
    <!-- <div class="indicator">
    <div class="circle"></div>
  </div> -->
</a>
</li>

<li class="nav-item dropdown nav-profile">
  <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img src="{{ asset('/asset/landing/login-logo.svg') }}" alt="profile">
  </a>
  <div class="dropdown-menu" aria-labelledby="profileDropdown">
    <div class="dropdown-header d-flex flex-column align-items-center">
      <div class="figure mb-3">
        <img src="{{ asset('/asset/landing/login-logo.svg') }}" alt="">
      </div>
      <div class="info text-center">
        <p class="name font-weight-bold mb-0">{{ Auth::guard('admin')->user()->name }}</p>
        <p class="email text-muted mb-3">{{ Auth::guard('admin')->user()->email }}</p>
      </div>
    </div>
    <div class="dropdown-body">
      <ul class="profile-nav p-0 pt-3">
        <!-- <li class="nav-item">
        <a href="{{url('admin/password/change/form')}}" class="nav-link">
        <i data-feather="key"></i><span>Change Password</span></a>
      </li> -->
      <li class="nav-item">
        <a href="{{ url('/admin/logout') }}" class="nav-link"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <i data-feather="log-out"></i>
        <span>Log Out</span>
        <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" class="hidden">
          @csrf
        </form>
      </a>
    </li>
  </ul>
</div>
</div>
</li>
</ul>
</div>
</nav>
