@extends('dashboardTemplate.main')

@section('content')
<div class="container my-5">
  <div class="row">
    <div class="col-lg-10 col-md-10">
      <div class="page-content">
        <nav class="page-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/teacher/subjects')}}">My Subjects</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$data ? $data->subject.' '.$data->grade : ''}}</li>
          </ol>
        </nav>
        <div class="row">
          <div class="col-lg-8 col-md-8">
            <div class="card">
              <form action="POST" id="frmEditSubj" data-ids="{{ $data ? $data->s_uuid : '' }}"
                action="{{ url('/teacher/edit/subject') .'/'. $data->s_uuid }}" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                  <div class="row">
                    <div class="col-lg-6 col-md-6">
                      <p class="nav-style" style="font-size:20px;">
                        Subject Details
                      </p>
                    </div>
                    <div class="col-lg-6 col-md-6">
                      <div class="form-group float-right">
                        <button type="submit" class="btn pay-tution editSubj" data-ids="{{ $data ? $data->s_uuid : ''}}">Save Changes</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-8 col-md-8">
                      <div class="form-group">
                        <label for="">Grade</label>
                        <select name="subject_grade" id="" class="form-control grade input-subject" style="border-radius: 10px;">
                          <option value="nursery" {{ $data->grade == 'nursery' ? 'selected':''}}>Nursery </option>
                          <option value="kinder" {{ $data->grade == 'kinder' ? 'selected':''}}>Kinder 2 </option>
                          <option value="1" {{ $data->grade == '1' ? 'selected':''}}>Grade 1</option>
                          <option value="2" {{ $data->grade == '2' ? 'selected':''}}>Grade 2</option>
                          <option value="3" {{ $data->grade == '3' ? 'selected':''}}>Grade 3</option>
                          <option value="4" {{ $data->grade == '4' ? 'selected':''}}>Grade 4</option>
                          <option value="5" {{ $data->grade == '5' ? 'selected':''}}>Grade 5</option>
                          <option value="6" {{ $data->grade == '6' ? 'selected':''}}>Grade 6</option>
                          <option value="7" {{ $data->grade == '7' ? 'selected':''}}>Grade 7</option>
                          <option value="8" {{ $data->grade == '8' ? 'selected':''}}>Grade 8</option>
                          <option value="9" {{ $data->grade == '9' ? 'selected':''}}>Grade 9</option>
                          <option value="10" {{ $data->grade == '10' ? 'selected':''}}>Grade 10</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="">Subject</label>
                        <input type="text" class="form-control input-subject subject_title" name="subject_title" value="{{ $data ? $data->subject : '' }}">
                      </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                      <div class="form-group">
                        <label for="">Subject Description</label>
                        <textarea name="subject_description" class="subject_description" id="subj_desc" cols="43" rows="">{!! $data ? $data->description : '' !!}</textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>

            <div class="form-group mt-5">
              <p class="nav-style" style="font-size:18px;">
                Subject Timeline
              </p>
            </div>


            <div class="card">
              <div class="card-body" style="padding:0 !important">

                @if($ins->isNotEmpty())
                <div id="content">
                  <ul class="timeline" style="max-width:80% !important;margin-left:9rem !important;border-left:3px solid #33A3EF!important;height:80%;">
                    @foreach($ins as $is)
                    @if($is->type == 'a')

                    <li class="event">
                      <a href="#"
                      class="btn-event"
                      data-ids="{{$is->id}}"
                      @if(Helper::getSubjAssessExist($is->id))
                      data-toggle="tooltip"
                      data-placement="left"
                      title="Go to Questionnaire"
                      @else
                      data-toggle="modal"
                      data-target="#addQuiz"
                      data-placement="left"
                      title="{{ $is->type == 'a' ? 'Add Quiz' : 'Add Learning Material' }}"
                      @endif
                      >
                      <h3>{{ $is->title }} <i class="mdi mdi-tooltip-edit" style="color:#228DD5;font-size:18px;"></i></h3>
                    </a>
                    @foreach(Helper::getSubjAssess($is->id) as $dt)
                    <div class="ml-5">
                      <p class="nav-style" style="font-size:18px;">
                        <a href="{{ url('/teacher/assessment').'/'.$dt->sa_uuid }}" data-toggle="tooltip" data-placement="top" title="">{{ $dt->quiz_title }}</a></p>
                      </div>
                      @endforeach
                    </li>
                    @else
                    <li class="event">
                      <a href="#" data-toggle="modal" data-target="#lesson" data-ids="{{$is->id}}" class="builder">
                        <h3>{{ $is->title }} <i class="mdi mdi-tooltip-edit" style="color:#228DD5;font-size:18px;"></i></h3>
                      </a>
                      @foreach(Helper::getLesson($is->id) as $dt)
                      @if(Helper::getTopic($dt->id))
                      @php
                      $uuid = Helper::getTopic($dt->id)->t_uuid;
                      @endphp
                      <div class="ml-5" >
                        <p class="nav-style" style="font-size:18px;" data-toggle="tooltip" data-placement="left" title="View Learning Material">
                          <a href="{{ url('/teacher/topic/learning-material').'/'. $uuid }}" data-toggle="tooltip" data-placement="top" title="">{{ $dt->lesson_title }}</a></p>
                        </div>
                        @else
                        <div class="ml-5" >
                          <p class="nav-style" style="font-size:18px;" data-toggle="tooltip" data-placement="left" title="Create Learning Material">
                            <a href="{{ url('/teacher/learning-material').'/'.$dt->l_uuid }}" data-toggle="tooltip" data-placement="top" title="">{{ $dt->lesson_title }}</a></p>
                          </div>
                          @endif
                          @endforeach
                        </li>
                        @endif
                        @endforeach
                      </ul>
                    </div>
                    @else
                    <div class="form-group text-center my-5 no-data-found py-3">
                      <p> No data found. <a href="#"
                        data-toggle="modal" data-target="#instructional"
                        data-placement="top" title="Add Instructional Design">
                        Click here to add.</a>
                      </p>
                    </div>
                    @endif
                  </div>
                </div>

              </div>
              <div class="col-lg-4 col-md-4">
                <div class="card">
                  <div class="card-body">
                    <p class="nav-style" style="font-size:20px;">
                    Topic Outline
                    </p>
                    <div class="form-group text-center mt-3">
                      <button class="btn instructional btn-block" data-toggle="modal" data-target="#instructional">Instructional Design</button>
                    </div>
                    <hr/>
                    <p class="nav-style" style="font-size:20px;">
                      Subject Status
                    </p>
                    <div class="form-group text-center mt-3">
                      @if($data->status == 2)

                      <a href="#" class="nav-style btn btn-block instructional btn-cancel-request" data-ids="{{ $data->s_uuid }}">Cancel Request</a>

                      @elseif($data->status == 1)
                      <a href="#" class="nav-style btn btn-block publish">Published</a>
                      @else

                        <a href="#" class="btn btnpublish publish btn-block"style="background:#feaf02;" data-ids="{{ $data->s_uuid }}">Request for approval</a>
                      @endif
                    </div>

                    <!-- <div class="form-group text-center">
                    <button class="btn pay-tution btn-block" style="height:35px;">Save</button>
                  </div> -->

                  <p class="nav-style" style="font-size:20px;">
                    Subject Thumbnail
                  </p>

                  <form id="frmThumbnail" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-3">
                      <input type="file" class="file" name="thumbnail"
                      data-ids="{{ $data ? $data->s_uuid : ''}}"
                      data-default-file="https://scuola-maria.s3-ap-southeast-1.amazonaws.com/local-dev/subjects/{{ $data->s_uuid }}/subject-thumbnail/{{$data->photo}}">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- Instructional Design -->
  <div class="modal fade" id="instructional" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:350px!important;">
      <div class="modal-content">
        <div class="modal-header " style="background: #228DD5;color:#fff;">
          <h5 class="modal-title mx-auto" id="exampleModalLabel">Instructional Design</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="idesign">
            @csrf
            <input type="hidden" value="{{$data->id}}" name="s_id">
            <div class="form-group text-center">
              <button class="btn pay-tution addInst"><i class="mdi mdi-plus "></i> Add</button>
            </div>

            <div class="ins">

            </div>

            @if($ins->isNotEmpty())
            <div id="menu-sort" class="dd nestable-with-handle">
              <ol class="dd-list">
                @foreach($ins as $key => $is)
                <li class="dd-item dd3-item parent" data-id="{{ $is->i_uuid }}">
                  <div class="dd-handle dd3-handle"></div>
                  <a href="#" data-ids="{{$is->i_uuid}}" id="{{$is->i_uuid}}" class='btn_edit'>
                    <div class="dd3-content">{{ $is->title }}</div>
                  </a>


                  <div class="{{$is->i_uuid}}" style="display:none;">
                    <div class="form-group row">
                      <div class="col-md-7 from">
                        <input type="text" class="form-control " id="inst{{$is->i_uuid}}" name="input" value="{{ $is->title }}"/>
                      </div>
                      <div class="col-md-5 float-right mt-1">
                        <a class=" text-danger close{{$is->i_uuid}}"  data-toggle="tooltip" data-placement="top" title="Close" style="margin-top:8px;">
                          <i class="mdi mdi-close-circle" style="font-size:20px;cursor:pointer;"></i>
                        </a>
                        <a class="btn-sm text-success save{{$is->i_uuid}}" data-ids="{{$is->i_uuid}}"  data-toggle="tooltip" data-placement="top" title="Save!" style="margin-top:8px;">
                          <i class="mdi mdi-content-save" style="font-size:20px;cursor:pointer;"></i>
                        </a>
                        <a class=" text-danger del{{$is->i_uuid}}" data-ids="{{$is->i_uuid}}"  data-toggle="tooltip" data-placement="top" title="Delete!" style="margin-top:8px;">
                          <i class="mdi mdi-delete" style="font-size:20px;cursor:pointer;"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </li>
                @endforeach
              </ol>
            </div>
            @endif
            <!-- <div id="menu-sort" class="dd nestable-with-handle">
            <ol class="dd-list">
            <li class="dd-item dd3-item parent" data-id="">
            <div class="dd-handle dd3-handle"></div>
            <a href="#" data-ids="" id="" class='btn_edit'>
            <div class="dd3-content">QUater</div>
          </a>
        </li>
      </ol>
    </div> -->
  </div>
  <div class="modal-footer">
    <div class="row">
      <div class="col-lg-6 col-md-6">
        <button type="button" class="btn btn-cancel close" data-dismiss="modal">Cancel</button>
      </div>
      <div class="col-lg-6 col-md-6">
        <button type="submit" class="btn publish">Save</button>
      </div>
    </div>
  </div>
