@extends('landing.app')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-transparent ml-4 ">
  <a class="navbar-brand" href="#"><img src="{{asset('landing_asset/img/logo.svg')}}" alt="" width="80px" height="80px"> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active s">
        <a class="nav-link link-res" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item s ">
        <a class="nav-link link-res " href="{{url('/about')}}">About Us</a>
      </li>
      <li class="nav-item dropdown s custom-li-program">
        <a class="nav-link link-res custom-u-program" href="{{url('/program')}}">
          Programs
        </a>
      </li>
      <li class="nav-item  s">
        <a class="nav-link  link-res" href="{{url('/faq')}}">FAQs</a>
      </li>
      <li class="nav-item  s">
        <a class="nav-link  link-res" href="{{url('/blog')}}">Blog</a>
      </li>
    </ul>


    <button class="btn-get  my-2 my-sm-0" type="submit"> <a style="color:white" href="{{ Auth::check() ? url('/home') : url('/registration') }}">@if(Auth::check())
    {{ Auth::user()->firstname }}
    @else
    GET STARTED
    @endif</a> </button>

  </div>
</nav>
<style media="screen">
.button_slide {
color: #FFF;
border-radius: 8px;
padding: 15px 24px;
display: inline-block;
font-family: "Lucida Console", Monaco, monospace;
background-color: #0E269D;
font-size: 14px;
letter-spacing: 1px;
cursor: pointer;
box-shadow: inset 0 0 0 0 #D80286;
-webkit-transition: ease-out 0.4s;
-moz-transition: ease-out 0.4s;
transition: ease-out 0.4s;
}
.slide_right:hover {
  box-shadow: inset 400px 0 0 0 #D80286;
}

.button_slide-light {
color: #FFF;
border-radius: 8px;
padding: 15px 24px;
display: inline-block;
font-family: "Lucida Console", Monaco, monospace;
background-color: #08CDFF;
font-size: 14px;
letter-spacing: 1px;
cursor: pointer;
box-shadow: inset 0 0 0 0 #D80286;
-webkit-transition: ease-out 0.4s;
-moz-transition: ease-out 0.4s;
transition: ease-out 0.4s;
}
.slide_right-light:hover {
  box-shadow: inset 400px 0 0 0 #D80286;
}

.button_slide-yellow {
color: #FFF;
border-radius: 8px;
padding: 15px 24px;
display: inline-block;
font-family: "Lucida Console", Monaco, monospace;
background-color: #FFE47E;
font-size: 14px;
letter-spacing: 1px;
cursor: pointer;
box-shadow: inset 0 0 0 0 #D80286;
-webkit-transition: ease-out 0.4s;
-moz-transition: ease-out 0.4s;
transition: ease-out 0.4s;
}
.slide_right-yellow:hover {
  box-shadow: inset 400px 0 0 0 #D80286;
}
.highlight {
   background: linear-gradient(180deg,rgba(255,255,255,0) 50%, #08CDFF 50%);
}
</style>

<div class="container mt-5">
  <h3 class="text-custom-about text-center"> <span class="highlight ">&nbsp &nbsp Progams</span> </h3>
  <p class="text-center text-categ">Categories</p>
  <div class="row mt-4  mx-5">
      <div class="col-md-4">
          <div class="button_slide slide_right">BUTTON: Business </div>
      </div>
      <div class="col-md-4">
        <div class="button_slide-light slide_right">BUTTON: Business </div>

      </div>
      <div class="col-md-4">
        <div class="button_slide-yellow slide_right">BUTTON: Business </div>

      </div>
  </div>
</div>
<div class="container mt-5">
  <p class="text-center text-categ">Course</p>
  <div class="row mt-4  mx-5">
      <div class="col-md-4 prog-image">
          <img src="{{asset('landing_asset/img/course1.svg')}}" alt="">
      </div>
      <div class="col-md-4 prog-image">
          <img src="{{asset('landing_asset/img/course2.svg')}}" alt="">
      </div>
      <div class="col-md-4 prog-image">
          <img src="{{asset('landing_asset/img/course3.svg')}}" alt="">
      </div>

      <div class="col-md-4 prog-image">
          <img src="{{asset('landing_asset/img/course1.svg')}}" alt="">
      </div>
      <div class="col-md-4 prog-image">
          <img src="{{asset('landing_asset/img/course2.svg')}}" alt="">
      </div>
      <div class="col-md-4 prog-image">
          <img src="{{asset('landing_asset/img/course3.svg')}}" alt="">
      </div>
  </div>
</div>
@endsection
