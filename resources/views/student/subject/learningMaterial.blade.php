@extends('dashboardTemplate.main')

@section('content')
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-10 col-md-10">

      <div class="page-content">
        <div class="card">
          <div class="card-body">
            <h1 class="font-weight-bold nav-style mb-3">{{ $topic ? $topic->lesson_title : '' }}</h1>
            @if($data->topic_type == 'v')
            <video
            class="video-js vjs-16-9 vjs-big-play-centered"
            controls
            poster="https://scuola-maria.s3-ap-southeast-1.amazonaws.com/local-dev/subjects/{{$topic->s_uuid}}/video-thumbnail/{{$data->v_thumbnail}}"
            data-setup='{"playbackRates": [1, 1.5, 2], "autoplay": false}'
            >
            <source src="https://scuola-maria.s3-ap-southeast-1.amazonaws.com/local-dev/subjects/{{$topic->s_uuid}}/video/{{$data->file}}"
              type="video/mp4" />
            </video>
            @elseif($data->topic_type == 'f' || $data->topic_type == 'p')
            <div class="embed-responsive embed-responsive-16by9">
              <iframe src="https://docs.google.com/gview?url=$urlencode&embedded=true" class="embed-responsive-item"></iframe>
            </div>
            @elseif($data->topic_type == 'u')
            <div class="embed-responsive embed-responsive-16by9">
              <iframe src="{{ str_replace('watch?v=','embed/',$data->file) }}" class="embed-responsive-item" allowfullscreen></iframe>
            </div>
            @endif
          </div>
        </div>


        <div class="row mt-5">

          <div class="col-lg-8 col-md-8">
            <div class="card">
              <div class="card-body">
                <div class="row justify-content-center">
                  <div class="col-lg-6 col-md-6">
                    <h3>Subject Navigation</h3>
                  </div>
                  @php
                  $nextPage =  Helper::nextPage($topic->sid,$topic->sort);
                  $prevPage =  Helper::prevPage($topic->sid,$topic->sort);
                  @endphp
                  <div class="col-lg-6 col-md-6">
                    <div class="btn-group d-flex" role="group" aria-label="Basic example">
                      @if($nextPage)
                      <a href="{{ url('/learning-material').'/'.$topic->s_uuid.'/'.$nextPage->t_uuid }}" class="btn pay-tution">Next <i class="mdi  mdi-chevron-right"></i></a>
                      @elseif($prevPage)
                      <a href="{{ url('/learning-material').'/'.$topic->s_uuid.'/'.$prevPage->t_uuid }}" class="btn instructional"><i class="mdi mdi-chevron-left"></i> Prev</a>
                      @else

                      @endif
                    </div>
                  </div>
                </div>
                <div class="accordions">
                  @if($inst->isNotEmpty())
                  @foreach($inst as $in)
                  <div class="accordion-item">
                    <div class="accordion-title" data-tab="{{ $in->i_uuid}}">
                      <h2>{{ $in->title }}<i class="mdi mdi-chevron-down"></i></h2>
                    </div>
                    <div class="accordion-content" id="{{ $in->i_uuid}}">
                      <ol class="lesson-list">
                        @foreach(Helper::getLesson($in->id)->sortBy('sort') as $dt)
                        <?php
                        $uuid = Helper::getTopic($dt->id);
                        if($uuid){
                          $uuid = $uuid->t_uuid;
                        }else{
                          $uuid = '';
                        }
                        ?>
                        <li class="lesson-list-item">
                          @if($uuid == $tp)
                          <p class="active-list">
                            @else
                            <p class="active">
                              @endif
                              {!!$dt->lesson_title!!}
                            </p>
                          </li>
                          @endforeach
                        </ol>
                      </div>
                    </div>
                    @endforeach
                    @endif
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-8">
              <div class="card">
                <div class="card-body">

                  <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">
                      {{ count($act) > 1 ? 'Assessments':'Assessment' }}
                    </a>
                    @if($quiz->isNotEmpty())
                    @foreach($quiz as $tq)
                    <a href="{{ url('/topic-assessment',$tq->ta_uuid) }}" class="list-group-item list-group-item-action">{{$tq->quiz_title}}</a>
                    @endforeach
                    @else
                    <a href="#" class="list-group-item list-group-item-action text-center text-danger">No Data Found</a>
                    @endif
                  </div>

                  <div class="list-group my-2">
                    <a href="#" class="list-group-item list-group-item-action active">
                      {{ count($act) > 1 ? 'Activities':'Activity' }}
                    </a>
                    @if($act->isNotEmpty())
                    @foreach($act as $tq)
                    <a href="{{ url('/activity',$tq->act_uuid) }}" class="list-group-item list-group-item-action">{{$tq->quiz_title}}</a>
                    @endforeach
                    @else
                    <a href="#" class="list-group-item list-group-item-action text-center text-danger">No Data Found</a>
                    @endif
                  </div>

                  <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">
                      {{ count($ass) > 1 ? 'Assignments':'Assignment' }}
                    </a>
                    @if($ass->isNotEmpty())
                    @foreach($ass as $tq)
                    <a href="{{ url('/assignment',$tq->ass_uuid) }}" class="list-group-item list-group-item-action">{{$tq->quiz_title}}</a>
                    @endforeach
                    @else
                    <a href="#" class="list-group-item list-group-item-action text-center text-danger">No Data Found</a>
                    @endif
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