</form>

</div>
</div>
</div>

<!-- Lesson Builder -->
<div class="modal fade" id="lesson" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:350px!important;">
    <div class="modal-content">
      <div class="modal-header " style="background: #228DD5;color:#fff;">
        <h5 class="modal-title mx-auto" id="exampleModalLabel">Lesson Builder</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ url('/teacher/add/lesson') }}" method="POST" id="frmSaveLesson">
        @csrf
        <div class="modal-body">
          <input type="text" name="ids" class="getID" hidden/>
          <div class="input-group mb-3">
            <input type="text" class="form-control lesson getLesson" placeholder="Title">
            <div class="input-group-append">
              <a href="#" class="btn btn-go"><i class="mdi mdi-check"></i></a>
            </div>
          </div>

          <div id="menu-sort" class="dd nestable-with-handle d3">
            <ol class="dd-list" id="listainer">


            </ol>
          </div>
        </div>
        <div class="modal-footer">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <button type="button" class="btn btn-cancel" data-dismiss="modal">Cancel</button>
            </div>
            <div class="col-lg-6 col-md-6">
              <button type="submit" class="btn publish">Save</button>
            </div>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- //Add Question -->
<div class="modal fade" id="addQuiz" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:350px!important;">
    <div class="modal-content">
      <div class="modal-header " style="background: #228DD5;color:#fff;">
        <h5 class="modal-title mx-auto" id="exampleModalLabel">Quiz</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" id="frmSubjAssess" action="{{ url('/teacher/add/subject-assessment/')}}" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <input type="text" hidden class="data-ids" name="ids">
          <div class="form-group">
            <label for="" class="nav-style" style="font-size:16px;">Title</label>
            <input type="text" class="form-control lesson" name="quiz_title">
          </div>

          <div class="form-group">
            <label for="">Type of Quiz</label>
            <select name="type_of_quiz" id="" class="form-control lesson" style="border-radius: 10px!important;">
              <option selected disabled>Quiz Type</option>
              <option value="mc">Multiple Choice</option>
              <option value="id">Identification</option>
              <option value="ey">Essay</option>
              <option value="tof">True or False</option>
              <option value="ran">Random</option>
            </select>
          </div>

          <div class="form-group">
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
          </div>

          <div class="row justify-content-center my-2 div_time d-none">
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
          </div>

        </div>
        <div class="modal-footer text-center">
          <button type="submit" class="btn pay-tution mx-auto">Create</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
