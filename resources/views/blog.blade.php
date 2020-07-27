@extends('landing.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
      <li class="nav-item s">
        <a class="nav-link link-res" href="{{url('/about')}}">About Us</a>
      </li>
      <li class="nav-item dropdown  s">
        <a class="nav-link link-res" href="{{url('/program')}}">
          Programs
        </a>
      </li>
      <li class="nav-item  s">
        <a class="nav-link  link-res" href="{{url('/faq')}}">FAQs</a>
      </li>
      <li class="nav-item  custom-li-blog s">
        <a class="nav-link  link-res  custom-u-about" href="{{url('/blog')}}">Blog</a>
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
/* Styles for wrapping the search box */

.main {
  width: 50%;
  margin: 50px auto;
}

/* Bootstrap 4 text input with search icon */

.has-search .form-control {
  padding-left: 2.375rem;
}

.has-search .form-control-feedback {
  position: absolute;
  z-index: 2;
  display: block;
  width: 2.375rem;
  height: 2.375rem;
  line-height: 2.375rem;
  text-align: center;
  pointer-events: none;
  color: #aaa;
}
.custom-li-blog{
  width: 80px;
}
.custom-u-blog {
  padding-bottom: 5px;
   border-bottom: 4px solid #00D3FF;
   line-height: 48px;
}
</style>
<div class="container my-5">
  <h3 class="text-custom-about text-center">BLOGS</h3>
  <div class="input-group mx-5 px-5 input-search">
     <input type="text" class="form-control form-search" placeholder="Search topics" >
     <div class="input-group-append">
       <button class="btn btn-csearch" type="button">
         <i class="fa fa-search"></i>
       </button>
     </div>
   </div>

</div>
  <div class="container my-5">
    <div class="row">
      <div class="col-md-6 mb-5">
        <div class="blog-pad">
          <div class="row">
            <div class="col-md-4">
              <img src="{{asset('landing_asset/img/blog1.svg')}}" alt="" class="d-inline">

            </div>
            <div class="col-md-8">
              <p class="p-link">INSIDEHIGHERED.COM </p>
              <p class="p-des">Teaching and Learning after COVID-19</p>
              <p class="p-para">Three post-pandemic predictions.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 mb-5">
        <div class="blog-pad">
          <div class="row">
            <div class="col-md-4">
              <img src="{{asset('landing_asset/img/blog2.svg')}}" alt="" class="d-inline">

            </div>
            <div class="col-md-8">
              <p class="p-link">INSIDEHIGHERED.COM </p>
              <p class="p-des">Teaching and Learning after COVID-19</p>
              <p class="p-para">Three post-pandemic predictions.</p>
            </div>
          </div>

        </div>
      </div>

      <div class="col-md-6">

        <div class="blog-pad">
          <div class="row">
            <div class="col-md-4">
              <img src="{{asset('landing_asset/img/blog2.svg')}}" alt="" class="d-inline">

            </div>
            <div class="col-md-8">
              <p class="p-link">INSIDEHIGHERED.CssOM </p>
              <p class="p-des">Teaching and Learning after COVID-19</p>
              <p class="p-para">Three post-pandemic predictions.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="blog-pad">
          <div class="row">
            <div class="col-md-4">
              <img src="{{asset('landing_asset/img/blog1.svg')}}" alt="" class="d-inline">

            </div>
            <div class="col-md-8">
              <p class="p-link">INSIDEHIGHERED.COM </p>
              <p class="p-des">Teaching and Learning after COVID-19</p>
              <p class="p-para">Three post-pandemic predictions.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="blog-pad">
          <div class="row">
            <div class="col-md-4">
              <img src="{{asset('landing_asset/img/course1.svg')}}" alt="" class="d-inline">

            </div>
            <div class="col-md-8">
              <p class="p-link">INSIDEHIGHERED.COM </p>
              <p class="p-des">Teaching and Learning after COVID-19</p>
              <p class="p-para">Three post-pandemic predictions.</p>
            </div>
          </div>

        </div>
      </div>

      <div class="col-md-6">
        <div class="blog-pad">
          <div class="row">
            <div class="col-md-4">
              <img src="{{asset('landing_asset/img/blog2.svg')}}" alt="" class="d-inline">

            </div>
            <div class="col-md-8">
              <p class="p-link">INSIDEHIGHERED.COM </p>
              <p class="p-des">Teaching and Learning after COVID-19</p>
              <p class="p-para">Three post-pandemic predictions.</p>
            </div>
          </div>

        </div>
      </div>

    </div>

  </div>

@endsection
