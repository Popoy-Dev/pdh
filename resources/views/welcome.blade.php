@extends('landing.app')

@section('content')

  <style>
  @import url('https://fonts.googleapis.com/css2?family=Nunito&display=swap');

</style>
</head>
<body class="" style="font-fontFamily:MyFont">
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
      @endif </button>

    </div>
  </nav>
<div class="row">

  <div class="col-md-6 pl-5 pad-limit">

      <div class=" header-pad ml-5">
        <h3 class="head-text">Create &nbsp a &nbsp space &nbsp in &nbsp your <br> home that sparks learning <br> and creativity.</h3>
        <p class="head-p">The best way to educate your kids is to learn <br> with them.</p>

        <div class="btn-limit">
          <button type="button" name="button" class="enroll-btn d-inline mt-5"> <a href="{{url('/registration')}}" class="">
          Enroll Now
          </a></button>
          <button type="button" name="button " class="login-btn d-inline mt-5 float-right"> <a href="{{ url('/login') }}" class="">
          Login
          </a></button>
        </div>

      </div>



  </div>
  <div class="col-md-6">
    <img src="{{asset('landing_asset/img/img.svg')}}" alt=""  class="float-right img-head">

  </div>
</div>

<!-- container -->
<!-- PANG KIKAY NI ALYSSA COMIA -->
<div class="row">
<img src="{{asset('landing_asset/img/feature-img.svg')}}" class="float-left img-float" alt="">

<div class="container mx-auto">
  <div class="text-center md:my-16 lg:my-16 xl:my-20 xxl:my-20">
    <p class=" font-semibold leading-10 text-custom my-5" id="">
      Our Features
    </p>
  </div>
  <div class="flex xs:flex-col flex-row justify-around bg-gray-200">

    <div class="mx-auto">
      <img src="{{ url('landing_asset/img/feature1.svg') }}" alt=""  class="object-contain object-center fea-img  h-198 w-198">
      <p class="not-italic font-normal leading-relaxed text-base text-center md:text-lg font-p">Assessment Tools</p>
    </div>

    <div class="mx-auto">
      <img src="{{ url('landing_asset/img/feature2.svg') }}" alt=""  class="object-contain object-center fea-img   h-198 w-198">
      <p class=" not-italic font-normal leading-relaxed text-base text-center md:text-lg font-p">Interactive Elements</p>
    </div>

    <div class="mx-auto mb-5">
      <img src="{{ url('landing_asset/img/feature3.svg') }}" alt=""  class="object-contain object-center fea-img   h-198 w-198">
      <p class=" not-italic font-normal leading-relaxed text-base text-center md:text-lg font-p">Home Collaboration</p>
    </div>

  </div>
  <p class=" text-center my-5 text-custom" id="">
     Highlight Courses
  </p>
</div>

</div>


<!-- end container -->
<!-- container -->
<!-- PANG KIKAY NI ALYSSA COMIA -->
<div class="row">
  <img src="{{ url('landing_asset/img/courses-img.svg') }}" class="ki-img" alt="">
</div>
<div class="container mx-auto mt-16">

  <div class="flex xs:flex-col flex-row justify-around bg-gray-200">

    <div class="mx-auto">
      <img src="{{ url('landing_asset/img/course1.svg') }}" alt=""  class="object-contain object-center cour-img h-198 w-198">
    </div>

    <div class="mx-auto">
      <img src="{{ url('landing_asset/img/course2.svg') }}" alt=""  class="object-contain object-center cour-img  h-198 w-198">
    </div>

    <div class="mx-auto">
      <img src="{{ url('landing_asset/img/course3.svg') }}" alt=""  class="object-contain object-center cour-img h-198 w-198">
    </div>


  </div>
  <div class="text-center md:my-16 lg:my-16 xl:my-20 xxl:my-20">
      <a href="#" class="text-primary font-20">View More</a>
  </div>
</div>

<!-- end container -->

<div class="container  my-5">

  <div class="row">
    <div class="col-md-6">
      <img src="{{ asset('landing_asset/img/about-us-img.svg') }}" alt=""
      class="block  object-contain object-center img-who">
    </div>
    <div class="col-md-6 text-center">
          <h3 class="text-custom pb-5">  Who Are We?</h3>
          <p class="text-who">&nbsp &nbsp&nbsp We are Homeschool Digital Philippines where we share innovation thru tech/digital to our homeschooling community in the Philippines.</p>
          <button type="button" class="btn btn-who" name="button">Contact Us</button>
    </div>
  </div>


