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
    @if(Auth::guard('teacher')->user()->photo)
    <img src="{{ asset('asset/landing/avatar').'/'.Auth::guard('teacher')->user()->photo }}" alt="profile">
    @else
    <img src="{{ asset('asset/landing/avatar/avatar2.svg')}}" alt="profile">
    @endif
  </a>
  <div class="dropdown-menu" aria-labelledby="profileDropdown">
    <div class="dropdown-header d-flex flex-column align-items-center">
      <div class="figure mb-3">
        @if(Auth::guard('teacher')->user()->photo)
        <img src="{{ asset('asset/landing/avatar').'/'.Auth::guard('teacher')->user()->photo }}" alt="">
        @else
        <img src="{{ asset('asset/landing/avatar/avatar2.svg')}}" alt="">
        @endif
      </div>
      <div class="info text-center">
        <p class="name font-weight-bold mb-0">{{ Auth::guard('teacher')->user()->first_name .' '. Auth::guard('teacher')->user()->last_name}}</p>
        <p class="email text-muted mb-3">{{ Auth::guard('teacher')->user()->email }}</p>
      </div>
    </div>
    <div class="dropdown-body">
      <ul class="profile-nav p-0 pt-3">
        <li class="nav-item">
          <a href="javascript:;" class="nav-link" data-toggle="modal" data-target="#editprofile">
            <i data-feather="user-plus"></i>
            <span>Edit Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="javascript:;" class="nav-link" data-toggle="modal" data-target="#resetpassword">
            <i data-feather="edit"></i>
            <span>Reset Password</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/teacher/logout') }}" class="nav-link"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          <i data-feather="log-out"></i>
          <span>Log Out</span>
          <form id="logout-form" action="{{ url('/teacher/logout') }}" method="POST" class="hidden">
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


<!-- edit profile -->
<div class="modal fade" id="editprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        </div>
        <form id="form-edit-profile" role="form" method="POST" action="{{ url('/teacher/edit/profile') }}"
        class="form-horizontal">
        @csrf
        <div class="row justify-content-center">
          <div class="col-lg-10 col-md-10">
            <div class="form-group">
              <label for="">First Name</label>
              <input type="text" class="form-control" name="fname" value="{{ Auth::guard('teacher')->user()->first_name}}">
              <div class="fname"></div>
            </div>

            <div class="form-group">
              <label for="">Last Name</label>
              <input type="text" class="form-control" name="lname" value="{{ Auth::guard('teacher')->user()->last_name}}">
              <div class="lname"></div>
            </div>
            <div class="form-group">
              <label for="">Department</label>
              <input type="text" class="form-control" name="dept" value="{{ Auth::guard('teacher')->user()->department}}">
              <div class="dept"></div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="form-group row">
            <button type="submit" class="btn btn-primary mx-3">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- change password -->
<div class="modal fade" id="resetpassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-change-password" role="form" method="POST" action="{{ url('/teacher/password/reset') }}"
        ovalidate class="form-horizontal">
        @csrf
        <label for="current-password" class="col-sm-12 control-label">Current Password</label>
        <div class="form-group">
          <input type="password" class="form-control" id="current-password" name="current-password" placeholder="Password">
        </div>
        <label for="password" class="col-sm-12 control-label">New Password</label>
        <div class="form-group">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <label for="password_confirmation" class="col-sm-12 control-label">Re-enter Password</label>
        <div class="form-group">
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-enter Password">
        </div>
        <div class="password"></div>
        <div class="form-check form-check-flat form-check-primary">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input showpass">
            Show Password
            <i class="input-frame"></i>
          </label>
          </div>
        </div>
        <div class="modal-footer">
          <div class="form-group row">
            <button type="submit" class="btn btn-danger mx-3">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
