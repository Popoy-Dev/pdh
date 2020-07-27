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
  }
  .form-header  {
    position: relative;
    margin-left: 50px;
    padding-top: 50px;
    font-size: 40px;
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
    background-color: #08CDFF;
    border-radius: 50%;
    margin-left: -200px;
    margin-bottom: -200px;
    bottom: 0;
    left: 0;
  }
  .circle-2 {
    position: absolute;
    width: 356px;
    height: 356px;
    background-color: #0E269D ;
    border-radius: 50%;
    right: 0;
    top: 0;
    margin-right: -100px;
    margin-top: -100px;
  }
</style>

<div class="login-card" style="background-color: transparent; border-box: none;">
  <div class="row" style="margin: 0;padding: 0;">

    <div class="col-sm-6" style="margin: 0;padding: 0;margin-right: 5;">
      <div class="card"  style="margin-top: 35px;margin-right: -35px;padding-right: 35px;border-radius: 20px;">
      <h2 class="form-header">Create an account.</h2>
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
            <div class="form-group mb-4">
              <label for="exampleInputPassword1">Confirm Password</label>
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
           
            
            <div align="center"><button type="submit" class="btn btn-signin mt-3">Sign up</button></div>

            <div class="form-group">
                <div align="center" class="mt-4" style="font-size: 14px;"><p>Already have an account? <span><a href="{{url('/login')}}"> Sign in</a></span></p></div>
              </div>
          </form>
      </div>
  
    </div>


    <div class="col-sm-6" style="margin: 0;padding: 0;margin-right: 5;z-index: 1">
      <div align="left"></div><img src="{{url(asset('images/signup-img.svg'))}}" alt="" class="img-fluid login-img" >
    </div>

    </div>
  </div>
</div>

<div class="circle-1"></div>
<div class="circle-2"></div>

@endsection
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
  }
  .form-header  {
    position: relative;
    margin-left: 50px;
    padding-top: 50px;
    font-size: 40px;
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
    background-color: #08CDFF;
    border-radius: 50%;
    margin-left: -200px;
    margin-bottom: -200px;
    bottom: 0;
    left: 0;
  }
  .circle-2 {
    position: absolute;
    width: 356px;
    height: 356px;
    background-color: #0E269D ;
    border-radius: 50%;
    right: 0;
    top: 0;
    margin-right: -100px;
    margin-top: -100px;
  }
</style>

<div class="login-card" style="background-color: transparent; border-box: none;">
  <div class="row" style="margin: 0;padding: 0;">

    <div class="col-sm-6" style="margin: 0;padding: 0;margin-right: 5;">
      <div class="card"  style="margin-top: 35px;margin-right: -35px;padding-right: 35px;border-radius: 20px;">
      <h2 class="form-header">Create an account.</h2>
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
            <div class="form-group mb-4">
              <label for="exampleInputPassword1">Confirm Password</label>
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
           
            
            <div align="center"><button type="submit" class="btn btn-signin mt-3">Sign up</button></div>

            <div class="form-group">
                <div align="center" class="mt-4" style="font-size: 14px;"><p>Already have an account? <span><a href="{{url('/login')}}"> Sign in</a></span></p></div>
              </div>
          </form>
      </div>
  
    </div>


    <div class="col-sm-6" style="margin: 0;padding: 0;margin-right: 5;z-index: 1">
      <div align="left"></div><img src="{{url(asset('images/signup-img.svg'))}}" alt="" class="img-fluid login-img" >
    </div>

    </div>
  </div>
</div>

<div class="circle-1"></div>
<div class="circle-2"></div>

@endsection
