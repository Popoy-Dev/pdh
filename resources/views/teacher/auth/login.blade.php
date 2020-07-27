@extends('layouts.main')


@section('content')

<div class="card">
  <div class="row">
    <div class="col-lg-4 col-md-4" style="background-image: url(/asset/landing/teacher/teacher-side-login.svg);background-repeat: no-repeat;background-size:cover; !important;">

    </div>
    <div class="col-lg-8 col-md-8 text-center">
      <div class="auth-form-wrapper py-4">
        <img src="{{ asset('asset/landing/no-name.svg') }}" alt="" class="img-fluid my-3" width="134" height="134">
        <h3>Teacher Login</h3>
        <form method="POST" action="{{ url('/teacher/login') }}">
          @csrf
          <div class="form-group p-2 my-3">
            <input type="email" class="form-control mx-auto @error('email') is-invalid @enderror" name="email" id="exampleInputEmail1" placeholder="Email Address"  >
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group p-2 my-2">
            <input type="password"
            class="form-control mx-auto @error('password') is-invalid @enderror"
            id="exampleInputPassword1" name="password"
            autocomplete="current-password"
            placeholder="Password">
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            <small class="mr-5 float-right text-muted">Forgot Password?</small>
          </div>

          <div class="my-5">
            <button type="submit" class="btn btn-scuola-primary mr-2 mb-2 mb-md-0">Login</button>
          </div>
      </div>

    </div>
  </div>
</div>
</div>

@endsection
