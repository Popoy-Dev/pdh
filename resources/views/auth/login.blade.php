@extends('layouts.main')


@section('content')
<style>
  body {
    overflow: hidden; 
  }
 .form-input {
    background: #F3F3F3;
    border-radius: 5px;
    height: 39px;
    border: none;
    margin-bottom: 20px;
  }
  h1.form-header  {
    position: relative;
    padding-top: 50px;
    margin-bottom: 90px;
    font-size: 40px;
    font-family: Nunito;
    font-weight: 700;
    color: #0E269D;
  }
  input:focus {
    border: 1px solid #F3F3F3;
  }
  .btn-signin {
    padding: 8px;
    color: #fff;
    background-color: #0E269D;
    border: none;
    border-radius: 20px;
    font-size: 14px;
    width: 120px;
    
  }
  .circle-1 {
    position: absolute;
    width: 566px;
    height: 566px;
    background-color: #0E269D ;
    border-radius: 50%;
    margin-left: -700px;
    margin-bottom: -300px;
    bottom: 0;
    left: 0;
    z-index: -1
  }
  .circle-2 {
    position: absolute;
    width: 356px;
    height: 356px;
    background-color:  #08CDFF;
    border-radius: 50%;
    right: 0;
    top: 0;
    margin-right: -600px;
    margin-top: -250px;
    z-index: -1;
  }
  .form-card {
    padding: 20px;
    border-top-right-radius: 16px;
    border-bottom-right-radius: 16px;
    margin-left: -50px;
    margin-top: 50px;
    background: #fff;
  }
  .forgot-container {
    margin-top: -20px;
    padding: 10px;
    margin-left: 60px;
  }
  .btn-forgot {
    float: right; font-size: 12px;line-height: 30px;
  }
  /* Laptop Screen */
  @media only screen and (max-width: 1366px) {
    .form-card { margin-top: 10px; margin-left: -26px;padding-bottom: 0; }
    h1.form-header  { padding-top: 20px; margin-bottom: 30px; }
    .forgot-container { margin-top: -20px; }
    .form-input { margin-bottom: 5px; }
    .btn-forgot {line-height: 22px;}
    .forgot-container { margin-left: 25px !important; width: 300px;}
    .invalid-feedback { font-size: 10px !important; }
  }
  @media only screen and (max-width: 1360px) {
    .form-card { margin-top: 10px; margin-left: -26px;padding-bottom: 0; }
    h1.form-header  { padding-top: 20px; margin-bottom: 20px; }
    .forgot-container { margin-top: -20px; }
    .form-input { margin-bottom: 5px; }
    .btn-forgot {line-height: 22px;}
    .forgot-container { margin-left: 25px !important; width: 300px;}
    .invalid-feedback { font-size: 10px !important; }
  }
  @media only screen and (max-width: 1280px) {
    .form-card { margin-top: 10px; margin-left: -26px;padding-bottom: 0; }
    h1.form-header  { padding-top: 20px; margin-bottom: 10px; }
    .forgot-container { margin-top: -20px; }
    .form-input { margin-bottom: 5px; }
    .btn-forgot {line-height: 22px;}
    .forgot-container { margin-left: 25px !important; width: 300px;}
    .invalid-feedback { font-size: 10px !important; }
  }
  /* end laptop screen */

  @media only screen and (max-width: 768px) {
    /* .login-img{ height: 100px;} */
  }
  @media only screen and (max-width: 411px) {
    .img-container{display: none}
    .form-row {margin: auto !important;}
    .form-card {margin-left: 0px;border-top-left-radius: 16px;border-bottom-left-radius: 16px;padding-bottom: 10px;}
    .btn-forgot {line-height: 20px; }
    .forgot-container { margin-left: 20px !important; width: 250px }
    .circle-1 { margin-left: -300px; margin-bottom: -400px; }
    .circle-2 { margin-right: -200px; margin-top: -250px; }
  }
