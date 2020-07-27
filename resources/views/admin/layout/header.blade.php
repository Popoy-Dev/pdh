<div class="row">
  <div class="col-lg-6">
  <div class="card">
    <div class="card-body" style="padding:1rem !important;">
      <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-6 col-6">
          <h3>{{$data}}</h3>
        </div>

      </div>
    </div>
  </div>
</div><div class="col-lg-6">
  <div class="card">
    <div class="card-body" style="padding:1rem !important;">
      <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-6 col-6">
          <p class="text-justify nav-style">Hello, {{ Auth::guard('admin')->user()->name }}</p>
          <p>Number of user is {{ Helper::countUser()}} </p>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-6 col-6">
          <img src="{{ asset('asset/landing/avatar').'/'.Auth::guard('admin')->user()->photo }}" alt="" class="img-fluid ml-3" width="115" height="115" style="margin-top:-50px !important;">
        </div>
      </div>
    </div>
  </div>
</div>
</div>
e
