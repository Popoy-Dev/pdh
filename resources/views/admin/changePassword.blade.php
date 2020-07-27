@extends('dashboardTemplate.main')

@section('content')
<div class="container my-5">
  <div class="row">
    <div class="col-lg-10 col-md-10">
      <div class="page-content">
        @include('admin.layout.header')
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body" style="padding:1rem !important;">
              <div class="row">
                <div class="col-lg-6 col-md-7 col-sm-6 col-6">
                  <h5 class="text-justify-center nav-style">Change Password</h5>
                  <div class="row">
                    <div class="col-lg-12 col-md-8 mt-5">
                      <form id="form-change-password" role="form" method="POST" action="{{ url('/password/change') }}" novalidate class="form-horizontal">
                          <label for="current-password" class="col-sm-12 control-label">Current Password</label>
                            <div class="form-group">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input type="password" class="form-control" id="current-password" name="current-password" placeholder="Password">
                            </div>
                          <label for="password" class="col-sm-12 control-label">New Password</label>
                            <div class="form-group">
                              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                          <label for="password_confirmation" class="col-sm-12 control-label">Re-enter Password</label>
                            <div class="form-group">
                              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-enter Password">
                            </div>
                        <div class="form-group">
                          <div class="col-sm-offset-5 col-sm-6">
                            <button type="submit" class="btn btn-danger">Submit</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-7 col-sm-6 col-6">
                  <h5 class="text-justify-center nav-style">Reset Password</h5>
                  <div class="row">
                    <div class="col-lg-12 col-md-8 mt-5">
                      <form id="form-change-password" role="form" method="POST" action="{{ url('/reset/password') }}" novalidate class="form-horizontal">
                          <label for="" class="col-sm-12 control-label">User Email Address</label>
                            <div class="form-group">
                              <input type="email" class="form-control" id="" name="email" placeholder="Password">
                            </div>
                        <div class="form-group">
                          <div class="col-sm-offset-5 col-sm-6">
                            <button type="submit" class="btn btn-danger">Reset Password</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
