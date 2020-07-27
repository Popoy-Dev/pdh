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
                <p class="nav-style my-3">{!!$data->quiz_desc!!}</p>
                <p class="nav-style my-3">Passing Score: {{ $data->passing_score }}</p>
                <p class="nav-style my-3">Time Limit: {{ $data->time_limit }} Minutes</p>
                <button class="btn pay-tution btn-block activity" data-ids="{{ $data->act_uuid }}">Start Assessment</button>
              </div>
              <div class="card-body">
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
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