</style>

<div class="login-card" style="background-color: transparent; border-box: none;z-index: 1">
  <div class="row">
    <div class="col-sm-6 img-container" style="z-index: 1;padding: 0;margin:0;">
     <img src="{{url(asset('images/login-img.svg'))}}" alt="" class="img-fluid login-img" >
    </div>
    <div class="col-sm-6">
      <!-- <div align="left"></div><img src="{{url(asset('images/login-img.svg'))}}" alt="" class="img-fluid login-img" > -->
      <div class="card form-card" >
        <form method="POST" action="{{ route('login') }}" class="">
            @csrf
            <div class="form-row ml-4">
              <div class="form-group col-lg-12">
                <h1 class="form-header">Login</h1>
              </div>
            </div>
            <div class="form-row ml-4">
              <!-- <div class="form-group col-lg-1"></div> -->
              <div class="form-group col-lg-10 ">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-input form-control mx-auto @error('email') is-invalid @enderror" name="email" id="" placeholder="">
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              <div class="form-group col-lg-10">
                <label for="exampleInputPassword1">Password</label>
                <input type="password"
                    class="form-input form-control mx-auto @error('password') is-invalid @enderror"
                      id="" name="password"
                      autocomplete="current-password"
                      placeholder="">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
              </div>
              <!-- <div class="form-group col-lg-1"></div> -->
            </div>

            <div class="form-row forgot-container">
              <!-- <div class="form-group col-lg-1"></div> -->
              <div class="form-group col-lg-9">
                <div class="form-check" >
                  <input type="checkbox" class="form-check-input">
                  <label style="font-size: 12px;float: left">Remember me</label>
                  <span class="btn-forgot" style=""><a href="#" >Forgot password?</a></span>
                </div>
                
              </div>
             
              <!-- <div class="form-group col-lg-1"></div> -->
            </div>
            
            <div class="form-row ml-4">
              <div class="form-group col-lg-10">
              <div align="center"><button type="submit" class="btn btn-signin">Sign in</button></div>
              </div>
            </div>

            <div class="form-row ml-4">
              <div class="form-group col-lg-10">
                <div align="center" style="font-size: 14px;"><p>Don't have an account? <span><a href="{{url('/registration')}}"> Sign up</a></span></p></div>
              </div>
            </div>
        </form>
        </div>
    </div>
  </div>
</div>

<div class="circle-1"></div>
<div class="circle-2"></div>

<!-- 
<div class="col-sm-6" style="margin: 0;padding: 0;margin-left: 5;">
    <div class="card"  style="margin-top: 45px;margin-left: -35px;padding-right: 35px;border-radius: 20px;">
    <h2 class="form-header">Login</h2>
        <form  method="POST" action="{{ route('login') }}" class="forms-sample py-5 pr-5 pl-5" style="margin-top: 130px;">
        @csrf
          <div class="form-group mb-4">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-input form-control mx-auto @error('email') is-invalid @enderror" name="email" id="" placeholder="">
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group mb-4">
            <label for="exampleInputPassword1">Password</label>
            <input type="password"
                  class=" form-input form-control mx-auto @error('password') is-invalid @enderror"
                    id="" name="password"
                    autocomplete="current-password"
                    placeholder="">
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
          </div>
          <div class="form-group">
            <div class="form-check" style="margin-left: 20px;">
              <input type="checkbox" class="form-check-input">
              <label style="font-size: 12px;">Remember me</label><span style="float: right;font-size: 12px;"><a href="#">Forgot password?</a></span>
            </div>
          </div>
          
          <div align="center"><button type="submit" class="btn btn-signin mt-3">Sign in</button></div>

          <div class="form-group">
              <div align="center" class="mt-5" style="font-size: 14px;"><p>Don't have an account? <span><a href="{{url('/registration')}}"> Sign up</a></span></p></div>
            </div>
        </form>
    </div>

  </div> -->

@endsection