</div>
<!-- //Get to Know Us -->
<div class="container mx-auto">
  <div class="text-center xxl:mt-20">
    <p class="font-semibold leading-10 text-4xl text-custom my-5 mx-5 px-3 lg:my-10" id="aboutus">Blog</p>

  </div>

  <div class="flex xs:flex-col flex-row justify-around bg-gray-200">

    <div class="mx-auto">
      <img src="{{ url('landing_asset/img/blog1.svg') }}" alt=""  class="object-contain object-center  h-64 w-full">
    </div>

    <div class="mx-auto">
      <img src="{{ url('landing_asset/img/blog2.svg') }}" alt=""  class="object-contain object-center  h-64 w-full">
    </div>

    <div class="mx-auto">
      <img src="{{ url('landing_asset/img/blog3.svg') }}" alt=""  class="object-contain object-center h-64  w-full">
    </div>


  </div>

</div>
<!-- END get to know us -->


<!-- BLOG -->
<!-- <div class="max-w-full lg:container bg-secondary-2 md:mt-32 lg:mt-64 xl:mt-64 xxl:mt-64">
  <div class="text-center">
    <p class="font-semibold text-4xl text-primary " id="blog" style="line-height:5rem">Blogs</p>
  </div>
  <div class="grid grid-cols-1 md:grid-cols-3 md:gap-4 md:mx-5 lg:grid-cols-3 xl:grid-cols-3 xxl:grid-cols-3 lg:mx-5 my-10 mx-16">
    <div class="">
      <div id="challenges">
        <div class="show max-w-xs bg-white-2 rounded-lg p-4 xl:ml-auto xxl:ml-auto">
          <img src="https://scuola-maria.s3-ap-southeast-1.amazonaws.com/local-dev/asset/thumnail/challenges/DLPChallenge1.jpg" alt=""
          class="object-contain object-center mx-auto  ">
        </div>

        <div class="max-w-xs bg-white-2 rounded-lg p-4 xl:ml-auto xxl:ml-auto hidden">
          <img src="https://scuola-maria.s3-ap-southeast-1.amazonaws.com/local-dev/asset/thumnail/challenges/DLPChallenge2.jpg" alt=""
          class="object-contain object-center mx-auto">
        </div>

        <div class="max-w-xs bg-white-2 rounded-lg p-4 xl:ml-auto xxl:ml-auto hidden">
          <img src="https://scuola-maria.s3-ap-southeast-1.amazonaws.com/local-dev/asset/thumnail/challenges/DLPChallenge3.jpg" alt=""
          class="object-contain object-center mx-auto">
        </div>

        <div class="max-w-xs bg-white-2 rounded-lg p-4 xl:ml-auto xxl:ml-auto hidden">
          <img src="https://scuola-maria.s3-ap-southeast-1.amazonaws.com/local-dev/asset/thumnail/challenges/DLPChallenge4.jpg" alt=""
          class="object-contain object-center mx-auto">
        </div>

        <div class="max-w-xs bg-white-2 rounded-lg p-4 xl:ml-auto xxl:ml-auto hidden">
          <img src="https://scuola-maria.s3-ap-southeast-1.amazonaws.com/local-dev/asset/thumnail/challenges/DLPChallenge5.jpg" alt=""
          class="object-contain object-center mx-auto">
        </div>
      </div>

      <div class="text-center max-w-xs ml-auto my-5 xl:ml-auto xxl:ml-auto">
        <p class="
        mx-auto
        text-xl
        not-italic
        font-semibold
        leading-7
        text-dark-3
        my-3
        ">Challenges of Online Learning</p>
        <p class="
        mx-5
        text-justify
        text-base
        not-italic
        font-normal
        leading-snug
        ">In this album, we tried to answer some of the usual concerns and challenges
        every family might think of before engaging in the program.
      </p> -->

      <!-- <p class="
      my-5
      text-primary
      font-normal
      not-italic
      leading-snug
      text-base
      ">
      <a href="">Read more ></a>
    </p> -->
  <!-- </div>
