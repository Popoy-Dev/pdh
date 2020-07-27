<nav class="sidebar" >
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
      <!-- <img src="{{ asset('asset/landing/logo-text.svg') }}" alt="" class="img-fluid" width="150" height="150"> -->
      <img src="{{ asset('images/logo.svg') }}" alt="" class="img-fluid" width="40" height="40">
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
      @if(Auth::guard('teacher')->user()->photo)
      <img src="{{ asset('asset/landing/avatar').'/'.Auth::guard('teacher')->user()->photo }}"
      alt="" class="p-2 img-fluid rounded-circle border-rounded" width="85" style="border:2px solid #40A0DE;">
      @else
      <img src="{{ asset('asset/landing/avatar/avatar2.svg')}}"
      alt="" class="p-2 img-fluid rounded-circle border-rounded" width="85" style="border:2px solid #40A0DE;">
      @endif
      <p class="nav-style">{{ Auth::guard('teacher')->user()->first_name .' '. Auth::guard('teacher')->user()->last_name}}</p>
      <p class="nav-style">{{ Auth::guard('teacher')->user()->department}}</p>
    </div>
    <div class="text-center">
      <button class="btn pay-tution" data-toggle="modal" data-target="#addSubject">Add Subject</button>
    </div>
    <ul class="nav">
      <li class="nav-item mr-auto px-5 my-2 nav-jav" id="nav-dash" >
        <a href="{{ url('/teacher/home') }}" class="nav-link">
          <i class="icon link-icon mdi mdi-view-dashboard"></i>
          <span class="link-title nav-style nav-text">Dashboard</span>
        </a>
      </li>

       <li class="nav-item mr-auto px-5 my-2 nav-jav" id="nav-dash">
        <a href="{{ url('/teacher/subjects') }}" class="nav-link">
          <i class="icon link-icon mdi mdi-table-edit"></i>
          <span class="link-title nav-style nav-text">My Subjects</span>
        </a>
      </li>
<!--
      <li class="nav-item ">
        <a href="#" class="nav-link">
          <i class="icon link-icon mdi mdi-chart-areaspline"></i>
          <span class="link-title nav-style nav-text">My Students</span>
        </a>
      </li>

      <li class="nav-item ">
        <a href="#" class="nav-link">
          <i class="icon link-icon mdi mdi-wechat"></i>
          <span class="link-title nav-style nav-text">Forum</span>
        </a>
      </li>

      <li class="nav-item ">
        <a href="#" class="nav-link">
          <i class="icon link-icon mdi mdi-calendar"></i>
          <span class="link-title nav-style nav-text">My Calendar</span>
        </a>
      </li>

      <li class="nav-item ">
        <a href="#" class="nav-link">
          <i class="icon link-icon mdi mdi-message"></i>
          <span class="link-title nav-style nav-text">Messages</span>
        </a>
      </li> -->
      <li class="nav-item nav-category">Account</li>
      <li class="nav-item  mr-auto px-5 my-2 nav-jav" id="nav-dash">
        <a href="{{ url('/teacher/logout') }}" class="nav-link"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"
        >
          <i class="icon link-icon" data-feather="log-out"></i>
          <span class="link-title nav-style nav-text">Logout</span>
          <form id="logout-form" action="{{ url('/teacher/logout') }}" method="POST" class="hidden">
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
                <select name="grade" id="" class="form-control grade input-subject" style="border-radius: 10px;">
                  <option value="nursery">Nursery </option>
                  <option value="kinder">Kinder 2 </option>
                  <option value="1">Grade 1</option>
                  <option value="2">Grade 2</option>
                  <option value="3">Grade 3</option>
                  <option value="4">Grade 4</option>
                  <option value="5">Grade 5</option>
                  <option value="6">Grade 6</option>
                  <option value="7">Grade 7</option>
                  <option value="8">Grade 8</option>
                  <option value="9">Grade 9</option>
                  <option value="10">Grade 10</option>
                </select>
                <p class="grade"></p>
              </div>

              <div class="form-group">
                <label for="grade" class="nav-style">Subject Title</label>
                <input type="text" class="form-control input-subject subject" name="subject">
                <p class="subject"></p>
              </div>

              <div class="createSubj">

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
