@extends('dashboardTemplate.main')

@section('content')

<div class="container my-5">
  <div class="row">
    <div class="col-lg-10 col-md-10">
      <div class="page-content">
        <div class="card">
          <div class="card-body">
            <form action="{{ url('/admin/create/teacher-account') }}" method="POST" id="frmAddTeacher">
              @csrf
              <div class="form-group row justify-content-center">
                <div class="col-lg-6 col-md-6">
                  <label for="">Email</label>
                  <input type="text" class="form-control email" name="email" value="{{ old('email') }}">
                  <div class="email"></div>
                </div>
              </div>

              <div class="form-group row justify-content-center">
                <div class="col-lg-6 col-md-6">
                  <label for="">Password</label>
                  <input type="password" class="form-control pw" name="password">
                  <div class="password"></div>
                </div>
              </div>

              <div class="form-group row justify-content-center">
                <div class="col-lg-6 col-md-6">
                  <label for="">Confirm Password</label>
                  <input type="password" class="form-control cpw" name="password_confirmation">
                  <div class="password_confirmation"></div>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6">
                  <div class="form-check form-check-flat form-check-primary mt-0">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input showPassword">
                      Show password
                      <i class="input-frame"></i></label>
                    </div>
                  </div>
                </div>
                <div class="form-group row justify-content-around">
                  <div class="col-lg-6 col-md-6">
                    <button type="submit" class="btn btn-block pay-tution"><i class="mdi mdi-content-save"></i> Save</button>
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
@endsection