</div>

<div class="">
  <div id="advantages">
    <div class="show max-w-xs  bg-white-2 rounded-lg p-4 xl:mx-auto xxl:mx-auto">
      <img src="https://scuola-maria.s3-ap-southeast-1.amazonaws.com/local-dev/asset/thumnail/advantage/DLPReason1.png" alt=""
      class="object-contain object-center mx-auto">
    </div>
    <div class="max-w-xs  bg-white-2 rounded-lg p-4 xl:mx-auto xxl:mx-auto hidden">
      <img src="https://scuola-maria.s3-ap-southeast-1.amazonaws.com/local-dev/asset/thumnail/advantage/DLPReason2.png" alt=""
      class="object-contain object-center mx-auto">
    </div>
    <div class="max-w-xs  bg-white-2 rounded-lg p-4 xl:mx-auto xxl:mx-auto hidden">
      <img src="https://scuola-maria.s3-ap-southeast-1.amazonaws.com/local-dev/asset/thumnail/advantage/DLPReason3.png" alt=""
      class="object-contain object-center mx-auto">
    </div>
    <div class="max-w-xs  bg-white-2 rounded-lg p-4 xl:mx-auto xxl:mx-auto hidden">
      <img src="https://scuola-maria.s3-ap-southeast-1.amazonaws.com/local-dev/asset/thumnail/advantage/DLPReason4.png" alt=""
      class="object-contain object-center mx-auto">
    </div>
    <div class="max-w-xs  bg-white-2 rounded-lg p-4 xl:mx-auto xxl:mx-auto hidden">
      <img src="https://scuola-maria.s3-ap-southeast-1.amazonaws.com/local-dev/asset/thumnail/advantage/DLPReason5.png" alt=""
      class="object-contain object-center mx-auto">
    </div>
  </div>


  <div class="text-center max-w-xs ml-auto my-5 xl:mx-auto xxl:mx-auto">
    <p class="
    mx-auto
    text-xl
    not-italic
    font-semibold
    leading-7
    text-dark-3
    my-3
    ">Advantages of Distance Learning</p>

    <p class="
    text-justify
    mx-5
    text-base
    not-italic
    font-normal
    leading-snug
    ">While we understand and value the benefits of
    face-to-face education, here are some true advantages of distance learning.
  </p> -->

  <!-- <p class="
  my-5
  text-primary
  font-normal
  not-italic
  leading-snug
  text-base
  ">
  <a href="">Read more ></a>
</p> -->
<!-- </div>
</div> -->
<!--  -->
<!-- <div class="">
  <div class="max-w-xs md:w-full xl:w-full bg-white-2 rounded-lg p-4">
    <video id="smpv"
    class="video-js vjs-4-3 vjs-big-play-centered"
    controls
    poster="{{ url('asset/landing/bgs.svg') }}"
    data-setup='{"playbackRates": [1, 1.5, 2], "autoplay": false}'>
    <source src="https://scuola-maria.s3-ap-southeast-1.amazonaws.com/local-dev/asset/video/ScM DLP Final Promotional Video.mp4"
    type="video/mp4" />
  </video>
</div>

<div class="text-center max-w-xs xl:mr-auto xxl:mr-auto xxl:mt-10 my-5">

  <p class="mx-auto text-xl not-italic font-semibold leading-7 text-dark-3 md:mt-6 md:mb-3 lg:mt-6 xl:mx-auto xxl:mx-auto">
    Scoula Maria Promotional Video</p>

    <p class="text-base not-italic font-normal leading-snug text-justify mx-5">
      In the Distance Learning Program, families can stay healthy, protected, and complete.
    </p> -->

    <!-- <p class="my-5 text-primary font-normal not-italic leading-snug text-base">
    <a href="">Read more ></a>
  </p> -->
<!-- </div>
</div>

</div>
</div> -->
<!-- END BLOGS -->

<div class="flex flex-col relative =">
  <img src="{{ asset('landing_asset/img/call.svg') }}"
  alt="" width="100%" class="mt-5">
  <div class="row">

  </div>
     <button type="button" name="button" class="btn login-btn-foot"> <a href="{{ url('/login') }}">Join For Free</a> </button>
</div>




</body>
</html>
