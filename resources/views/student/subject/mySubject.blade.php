@extends('dashboardTemplate.main')

@section('content')


<div class="page-content">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-md-10 col-sm-12 col-12">
        <div class="my-4">
          <p class="nav-style text-dashboard">SUBJECTS</p>
          <h3 class="nav-style" style="font-size: 30px;">Welcome Student</h3>
        </div>
        <div class="">
          <span class="float-right">
            <a href="{{ url('/subject-grid') }}">
              <i class="icon link-icon" data-feather="grid"></i>
            </a>
          </span>
          <span class="mx-3 float-right">
            <a href="{{ url('/subject-list') }}">
              <i class="icon link-icon" data-feather="list"></i>
            </a>
          </span>
        </div>

      </div>
    </div>

    @yield('subject')

  </div>
</div>


@endsection
