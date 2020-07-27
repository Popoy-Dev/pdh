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
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-md-10">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <img src="https://scuola-maria.s3-ap-southeast-1.amazonaws.com/local-dev/subjects/{{ $data->s_uuid }}/subject-thumbnail/{{$data->photo}}" alt="" class="img-fluid" width="350" >
            </div>

            <div class="col-lg-4 col-md-4">
              <div class="py-5">
                <h3>{{$data->subject .' '. $data->grade}}</h3>
                <h5>{{ $data->first_name .' '. $data->last_name }} </h5>
                <div class="progress my-4">
                  <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">25%</div>
                </div>
                <button class="btn btn-start-learning">Start Learning</button>
              </div>
            </div>
            <div class="col-lg-2 col-md-2"></div>
          </div>

          <div class="row mt-2">
            <div class="col-lg-8 col-md-8">
              <div class="card">
                <div class="card-body">
                  <p class="nav-style sub-title mb-3">
                    Subject Description:
                  </p>
                  <p class="nav-style sub-desc my-3">
                    {!! $data->description !!}
                  </p>

                  <div class="container">
                    <div class="accordions">
                      <p class="nav-style sub-title mb-2">Subject Details:</p>
                      @if($subject->isNotEmpty())
                      @foreach($subject as $subj)
                      @if($subj->type == 'a')
                      <div class="accordion-item">
                        <div class="accordion-title" data-tab="{{$subj->i_uuid}}">
                          <h2>{{$subj->title}}<i class="mdi mdi-chevron-down"></i></h2>
                        </div>

                        <div class="accordion-content" id="{{$subj->i_uuid}}">
                          @foreach(Helper::getSubjAssess($subj->id) as $dt)
                          <p class="lesson-list-item" style="padding-left:20px;">
                            <a href="{{ url('/assessment',$dt->sa_uuid) }}">
                              {!!$dt->quiz_title!!}
                            </a>
                          </p>
                          @endforeach
                        </div>
                      </div>
                      @else
                      <div class="accordion-item">
                        <div class="accordion-title" data-tab="{{$subj->i_uuid}}">
                          <h2>{{$subj->title}}<i class="mdi mdi-chevron-down"></i></h2>
                        </div>

                        <div class="accordion-content" id="{{$subj->i_uuid}}">
                          <ol class="lesson-list">
                            @foreach(Helper::getLesson($subj->id)->sortBy('sort') as $dt)
                            <?php
                            $uuid = Helper::getTopic($dt->id);
                            if($uuid){
                              $uuid = $uuid->t_uuid;
                            }else{
                              $uuid = '';
                            }
                            ?>
                            <li class="lesson-list-item">
                              <p>
                                <a href="{{ $uuid ? url('/learning-material').'/'.$data->s_uuid.'/'.$uuid : '#'}}">
                                  {!!$dt->lesson_title!!}
                                </a>
                              </p>
                            </li>
                            @endforeach
                          </ol>
                        </div>
                      </div>
                      @endif
                      @endforeach
                      @endif

                    </div>
                  </div>

                </div>
              </div>
            </div>

            <!-- <div class="col-lg-4 col-md-4">
              <div class="card">
                <div class="card-body">
                  <div>
                    <p class="nav-style sub-title">
                      Assessments
                    </p>
                    <div class="progress my-3 ht-20 text-center" data-label="50% Complete">
                      <div class="progress-bar" role="progressbar" style="width:0%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">
                        25
                      </div>
                      <p class="nav-style sub-desc mx-auto">
                        Quarter 1 No records yet.
                      </p>
                    </div>
                  </div>
                  <div>
                    <p class="nav-style sub-title">
                      Assignments
                    </p>
                    <div class="progress my-3 ht-20" data-label="50% Complete">
                      <div class="progress-bar" role="progressbar" style="width:0%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">
                      </div>
                      <p class="nav-style sub-desc mx-auto">
                        Quarter 1 No records yet.
                      </p>
                    </div>

                  </div>


                </div>
              </div>
            </div> -->
          </div>

        </div>
      </div>



    </div>

  </div>
</div>
@endsection
