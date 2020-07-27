@extends('landing.app')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-transparent ml-4">
  <a class="navbar-brand" href="#"><img src="{{asset('landing_asset/img/logo.svg')}}" alt="" width="80px" height="80px"> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active s">
        <a class="nav-link link-res" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item s custom-li-about">
        <a class="nav-link link-res custom-u-about" href="{{url('/about')}}">About Us</a>
      </li>
      <li class="nav-item dropdown  s">
        <a class="nav-link link-res" href="{{url('/program')}}">
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
<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{asset('landing_asset/img/banner.png')}}" alt="Los Angeles" width="100%" height="100%">
      <div class="carousel-caption">

      </div>
    </div>
    <div class="carousel-item">
      <img src="{{asset('landing_asset/img/banner.png')}}" alt="Chicago" width="100%" height="100%">
      <div class="carousel-caption">

      </div>
    </div>
    <div class="carousel-item">
      <img src="{{asset('landing_asset/img/banner.png')}}" alt="New York" width="100%" height="100%">
      <div class="carousel-caption">

      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<div class="container mt-5">
  <h3 class="text-custom-about text-center">Who Are We?</h3>
  <div class="row mt-4  mx-5">
    <div class="col-md-5 col-lg-5">

        <img src="{{asset('landing_asset/img/blog1.svg')}}" class="ml-5" alt="">


    </div>
    <div class="col-md-7 col-lg-7 pr-5">
        <p class="p_who ml-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> <br>
        <p class="p_who ml-5"> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
    </div>

    <div class="col-md-8 col-lg-7 my-5 pl-5">
      <h3 class="text-custom-about text-left my-5">What We Do?</h3>
      <p class="p_who">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> <br>
      <p class="p_who"> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
    </div>
    <div class="col-md-4 col-lg-5 my-5">
        <img src="{{asset('landing_asset/img/blog1.svg')}}" class="float-right my-5" alt="">
    </div>
  </div>
</div>
<div class="container">
  <h3 class="text-center text-custom-about ">Get in Touch</h3>
  <h5 class="text-touch text-center mb-5">Got questions or suggestions? Let us know how we can help.</h5>
  <div class="row">
    <div class="col-md-8 ">
      <form class="ml-4 mb-5 mx-l form-border">
    <div class="form-group mx-5">
      <label for="exampleInputEmail1" class="label-form">Your Name</label>
      <input type="email" class="form-control form-message" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-group mx-5">
      <label for="exampleInputPassword1" class="label-form">Email Address</label>
      <input type="text" class="form-control form-message" id="exampleInputPassword1">
    </div>
    <div class="form-group mx-5">
      <label for="exampleInputEmail1" class="label-form">Your Message</label>
      <textarea name="name"  class="form-control form-message" rows="8" cols="120"></textarea>
    </div>
    <div class="form-group text-center mx-5">
      <button type="submit" class="btn btn-primary form-btn-about">Submit</button>

    </div>
  </form>
    </div>
    <div class="col-md-4">
        <img src="{{asset('landing_asset/img/get-in-touch.svg')}}" alt="">
    </div>
  </div>

</div>
@endsection
