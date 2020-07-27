<div class="row">
  <div class="col-lg-6">
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Change Avatar
  </button> -->
  <div class="my-4">
    <p class="nav-style text-dashboard">
      @if(last(request()->segments()) == 'home')
      DASHBOARD
      @elseif(last(request()->segments()) == 'subjects')
      MY SUBJECTS
      @endif
    </p>
    @if(last(request()->segments()) == 'home')
    <h3 class="nav-style" style="font-size: 30px;">Welcome Teacher!</h3>
    @endif
  </div>
</div>
<div class="col-lg-6">
  <div class="card">
    <div class="card-body" style="padding:1rem !important;">
      <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-6 col-6">
          <p class="text-justify nav-style">Hello, {{ Auth::guard('teacher')->user()->first_name }}</p>
          <p class="text-justify nav-style">Would you like take a tour first?</p>
          <a class="btn btn-tour ml-5 mt-3" href="javascript:void(0);" onclick="javascript:introJs().start();">Start</a>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-6 col-6">
          @if(Auth::guard('teacher')->user()->photo)
          <img src="{{ asset('asset/landing/avatar').'/'.Auth::guard('teacher')->user()->photo }}"
          alt="" class="img-fluid ml-3" width="115" height="115" style="margin-top:-50px !important;">

          @else
          <img src="{{ asset('asset/landing/avatar/avatar2.svg') }}"
          alt="" class="img-fluid ml-3" width="115" height="115" style="margin-top:-50px !important;">
          @endif
        </div>
      </div>
    </div>
  </div>
</div>


</div>
