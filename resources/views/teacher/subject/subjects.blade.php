@extends('dashboardTemplate.main')

@section('content')
<div class="container my-5">
  <div class="row">
    <div class="col-lg-10 col-md-10">
      <div class="page-content">
        @include('teacher.layout.header')
        <div class="card mt-5">
          <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-line " id="lineTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-line-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">All Subjects</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " id="publish-line-tab" data-toggle="tab" href="#publish" role="tab" aria-controls="home" aria-selected="true">Publish</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-line-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">For Approval</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="draft-line-tab" data-toggle="tab" href="#draft" role="tab" aria-controls="profile" aria-selected="false">Drafts</a>
              </li>
            </ul>
            <div class="tab-content mt-3 p-2" id="lineTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-line-tab">
                <div class="row">
                  @foreach($all as $ol)
                  <div class="col-lg-4 col-md-4">
                    <div class="card subj-container">
                      <a href="{{ url('/teacher/subject').'/'.$ol->s_uuid }}">
                      <div class="card-header">
                        @if($ol->photo)
                        <img src="https://scuola-maria.s3-ap-southeast-1.amazonaws.com/local-dev/subjects/{{ $ol->s_uuid }}/subject-thumbnail/{{$ol->photo}}"
                        class="card-img-top" alt="">
                        @else
                        <img src="{{ asset('asset/landing/teacher/subj/ap.png') }}" class="card-img-top" alt="...">
                        @endif
                      </div>
                      </a>
                      <div class="card-body">
                        <h5 class="card-text">{{ $ol->subject.' '.$ol->grade}}</h5>
                        <p class="subj-author">{!! Helper::getUserInfo('name') !!}</p>
                        <p class="card-text"><i class="mdi mdi-account" style="color:#33A3EF;"></i> 50</p>
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                      </div>
                      <div class="card-footer">
                        <div class="row">
                          <div class="col-lg-6 col-md-6">
                              <p class="card-text" style="font-size:8px;"><i class="mdi mdi-brightness-1" style="color:#6AC04C;"></i> 50 Active Students</p>
                          </div>
                          <div class="col-lg-6 col-md-6">
                            <p class="card-text" style="font-size:10px;"><i class="mdi mdi-clock" style="color:#228DD5;"></i> April 19,200</p>
                          </div>
                        </div>
                        <p class="card-text" style="font-size:12px;"><i class="mdi mdi-book-variant" style="color:#33A3EF;"></i> 10 Topics</p>
                      </div>
                    </div>
                  </div>
                  @endforeach


                </div>

              </div>

              <div class="tab-pane fade " id="publish" role="tabpanel" aria-labelledby="publish-line-tab">

              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-line-tab">
              </div>
              <div class="tab-pane fade" id="draft" role="tabpanel" aria-labelledby="draft-line-tab">
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
