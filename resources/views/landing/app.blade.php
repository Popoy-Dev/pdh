<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="{{ url('/asset/landing/favicon.ico') }}"/>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
  <title>Scuola Maria</title>
  <link href="{{ asset('css/landing_responsive.css') }}" rel="stylesheet">
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>



@yield('content')


<div class="footer">
  <div class="row pl-5 pr-5 pt-5">
    <div class="col-md-3">
      <img src="{{asset('landing_asset/img/about-us-img.svg')}}" alt="" class="pb-5 foot-image">
      <p class="footer-header">“Insert tagline here” </p>
      <p class="footer-para">Address:  </p>
    </div>
    <div class="col-md-2 res_md">
      <h3 class="footer-header">Home</h3>
      <p class="footer-para">Sign in</p>
      <p class="footer-para"><a href="{{url('/about')}}" style="color:white"> About Us</a></p>
      <p class="footer-para">Programs</p>
      <p class="footer-para">Blogs</p>

    </div>
    <div class="col-md-2 res_md">
      <h3 class="footer-header">Support</h3>
      <p class="footer-para">FAQs</p>
      <p class="footer-para">About Us</p>
      <p class="footer-para">Terms of Use</p>
      <p class="footer-para">Affiliate Programs</p>
    </div>
    <div class="col-md-2 res_md1">
      <h3 class="footer-header">Programs</h3>
      <p class="footer-para">Grade Level</p>
      <p class="footer-para">Senior Highschool</p>
      <p class="footer-para">College</p>
      <p class="footer-para">Other</p>
    </div>
    <div class="col-md-2 res_md1">
      <h3 class="footer-header">Contact</h3>

      <i style="font-size:30px;color:white;" class="fa pr-4">&#xf09a;</i>
      <i style="font-size:30px;color:white;" class="fa pr-4">&#xf08c;</i>
      <i class="fa fa-envelope" style="font-size:30px;color:white;" aria-hidden="true"></i>
    </div>
  </div>
</div>
<div class="footer1">
  <h3 class="text-center foot1-p">www.homeschooldigital.ph </h3>
</div>
  </body>
  </html>
