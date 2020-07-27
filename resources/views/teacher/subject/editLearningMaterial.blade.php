@extends('dashboardTemplate.main')

@section('content')
<div class="container my-5">
  <div class="row">
    <div class="col-lg-10 col-md-10">
      <div class="page-content">
        <nav class="page-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/teacher/subject',$sub->s_uuid) }}">{{ $sub ? $sub->subject.' '.$sub->grade : ''}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$data ? $data->topic_title : ''}}</li>
          </ol>
        </nav>
        <div class="row justify-content-center">
          <div class="col-lg-8 col-md-8">
            <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                  <div class="d-flex align-items-center flex-wrap text-nowrap">
                    <button type="button" class="btn instructional btn-icon-text mr-2 d-block"
                    data-toggle="modal"
                    data-target="#addTopicQuiz"
                    >
                    <i class="btn-icon-prepend" data-feather="plus"></i>
                    Add Assessment
                  </button>
                  <button type="button" class="btn pay-tution btn-icon-text " data-toggle="modal" data-target="#editModule" style="height:35px;">
                    <i class="btn-icon-prepend" data-feather="edit-2"></i>
                    Edit
                  </button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h5 class="font-weight-bold nav-style mb-3">{{ $data->topic_title }}</h5>
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
        </div>

        <div class="col-lg-4 col-md-4">
          <div class="card">
            <div class="card-body">

              <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active">
                  Assessment
                </a>
                @if($topicQuiz->isNotEmpty())
                @foreach($topicQuiz as $tq)
                <a href="{{ url('/teacher/quiz/topic',$tq->ta_uuid)}}" class="list-group-item list-group-item-action">{{$tq->quiz_title}}</a>
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
                <a href="{{ url('/teacher/activity',$tq->act_uuid) }}" class="list-group-item list-group-item-action">{{$tq->quiz_title}}</a>
                @endforeach
                @else
                <a href="#" class="list-group-item list-group-item-action text-center text-danger">No Data Found</a>

                @endif
              </div>

              <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active">
                  {{ count($ass) > 1 ? 'Assignments':'Assignment' }}
                </a>
                @if($act->isNotEmpty())

                @foreach($ass as $tq)
                <a href="{{ url('/teacher/assignment',$tq->ass_uuid) }}" class="list-group-item list-group-item-action">{{$tq->quiz_title}}</a>
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

<div class="modal fade" id="editModule" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Learning Material</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  id="frmEditTopic" method="POST"
        action="{{ url('/teacher/edit/learning-material') }}"
        enctype="multipart/form-data"
        >
        @csrf
        <input type="text" name="ids" value="{{ $data->id }}" hidden>
        <input type="text" name="s_uuid" class="form-control" value="{{$topic->s_uuid}}" hidden>

        <div class="form-group">
          <div class="progress my-3" style="height: 14px;">
            <div class="progress-bar grad-progress-3" role="progressbar" style="width: 0%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>

        <div class="form-group">
          <label>Title:</label>
          <input type="text" name="title" class="form-control" value="{{$data->topic_title}}">
        </div>
        <div class="title"></div>

        @if($data->topic_type == 'v')

        <div class="form-group">
          <label>Course Material:</label>
          <input type="file" name="mp4" class="form-control cm">
        </div>

        <div class="form-group">
          <label>Video Thumbnail:</label>
          <input type="file" name="v_thumbnail" class="file" data-default-file="https://scuola-maria.s3-ap-southeast-1.amazonaws.com/local-dev/subjects/{{$topic->s_uuid}}/video-thumbnail/{{$data->v_thumbnail}}">
        </div>
        <div class="mp4"></div>
        <div class="v_thumbnail"></div>
        <div class="form-group">
          <video
          class="video-js vjs-16-9 vjs-big-play-centered"
          controls
          poster="https://scuola-maria.s3-ap-southeast-1.amazonaws.com/local-dev/subjects/{{$topic->s_uuid}}/video-thumbnail/{{$data->v_thumbnail}}"
          data-setup='{"playbackRates": [1, 1.5, 2], "autoplay": false}'
          >
          <source src="https://scuola-maria.s3-ap-southeast-1.amazonaws.com/local-dev/subjects/{{$topic->s_uuid}}/video/{{$data->file}}"
            type="video/mp4" />
          </video>
        </div>


        @elseif($data->topic_type == 'f' || $data->topic_type == 'p')
        <div class="form-group">
          <label>Course Material:</label>
          <input type="file" name="files" class="file-upload" data-default-file="{{$data->file}}">
        </div>
        @else
        <label>Course Material:</label>
        <input type="text" name="url" class="form-control" value="{{$data->file}}">
        @endif
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn_editModule">Save changes</button>
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Add quiz -->
<div class="modal fade" id="addTopicQuiz" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:350px!important;">
    <div class="modal-content">
      <div class="modal-header " style="background: #228DD5;color:#fff;">
        <h5 class="modal-title mx-auto" id="exampleModalLabel">Quiz</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" id="frmTopicAssess"
      action="{{ url('/teacher/add/topic-assessment')}}"
      enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
        <input type="text"  class="data-ids" name="ids" value="{{ $topic->t_id }}" hidden>
        <div class="form-group">
          <label for="" class="nav-style" style="font-size:16px;">Title</label>
          <input type="text" class="form-control lesson" name="quiz_title">
        </div>


        <div class="form-group">
          <label for="">Type</label>
          <select name="type_of_quiz" id="" class="form-control lesson" style="border-radius: 10px!important;">
            <option selected disabled>Type</option>
            <option value="act">Activity</option>
            <option value="quiz">Quiz</option>
            <option value="ass">Assignment</option>
          </select>
        </div>

        <!-- <div class="form-group">
        <label for="">No. of Items</label>
        <input type="text" class="form-control lesson" name="quiz_item">
      </div>
      <div class="custom-control custom-checkbox custom-control-inline ml-4">
      <input type="checkbox" class="custom-control-input time" id="customCheck" name="">
      <label class="custom-control-label nav-style" for="customCheck" style="font-size:15px;">Time Limit</label>
    </div>
    <div class="custom-control custom-checkbox custom-control-inline ml-4">
    <input type="checkbox" class="custom-control-input p_score" id="customCheck1" name="">
    <label class="custom-control-label nav-style" for="customCheck1" style="font-size:15px;">Passing Score</label>
  </div> -->

  <!-- <div class="row justify-content-center my-2 div_time d-none">
  <div class="col-lg-4 col-md-4">
  <input type="text" name="time_limit" class="form-control form-control-sm lesson">
</div>
<div class="col-lg-6 col-md-6">
<p class="nav-style" style="font-size:16px;">Minutes</p>
</div>
</div>

<div class="row justify-content-center my-2 div_score d-none">
<div class="col-lg-4 col-md-4">
<input type="text" name="passing_score" class="form-control form-control-sm lesson">
</div>
<div class="col-lg-6 col-md-6">
<p class="nav-style" style="font-size:16px;">Passing Score</p>
</div>
</div> -->

</div>
<div class="modal-footer text-center">
  <button type="submit" class="btn pay-tution mx-auto">Create</button>
</div>
</form>
</div>
</div>
</div>
<!-- end quiz -->
@endsection
