@extends('dashboardTemplate.main')

@section('content')
<div class="container my-5">
  <div class="row">
    <div class="col-lg-10 col-md-10">
      <div class="page-content">
        <div class="row my-5 justify-content-center">
          <div class="col-lg-10 col-md-10">
            <div class="card">
              <div class="card-body">
                <div class="row mx-3 my-3  justify-content-center">
                  <div class="col-md-12 text-center">
                    <h2 class="font-weight-bold">Topic Learning Material added successfully!</h2>
                    <!-- <p>Would you like to add an assessment/quiz for this Topic?</p> -->
                  </div>
<!-- No, I would not add an assessment -->
                  <div class="col-md-8">
                    <a href="{{ url('/teacher/topic/learning-material') .'/'. $data->t_uuid}}" class="btn pay-tution btn-block">Move To LEARNING MATERIAL</a>
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
