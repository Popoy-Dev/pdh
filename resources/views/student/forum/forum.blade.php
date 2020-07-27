@extends('dashboardTemplate.main')

@section('content')
<div class="container-fluid mt-5">
  <div class="row">
    <div class="col-lg-12" style="background-image:url(/images/header-forum.svg);
    background-repeat:no-repeat;
    padding-left:0px!important;
    padding-right:0px!important;
    background-size:cover;
    height: 400px;
    ">
      <div class="container forum-header" data-step="2" data-intro="Sample">
        <h1> Welcome to HDP Forum!</h1>
        <p>Welcome to the HDP Forum, an online environment for students,
           teachers and <br> other members of the school community to connect,
           communicate and learn.</p>
          <a href="{{ url('start-discussion') }}" class="btn btn-startDiscuss mt-5">Start Discussion</a>
          <a href="{{ url('guidelines') }}" class="btn btn-readGuide mt-5 ml-3">Read Guidelines</a>
      </div>
    </div>
  </div>
</div>

  <div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="page-content">
        @yield('forum')
      </div>
    </div>
  </div>
  </div>

</div>


<script>

  $('.sidenavNew').css('display', 'none');
  $('#nav-forum').css('background-color','rgba(8, 205, 255, 0.1)');
  $('#nav-forum').css('width','100%');
  $('#nav-forum').css('border-radius','16px');

</script>
@endsection
