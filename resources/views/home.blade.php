@extends('dashboardTemplate.main')

@section('content')
<div class="row">
  <div class="container my-5">
    <div class="col-lg-9">
      <div class="page-content">
        <div class="row">
          <div class="col-lg-6">
            <div class="my-4">
              <p class="nav-style text-dashboard" style="font-size: 18px;color: #A7A4A4">Dashboard</p>
              <h3 class="nav-style" style="font-size: 25px;color:#08C4FF;">Welcome Student!</h3>
            </div>
          </div><!--col-6-->
          <div class="col-lg-6">
            <div class="card" style="border-radius: 16px;">
              <div class="card-body" style="padding:1rem !important;overflow: hidden;border-radius: 16px;">
                <div class="row">
                  <div class="col-lg-10">

                      <div class="dash-circle-1"></div>
                      <div class="dash-circle-2"></div>
                      <div class="dash-circle-3"></div>
                      <p class="text-justify" style="font-size: 12px;font-weight:bolder;color: #222;">Hello, {{ Auth::user()->firstname }}!</p>
                      <p class="text-justify" style="font-size: 14px;font-weight:bolder;color: #222;">Would you like take a tour first?</p>
                      <span class="btn btn-skip">Skip</span>
                      <a class="btn btn-tour mt-3" href="javascript:void(0);" onclick="javascript:introJs().start();">Start</a>
                  </div><!--lg7-->
                  <!-- <div class="col-lg-5 col-md-5 col-sm-6 col-6"> -->
                    <!--<img src="{{ asset('asset/landing/avatar').'/'.Auth::user()->photo }}" alt="" class="img-fluid ml-3" width="115" height="115" style="margin-top:-50px !important;"> -->
                  <!--</div>lg5-->
                </div><!--3rrow-->
              </div><!--card body-->
            </div><!--card-->
          </div><!--lg6-->
        </div><!--inner row-->

        <div class="card my-5" style="border-radius: 18px;" data-step="2" data-intro="Stay updated on your progress on different subjects. Keep yourself informed on the status of the subjects your taking.">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class="nav-style">
                <th class="th-font">My Courses</th>
                <th class="th-font">Instructor</th>
                <th class="th-font">Progress</th>
                <th class="th-font">Action</th>
                </thead>
                <tbody>
                <tr>
                <td class="td-font">Science Grade 6</td>
                <td class="td-font">Teacher Cruz</td>
                <td>
                    <div class="progress">
                    <div class="progress-bar" role="progressbar"
                    style="width: 25%;" aria-valuenow="25"
                    aria-valuemin="0" aria-valuemax="100">25%</div>
                  </div>
                </td>
                <td><button class="btn btn-startCourse">Start Courses</button></td>
                </tr>
                <tr>
                <td class="td-font">Course 1</td>
                <td class="td-font">Teacher Cruz</td>
                <td>
                    <div class="progress">
                    <div class="progress-bar" role="progressbar"
                    style="width: 10%;" aria-valuenow="10"
                    aria-valuemin="0" aria-valuemax="100">10%</div>
                  </div>
                </td>
                <td><button class="btn btn-startCourse">Start Courses</button></td>
                </tr>
                </tbody>
              </table>
            </div><!--table-->
          </div><!--cardbody-->
        </div><!--card5-->

        <div class="card my-5" style="border-radius: 18px;" data-step="3" data-intro="Let's also collate all your test reports! In this case we'll know if you're doing great or we just need to study hard a little bit.">
          <div class="row">
            <div class="col-lg-6">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class="nav-style">
                    <th class="th-font-2" width="100%">My Quizzes</th>
                    <th class="th-font-2" width="10%">Score</th>
                    </thead>
                    <tbody>
                    <tr>
                    <td class="td-font">Course 1</td>
                    <td class="td-font "><div class="dot-score"><p class="td-score"> 91</p></div></td>
                    </tr>
                    </tbody>
                  </table>
                </div><!--table-->
              </div><!--cardbody-->
            </div><!--col-lg-6-->

            <div class="col-lg-6" >
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class="nav-style">
                    <th class="th-font-2" width="100%">Asessments</th>
                    <th class="th-font-2" width="10%">Score</th>
                    </thead>
                    <tbody>
                    <tr>
                    <td class="td-font">Course 1</td>
                    <td class="td-font "><div class="dot-score"><p class="td-score"> 91</p></div></td>
                    </tr>
                    </tbody>
                  </table>
                </div><!--table-->
              </div><!--cardbody-->
            </div><!--col-lg-6-->

          </div><!--row-->

        </div><!--card5-->


      </div><!--page content-->
    </div><!--first col -->
    </div> <!--container -->
  </div><!--row -->










