@extends('dashboardTemplate.main')

@section('content')
<div class="container my-5">
  <div class="row">
    <div class="col-lg-10 col-md-10">
      <div class="page-content">
        <nav class="page-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/teacher/topic/learning-material',$sub->t_uuid) }}">{{$sub ? $sub->topic_title : ''}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$data ? $data->quiz_title : ''}}</li>
          </ol>
        </nav>
        <div class="row">
          <div class="col-lg-10 col-md-10">
            <div class="card">
              <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-line question-tabs " id="lineTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active"
                    id="home-line-tab"
                    data-toggle="tab"
                    href="#home"
                    role="tab"
                    aria-controls="home"
                    aria-selected="true">Quiz Details</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link"
                    id="publish-line-tab"
                    data-toggle="tab"
                    href="#publish"
                    role="tab"
                    aria-controls="home"
                    aria-selected="true">Make a Question</a>
                  </li>
                  <li class="nav-item nav-style">
                    <a class="nav-link"
                    id="profile-line-tab"
                    data-toggle="tab"
                    href="#profile"
                    role="tab"
                    aria-controls="profile"
                    aria-selected="false">Questionnaire</a>
                  </li>

                </ul>
                <div class="tab-content mt-3 p-2" id="lineTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-line-tab">
                    <form id="frmEditTopicAssessment" method="POST" data-ids="{{ $data->ta_uuid }}"
                      action="{{ url('/teacher/edit/topic-assessment').'/'. $data->ta_uuid }}">
                      @csrf
                      <div class="row justify-content-center">
                        <input type="text" name="ids" value="{{$data->t_id}}" hidden>
                        <div class="col-lg-10 col-md-10">
                          <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="quiz_title"
                            value="{{$data ? $data->quiz_title : ''}}"
                            class="form-control lesson">
                          </div>

                          <div class="form-group">
                            <label for="">Instruction</label>
                              <textarea name="instruction" rows="8" cols="80" class="questionnaire">{!!$data->quiz_desc!!}</textarea>
                          </div>

                          <div class="form-group">
                            <label for="">Type of Question</label>
                            <select class="form-control lesson" name="quiz_type" style="border-radius:10px;">
                              <option value="mc" {{ $data->quiz_type == 'mc' ? 'selected' : ''}}>Multiple Choice</option>
                              <option value="id" {{ $data->quiz_type == 'id' ? 'selected' : ''}}>Identification</option>
                              <option value="ey" {{ $data->quiz_type == 'ey' ? 'selected' : ''}}>Essay</option>
                              <option value="tof" {{ $data->quiz_type == 'tof' ? 'selected' : ''}}>True or False</option>
                              <option value="ran" {{ $data->quiz_type == 'ran' ? 'selected' : ''}}>Random</option>
                            </select>
                          </div>

                          <!-- <div class="form-group">
                          <label for="">No. of Items</label>
                          <input type="text" class="form-control lesson" name="">
                        </div> -->
                        <div class="form-group">
                          <label for="">No. of Items</label>
                          <input type="text" class="form-control lesson" name="quiz_item" value="{{ $data ? $data->quiz_item : ''}}">
                        </div>

                        <div class="form-group">
                          <label for="">Time limit</label>
                          <input type="text" class="form-control lesson"
                          name="time_limit" value="{{ $data ? $data->time_limit : '' }} Minutes">
                        </div>

                        <div class="form-group">
                          <label for="">Passing Score</label>
                          <input type="text" class="form-control lesson" name="passing_score" value="{{ $data ? $data->passing_score : ''}}">
                        </div>

                        <!-- <div class="custom-control custom-checkbox ml-4">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="">
                        <label class="custom-control-label nav-style" for="customCheck" style="font-size:15px;">Time Limit</label>
                      </div> -->

                      <!-- <div class="row justify-content-center my-2 time d-none">
                      <div class="col-lg-4 col-md-4">
                      <input type="text" name="time_limit" class="form-control form-control-sm lesson">
                    </div>
                    <div class="col-lg-4 col-md-4">
                    <p class="nav-style" style="font-size:16px;">Minutes</p>
                  </div>
                </div> -->
              </div>

            </div>
            <div class="form-group text-center">
              <button type="submit" class="btn publish mx-auto" style="width:108px;">Save</button>
            </div>
          </form>
        </div>

        <div class="tab-pane fade" id="publish" role="tabpanel" aria-labelledby="publish-line-tab">
          <form id="addTopicQuestion"
          method="POST"
          data-ids="{{ $data->id }}"
          action="{{ url('/teacher/add/topic-question').'/'.$data->id }}">
          @csrf
          <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10 ">

              <div class="form-group row">
                <div class="col-lg-6 col-md-6">
                  <p>Question: {{ $cquestion > 0 ? $cquestion : 0 }}/{{ $data->quiz_item}}
                  </p>
                  <p class="nav-style">
                    <p class="nav-style">Question Type:
                      @if($data->quiz_type == 'mc')
                      Multiple Choice
                      @elseif($data->quiz_type == 'tof')
                      True or False
                      @elseif($data->quiz_type == 'id')
                      Identification
                      @elseif($data->quiz_type == 'ey')
                      Essay
                      @else
                      Random
                      @endif
                    </p>
                  </p>
                  <input type="text" hidden name="ta_id" value="{{ $data->id }}">
                  <input type="text" hidden id="q_type" name="q_type" value="{{$data->quiz_type}}">
                </div>
                <div class="col-lg-6 col-md-6">
                  <label for="">Points</label>
                  <input type="text" name="points" value="" placeholder="Points"
                  class="form-control lesson points" style="width:50%!important;">
                </div>
                <div class="points"></div>
              </div>
              <div class="form-group">
                <label for="" class="nav-style" style="font-size:18px;">Question</label>
                <textarea name="question" rows="8" cols="80" class="questionnaire"></textarea>
                <div class="question"></div>
              </div>
              @if($data->quiz_type == 'ran')
              <div class="form-group">
                <label for="">Type of Question</label>
                <select class="form-control lesson" id="type" name="type" style="border-radius:10px;">
                  <option disabled selected>Type of Question</option>
                  <option value="mc" >Multiple Choice</option>
                  <option value="id" >Identification</option>
                  <option value="tof" >True or False</option>
                </select>
              </div>
              @endif
              <div class="form-group">
                <input type="text"
                name="correct_answer"
                class="form-control lesson correct_answer"
                {{ $data->quiz_type == 'id' ? 'placeholder=Answer' : 'hidden' }}>
              </div>
              <div class="input_container">

              </div>


              <div class="form-group">
                @if($cquestion == $data->quiz_item)
                <p class="nav-style font-weight-bold" style="color:#F08867;font-size:18px;">
                  Question Limit
                </p>
                @else
                <button type="submit" class="btn pay-tution" id="">Save</button>
                @endif
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="tab-pane fade "  id="profile" role="tabpanel" aria-labelledby="profile-line-tab">
        @if($question->isNotEmpty())
        @foreach($question as $q)
        <div class="card">
          <div class="card-body">
            <a href="#" data-toggle="modal" data-target="#topic{{$q->qid}}"
              class="editAnswer"
              data-ids="{{$q->qid}}">
              <p class="nav-style" style="font-size:18px;">{!!$q->question!!}</p>
            </a>
          </div>
        </div>
        @endforeach

        <div class="mt-5">
          {{ $question->links('pagination::bootstrap-4') }}
        </div>
        @endif
      </div>

    </div>
  </div>
