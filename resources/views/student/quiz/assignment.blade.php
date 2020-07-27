@extends('dashboardTemplate.main')

@section('content')
<div class="container my-5">
  <div class="row">
    <div class="col-lg-10 col-md-10">
      <div class="page-content">
        <div class="row justify-content-center my-5">
          <div class="col-lg-8 col-md-8">
            <div class="card">
              <div class="card-body text-center" id="start">
                <p class="nav-style my-3">{{$data->quiz_title}}</p>
                <p class="nav-style my-3">{!! $data->quiz_desc!!}</p>
                <p class="nav-style my-3">Passing Score: {{ $data->passing_score }}</p>
                <p class="nav-style my-3">Submission : {{ date('F d, Y g:i A',strtotime($data->time_limit)) }} {{$data->quiz_type == 'sub' ? '' : 'Minutes'}}</p>
                <button class="btn pay-tution btn-block assignment" data-ids="{{ $data->ass_uuid }}">Start Assessment</button>
              </div>
              <div class="card-body">
                @if($data->quiz_type == 'sub')
              <div class="d-none sub">
                <form action="" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <h6>{!!$data->quiz_desc !!}</h6>
                  </div>
                  <div class="form-group">
                    <input type="file" class="form-control" name="student_file">
                  </div>
                  <div class="form-group">
                    <button class="btn pay-tution float-right"><i class="mdi mdi-content-save"></i> Submit</button>
                  </div>
                </form>
              </div>
                @else
                <body id="slickQuiz">

                  <div class="quizArea">
                    <div class="quizHeader">
                      <!-- where the quiz main copy goes -->

                      <a class="button startQuiz" href="#">Get Started!</a>
                    </div>

                    <!-- where the quiz gets built -->
                  </div>

                  <div class="quizResults">
                    <h3 class="quizScore">You Scored: <span><!-- where the quiz score goes --></span></h3>

                    <h3 class="quizLevel"><strong>Ranking:</strong> <span><!-- where the quiz ranking level goes --></span></h3>

                    <div class="quizResultsCopy">
                      <!-- where the quiz result copy goes -->
                    </div>
                  </div>
                </body>
                @endif
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
