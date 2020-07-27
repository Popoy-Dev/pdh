<nav class="sidebar" >
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
      <img src="{{ asset('asset/landing/logo-text.svg') }}" alt="" class="img-fluid" width="150" height="150">
      <span></span>
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body" data-step="1" data-intro="This is your dashboard. You can see here main features of the platform that you can explore!">
    <div class="mx-auto text-center my-3">
      <img src="{{ asset('/asset/landing/login-logo.svg') }}" alt="" class="p-2 img-fluid rounded-circle border-rounded" width="85" style="border:2px solid #40A0DE;">
      <p class="nav-style">{{ Auth::guard('admin')->user()->name}}</p>
    </div>
    <ul class="nav mx-auto">
      <li class="nav-item">
        <a href="{{ url('/admin/home') }}" class="nav-link">
          <i class="icon link-icon mdi mdi-view-dashboard"></i>
          <span class="link-title nav-style nav-text">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/admin/subject') }}" class="nav-link">
          <i class="icon link-icon mdi mdi-book-multiple"></i>
          <span class="link-title nav-style nav-text">Subject</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/admin/payment') }}" class="nav-link">
          <i class="icon link-icon mdi mdi-credit-card-multiple"></i>
          <span class="link-title nav-style nav-text">Payment</span>
        </a>
      </li>
      <li class="nav-item nav-category">Create Teacher Account</li>
      <li class="nav-item " >
        <a href="{{ url('/admin/teacher-account') }}" class="nav-link">
          <i class="icon link-icon mdi mdi-account-group"></i>
          <span class="link-title nav-style nav-text">Teacher</span>
        </a>
      </li>
      <li class="nav-item nav-category">Account</li>

      <li class="nav-item ">
      <a href="{{ url('/admin/logout') }}" class="nav-link" onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
      <i class="icon link-icon" data-feather="log-out"></i>
      <span class="link-title nav-style nav-text">Logout</span>
      <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" class="hidden">
        @csrf
      </form>
    </a>
  </li>
</ul>

</div>
</nav>

<div class="modal fade" id="addSubject" tabindex="-1" role="dialog" aria-labelledby="addSubject" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-center" style="background:#3EA2E5">
        <h5 class="modal-title mx-auto text-white nav-style" id="exampleModalLabel">Add a New Subject</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST">
        @csrf
        <div class="modal-body">
          <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10">
              <div class="form-group">
                <label for="grade" class="nav-style">Grade Level</label>
                <input type="text" class="form-control input-subject grade" name="grade">
                <p class="grade"></p>
              </div>

              <div class="form-group">
                <label for="grade" class="nav-style">Subject Title</label>
                <input type="text" class="form-control input-subject subject" name="subject">
                <p class="subject"></p>
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal">Cancel</button>
          <a href="#" class="btn pay-tution createSubj">Create</a>
        </div>
      </form>
    </div>
  </div>
</div>
