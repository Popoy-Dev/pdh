<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<nav class="sidebar" >
  <div class="sidebar-header" style="background-color: #08CDFF;">
    <a href="#" class="sidebar-brand">
      <img src="{{ asset('images/logo.svg') }}" alt="" class="img-fluid" width="40" height="40">
      <span></span>
    </a>
    <div class="sidebar-toggler not-active" id="toggler-1">
      <span></span>
      <span></span>
      <span></span>
    </div>
    <div class="sidebar-toggler no-active" id="toggler-2" style="display: none">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body" data-step="1" data-intro="This is your dashboard. You can see here main features of the platform that you can explore!">
    <div class="mx-auto text-center pt-4" >
      <img src="{{ asset('asset/landing/avatar').'/'.Auth::user()->photo }}" alt="" class="my-3 p-2 img-fluid rounded-circle border-rounded" width="85" style="border:2px solid #40A0DE;">
      <p class="nav-style">{{ Auth::user()->firstname }}</p>
      <p class="nav-style" style="font-size: 10px;color: #999;">STUDENT</p>
    </div>
      <ul class="nav mx-auto my-3">
        <li class="nav-item mr-auto px-5 my-2 nav-jav" id="nav-dash">
          <a href="{{ url('/home') }}" class="nav-link">
            <i class="icon link-icon mr-10 link-icon-nav" data-feather="box"></i>
            <span class="link-title nav-style nav-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item mr-auto px-5 my-2 nav-jav" id="nav-browse">
          <a href="{{ url('/browse-courses') }}" class="nav-link">
          <i class="icon link-icon" data-feather="search"></i>
            <span class="link-title nav-style nav-text">Browse Course</span>
          </a>
        </li>

        <li class="nav-item mr-auto px-5 my-2 nav-jav" id="nav-course">
          <a href="{{ url('/my-teacher') }}" class="nav-link">
            <i class="icon link-icon" data-feather="book"></i>
            <span class="link-title nav-style nav-text">My Courses</span>
          </a>
        </li>

        <li class="nav-item mr-auto px-5 my-2 nav-jav" id="nav-calendar">
          <a href="{{ url('/my-task') }}" class="nav-link">
            <i class="icon link-icon" data-feather="calendar"></i>
            <span class="link-title nav-style nav-text">My Calendar</span>
          </a>
        </li>
        <li class="nav-item mr-auto px-5 my-2  nav-jav" id="nav-forum">
          <a href="{{ url('/forum') }}" class="nav-link">
          <i class="icon link-icon" data-feather="users"></i>
            <span class="link-title nav-style nav-text">Forum</span>
          </a>
        </li>
        <li class="nav-item mr-auto px-5 my-2 nav-jav" id="nav-cart">
          <a href="#" class="nav-link">
          <i class="icon link-icon" data-feather="shopping-cart"></i>
            <span class="link-title nav-style nav-text">My Cart</span>
          </a>
        </li>
        <li class="nav-item px-3 nav-category">Account</li>
        <li class="nav-item mr-auto px-5 my-2 nav-jav" id="nav-account">
            <a href="{{ url('/change-email') }}" class="nav-link">
            <i class="icon link-icon" data-feather="user"></i>
              <span class="link-title nav-style nav-text">My Account</span>
            </a>
          </li>
        <li class="nav-item mr-auto px-5 my-2 nav-jav" id="nav-message">
          <a href="{{ url('/chat') }}" class="nav-link">
            <i class="icon link-icon" data-feather="credit-card"></i>
            <span class="link-title nav-style nav-text">Messages</span>
          </a>
        </li>
      </ul>
  </div>
</nav>

<script>
  //Jquery for left and right navigation bar to be responsive 

  $(document).ready(function() {
    let x = 0;

    $(".sidebar-body").mouseover(function(){
      if(x==1){
        $('.nav-jav').css('margin-left','0px');
      }
    });

    $(".sidebar-body").mouseout(function(){
      if(x==1){
        $('.nav-jav').css('margin-left','-30px');
      }
    });

    $('#toggler-1').click(function() {
     
        //$('.nav-jav').css('background-color','#fff'); 
        $('.nav-jav').css('margin-left','-30px');
        $('#toggler-1').css('display','none'); 
        $('#toggler-2').css('display','block'); 
        x=1;
        
     
    });
    $('#toggler-2').click(function() {
     
     //$('.nav-jav').css('background-color','#fff'); 
     $('.nav-jav').css('margin-left','0px');
     $('#toggler-2').css('display','none'); 
     $('#toggler-1').css('display','block'); 
     x=0;

    
    });

    $('.title-calendar').click(function() {
      $('.sidenavNew').css('width','70px');
      $('.sidenavNew').css('height','700px');
      $('.rightNav').css('display','none');
      $('.navshow').css('display','block');
      $('.calendar-show').css('display','block');
      $('.innerSidenav').css('margin-top','50px');
    });

    $('.nav-show').click(function() {
      $('.sidenavNew').css('width','250px');
      $('.sidenavNew').css('height','auto');
      $('.rightNav').css('display','block');
      $('.navshow').css('display','none');
      $('.calendar-show').css('display','none');
      $('.innerSidenav').css('margin-top','70px');
    }); 

  });
</script>