<div class="modal fade {{ Auth::user()->isLoginn == 0 ? 'show':''}}" id="exampleModal"
  tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
  style="{{ Auth::user()->isLogin == 0 ? 'padding-right: 15px; display: block;':''}}"
  >
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel"></h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div> -->

  <div class="modal-body">
    <div class="text-center p-3">
      <h3 class="nav-style ava-welcome">Welcome Aboard</h3>
      <p class="nav-style ava-text">Get Started by choosing your avatar</p>
    </div>
    <div class="d-flex flex-row mx-3 p-2">
      <div class="mx-3 avatar active" data-name="avatar1.svg">
        <img src="{{ asset('asset/landing/avatar/avatar1.svg') }}" alt=""
        data-name="avatar1"
        class="img-fluid rounded-circle border-rounded ava p-1   "
        width="100" height="100">
      </div>
      <div class="mx-3  avatar" data-name="avatar2.svg">
        <img src="{{ asset('asset/landing/avatar/avatar2.svg') }}" alt=""
        class="img-fluid rounded-circle border-rounded ava p-1  " width="100" height="100">
      </div>
      <div class="mx-3  avatar" data-name="avatar3.svg">
        <img src="{{ asset('asset/landing/avatar/avatar3.svg') }}" alt=""
        class="img-avatar3 img-fluid rounded-circle border-rounded ava p-1 " width="100" height="100">
      </div>
      <div class="mx-3  avatar" data-name="avatar4.svg">
        <img src="{{ asset('asset/landing/avatar/avatar4.svg') }}" alt=""
        class="img-avatar4 img-fluid rounded-circle border-rounded ava p-1 " width="100" height="100">
      </div>
      <form method="POST" id="frmAvatar" action="{{ url('/change/avatar').'/'.Auth::user()->uuid }}">
        @csrf
        <input type="text" name="avatar" class="avatars" value="avatar1.svg" hidden>
        <input type="text" name="data-ids" value="{{ Auth::user()->uuid }}" class="data-ids" hidden>
      </div>
      <div class="form-group text-center mt-3">
        <button type="submit" class="btn ava-confirm">Confirm</button>
      </div>
    </div>
  </form>

</div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content py-4">
      <div class="modal-body text-center">
        <h4 class="text-modal">Welcome! <br> We're glad you're here! </h4>
        <h5 class="modal-h5">Would you like to take a tour</h5>
        <button type="button" class="btn btn-primary mod-btn" id="startButton1"  data-dismiss="modal">Take A Tour</button> <br>
        <a data-dismiss="modal" class="pointer p-color">Skip</a>

      </div>



    </div>
  </div>
</div>
<script>

    $('#nav-dash').css('background-color','rgba(8, 205, 255, 0.1)');
    $('#nav-dash').css('width','100%');
    $('#nav-dash').css('border-radius','16px');

</script>
<script>
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>
<script type="text/javascript">
$('#startButton').click(function(){
introJs().setOption('doneLabel', 'Next page').start().oncomplete(function() {
  window.location.href =   BASE + '/browse-courses?multipage=true';
});
});
$('#startButton1').click(function(){
introJs().setOption('doneLabel', 'Next page').start().oncomplete(function() {
  window.location.href =   BASE + '/browse-courses?multipage=true';
});
});
</script>
<script type="text/javascript" src="{{ asset('js/intro.js') }}"></script>

@endsection
