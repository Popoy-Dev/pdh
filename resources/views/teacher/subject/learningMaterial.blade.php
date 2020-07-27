@extends('dashboardTemplate.main')

@section('content')
<div class="container my-5">
  <div class="row">
    <div class="col-lg-10 col-md-10">
      <div class="page-content">
        <nav class="page-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/teacher/subject',$sub->s_uuid) }}">{{ $sub ? $sub->subject.' '.$sub->grade : ''}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Learning Material</li>
          </ol>
        </nav>
        <div class="row justify-content-center">

          <div class="col-lg-8 col-md-8">
            <div class="card">
              <div class="card-body">

                <form id="frmSaveLearningMaterial" method="POST" enctype="multipart/form-data" action="{{url('/teacher/add/learning-material')}}">
                  @csrf
                  <div class="progress my-3" style="height: 14px;">
                    <div class="progress-bar" role="progressbar" style="width: 0%"
                    aria-valuenow="" aria-valuemin="0" aria-valuemax="100">%</div>
                  </div>
                  <div id="succss"></div>
                  <input type="hidden" name="lesson_id" value="{{$subject->id}}">
                  <input type="hidden" name="s_uuid" value="{{$subject->s_uuid}}">
                  <div class="form-group">
                    <label>Title:</label>
                    <input type="text" name="title" class="form-control" value="">
                  </div>
                  <div class="title"></div>

                  <div class="form-group">
                    <label>Type:</label>
                    <select id="select_type" name="type" class="form-control">
                      <option selected disabled>--- Select Type ---</option>
                      <option value="v">Video</option>
                      <option value="f">Docx/PDF/Powerpoint</option>
                      <option value="u">YOUTUBE URL</option>
                    </select>
                  </div>
                  <div class="type"></div>

                  <div id="type_file" style="display:none;">
                    <div class="form-group">
                      <label>Course Material</label>
                      <input type="file" class="form-control cm">
                    </div>

                    <div id="tn" class="form-group">
                      <label>Thumbnail</label>
                      <input type="file" name="v_thumbnail" class="file">
                    </div>
                  </div>

                  <div id="video" style="display:none;">
                    <div class="form-group embed-responsive embed-responsive-16by9">
                      <video width="" controls>
                        <source src="" id="video_here">
                        </video>
                      </div>
                    </div>
                    <div class="mp4"></div>
                    <div class="files"></div>
                    <div class="v_thumbnail"></div>
                    <div id="type_url" style="display:none;">
                      <div class="form-group">
                        <label>Course Material</label>
                        <input type="text" name="url" class="form-control" placeholder="YOUTUBE LINK">
                        <small style="text-indent: 25px !important;" class="text-center mt-5">
                          &nbsp;&nbsp;Just some quick heads up that the link you can put are limited so far for youtube links. Based on our review of the content placed, some can load while other sites really are strict and will not be able to load in our site
                        </small>
                      </div>
                    </div>
                    <div class="url"></div>

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary btn_vid float-right"><i class="fa fa-save"></i> Save changes</button>
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
</div>
</div>
@endsection
