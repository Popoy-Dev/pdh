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
        <a class="nav-link link-res" href="{{url('/about')}}">About Us</a>
      </li>
      <li class="nav-item dropdown  s">
        <a class="nav-link link-res" href="{{url('/program')}}">
          Programs
        </a>
      </li>
      <li class="nav-item  s custom-li-faq">
        <a class="nav-link  link-res custom-u-faq" href="{{url('/faq')}}">FAQs</a>
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

<div class="container mt-5">
  <div class="faq-pad ">
    <img src="{{asset('landing_asset/img/FAQs.svg')}}" alt="">
    <form class="example" action="action_page.php">
    <input type="text" placeholder="Search asked questions " name="search">
    <button type="submit"><i class="fa fa-search"></i></button>
  </form>
  </div>
  <h3 class="text-custom-faq text-center">FREQUENTLY ASKED QUESTIONS</h3>

  <div class="row">
    <div class="col-md-3 pl-5">
      <p class="float-right ques-p">Program Details</p>
    </div>
    <div class="col-md-3">
      <p class="float-right ques-p">Tech-Related</p>
    </div>
    <div class="col-md-3">
      <p class="float-right ques-p">Tuition and Fees</p>
    </div>
    <div class="col-md-3">
      <p class="float-right ques-p">Admission and Admin</p>
    </div>
  </div>
  <div class="container my-5">
    <div class="faq-pad-btn">
      <div class="col-md-12 mb-5">
        <button type="button" name="button" class="btn-ques d-inline">Question 1</button>
          <button type="button" name="button" class="btn-ques d-inline float-right">Question 2</button>
      </div>

      <div class="col-md-12 mb-5">
        <button type="button" name="button" class="btn-ques d-inline">Question 1</button>
          <button type="button" name="button" class="btn-ques d-inline float-right">Question 2</button>
      </div>


    </div>
  </div>
</div>

@endsection
