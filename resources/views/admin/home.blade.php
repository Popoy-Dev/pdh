@extends('dashboardTemplate.main')

@section('content')
<div class="container my-5">
  <div class="row3">
    <div class="col-lg-10 col-md-10">
      <div class="page-content">
        <div class="card my-5">
          <div class="card-body count-body">
            <div class="row justify-content-center">
              <div class="col-lg-3 col-md-3">
                <div class="card">
                  <div class="card-body counter-bg" style="padding:1rem !important;">
                    <div class="text-center">
                    <p class="style counter white">{{$data}}</p>
                    <p class="text style white">No. of Registered {{ $data > 0 ? 'Users' :'User'}}</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-3">
                <div class="card">
                  <div class="card-body counter-bg" style="padding:1rem !important;">
                    <div class="text-center">
                    <p class="style counter white">0</p>
                    <p class="text style white">Enrolled Student</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-3">
                <div class="card">
                  <div class="card-body counter-bg" style="padding:1rem !important;">
                    <div class="text-center">
                    <p class="style counter white">{{$subject}}</p>
                    <p class="text style white">Total Subjects</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-3">
                <div class="card">
                  <div class="card-body counter-bg" style="padding:1rem !important;">
                    <div class="text-center">
                    <p class="style counter white">0</p>
                    <p class="text style white">Paid Student</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline mb-2">
                <h6 class="card-title mb-0">Grade Level</h6>
              </div>
              <div class="monthly-sales-chart-wrapper">
                <canvas id="gradeperlevel"></canvas>
              </div>
            </div>
          </div>
        </div>
        </div>


        <div class="row justify-content-center mt-3">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <td>ID</td>
                        <td>Email</td>
                        <td>Fullname</td>
                        <td>Gender</td>
                        <td>Address</td>
                        <td>Date Enrolled</td>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($user as $sr)
                      <tr>
                        <td>{{$sr->lrn_no}}</td>
                        <td>{{ $sr->email }}</td>

                        <td>{{ $sr->firstname.' '.$sr->middlename.' '.$sr->lastname}}</td>
                        <td>{{ $sr->gender == 'm' ? 'Male':'Female'}}</td>
                        <td>{{ $sr->address }}</td>
                        <td>{{ date('F d, Y',strtotime($sr->created_at))}}</td>
                      </tr>
                      @endforeach
                    </tbody>

                  </table>

                </div>
                <div class="mt-3">
                  {{ $user->links('pagination::bootstrap-4') }}
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
