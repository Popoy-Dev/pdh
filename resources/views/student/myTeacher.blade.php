@extends('dashboardTemplate.main')

@section('content')
<!-- <div class="container my-5">
  <div class="row">
    <div class="col-lg-9 col-md-9">
      <div class="page-content">
        <div class="row">
          <div class="col-lg-12 col-md-12 my-2">
            <div class="card">
              <div class="card-body">
                <div class="text-center  p-3">
                  <img src="{{ asset('asset/landing/avatar').'/'.Auth::user()->photo.'.svg' }}" alt="" class="img-fluid" width="200" height="200">
                  <p class="nav-style my-3" style="font-size:18px;">
                    Nothing here.<br/> Please settle your payment to view instructors.
                  </p>
                  <a href="#" class="btn pay-tution">Pay Tuition</a>
                </div>

              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div> -->

<div class="row">
  <div class="container my-5">
    <div class="col-lg-9">
      <div class="page-content">
        <div class="row pb-5">
          <div class="col-lg-6">
            <div class="my-5">
              <!-- <p class="nav-style text-dashboard" style="font-size: 18px;color: #A7A4A4">Browse Courses</p> -->
              <h3 class="nav-style" style="font-size: 25px;color:#08C4FF;">My Courses</h3>
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
        <div class="card my-5" data-step="2" data-intro="Sample">

        <div class="row">
            <div class="col-lg-3 pb-5" >
                <div class="card-course">
                    <img src="{{ asset('images/course1.svg') }}" alt="" class="img-fluid" width="200" height="224">
                    <div class="btn-container">
                        <center><a href="{{url('/my-teacher')}}" class="btn btn-conCourse">Continue</a></center>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 pb-5">
                <div class="card-course">
                    <img src="{{ asset('images/course2.svg') }}" alt="" class="img-fluid" class="img-fluid" width="200" height="224">
                    <div class="btn-container">
                        <button class="btn btn-sLearning">Start Learning</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 pb-5">
                <div class="card-course">
                    <img src="{{ asset('images/course2.svg') }}" alt="" class="img-fluid" class="img-fluid" width="200" height="224">
                    <div class="btn-container">
                        <button class="btn btn-sLearning">Start Learning</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 pb-5">
                <div class="card-course">
                    <img src="{{ asset('images/course2.svg') }}" alt="" class="img-fluid" class="img-fluid" width="200" height="224">
                    <div class="btn-container">
                        <button class="btn btn-sLearning">Start Learning</button>
                    </div>
                </div>
            </div>
    </div>
        </div><!--row forcards-->

</div>
</div>
</div>
<script type="text/javascript" src="{{ asset('js/intro.js') }}"></script>
<script type="text/javascript">
if (RegExp('multipage', 'gi').test(window.location.search)) {

  var x = window.location.href;
  console.log(x);
  if (x == 'http://hdp.pci/my-teacher?multipage=true') {
    introJs().setOption('doneLabel', 'Next page').start().oncomplete(function() {
      window.location.href =   BASE+'/my-task?multipage=true';
    });
  }
     }
</script>

<script>

  //$('.sidenavNew').css('display', 'none');
  $('#nav-course').css('background-color','rgba(8, 205, 255, 0.1)');
  $('#nav-course').css('width','100%');
  $('#nav-course').css('border-radius','16px');

</script>
@endsection