</div>
</div>
<!-- <div class="col-lg-4 col-md-4">
<div class="card">
<div class="card-body">

</div>
</div>
</div> -->
</div>
</div>
</div>
</div>
</div>

<!-- //Edit Questionnaire -->
@if($question->isNotEmpty())
@foreach($question as $q)
<div class="modal fade" id="topic{{$q->qid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document" style="max-width:400px!important;">
    <div class="modal-content">
      <div class="modal-header " style="background: #228DD5;color:#fff;">
        <h5 class="modal-title mx-auto" id="exampleModalLabel">Edit Question</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form
      class="frmEditTopicQuestion"
      method="POST"
      action="{{url('/teacher/edit/topic-question/')}}"
      data-ids="{{$data->qid}}"
      >
      @csrf
      <input type="text" name="ids" value="{{ $q->qid }}" hidden />
      <div class="modal-body">
        <div class="form-group">
          <label for="" class="nav-style" style="font-size:18px;">Question</label>
          <textarea name="question" rows="8" cols="80"
          class="form-control questionnaire" id="topic_question">{!! $q->question !!}</textarea>
          <div class="question"></div>
        </div>

        <?php
        $a = str_replace(str_split('[]'),'',$q->choices);
        $b = explode('",',$a);
        $c = str_replace(str_split('"'),'',$b);
        ?>
        @if($data->quiz_type == 'mc' || $data->quiz_type == 'tof' || $data->quiz_type == 'ran')
        @if(count($c) > 1)
        @foreach($c as $key => $ans)
        @php
        $letter = ['A','B','C','D'];
        @endphp
        <div class="form-group">
          <label for="">Choice {{$letter[$key]}}</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <input id="{{ $key }}" type="radio" name="answer" class="r_answer" value="{{$ans}}" {{ $ans === $q->right_answer ? 'checked' : ''}}>
              </span>
            </div>
            <input type="text" name="u_answer[]" class="form-control answer" value="{{$ans}}">
          </div>
        </div>
        @endforeach
        <div class="form-group">
          <label for="">Points</label>
          <input type="text" name="points" value="{{ $q->points }}" class="form-control" >
        </div>
        <input type="text" name="right_answer" value="{{ $q->right_answer }}" class="right_answer" hidden>
        @else
        <div class="form-group">
          <label for="">Points</label>
          <input type="text" name="points" value="{{ $q->points }}" class="form-control" >
        </div>
        <div class="form-group">
          <label for="">Correct Answer</label>
          <input type="text" name="right_answer" value="{{$q->right_answer}}" class="form-control" >
        </div>
        @endif
        @elseif($data->quiz_type == 'ey')
        @else
        <div class="form-group">
          <label for="">Points</label>
          <input type="text" name="points" value="{{ $q->points }}" class="form-control" >
        </div>
        <div class="form-group">
          <label for="">Correct Answer</label>
          <input type="text" name="right_answer" value="{{$q->right_answer}}" class="form-control" >
        </div>
        @endif
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <button type="submit" class="btn publish" style="border-radius:4px!important;">Save</button>
          </div>
        </form>

        <div class="col-lg-6 col-md-6">
          <form method="POST" class="frmDeleteQuestion">
            @csrf
            @method('DELETE')
            <a type="#" class="btn btn-del" style="height:35px!important;"
            data-ids="{{$q->qid}}">Delete</a>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endforeach
@endif
@endsection
