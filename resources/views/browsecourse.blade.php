@extends('dashboardTemplate.main')

@section('content')


<div class="row">
  <div class="container my-5">
    <div class="col-lg-9">
      <div class="page-content">
        <div class="row pb-5">
          <div class="col-lg-6">
            <div class="my-4">
              <p class="nav-style text-dashboard" style="font-size: 18px;color: #A7A4A4">Browse Courses</p>
              <h3 class="nav-style" style="font-size: 25px;color:#08C4FF;">Good Afternoon, {{ Auth::user()->firstname }} !</h3>
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
        <h4 class="my-5" style="font-size: 18px;">Recommended for you</h4>
        <div class="row pb-5">

            <div class="col-lg-3 mx-auto">
                <div class="card-course">
                    <img src="{{ asset('images/course1.svg') }}" alt="" class="img-fluid" width="200" height="224">
                    <div class="btn-container">
                        <a href="{{url('/about-course')}}" class="btn btn-viewCourse">View Course</a>
                        <button class="btn btn-addTocart">Add to cart</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mx-auto">
                <div class="card-course">
                    <img src="{{ asset('images/course2.svg') }}" alt="" class="img-fluid" class="img-fluid" width="200" height="224">
                    <div class="btn-container">
                        <button class="btn btn-viewCourse">View Course</button>
                        <button class="btn btn-addTocart">Add to cart</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mx-auto">
                <div class="card-course">
                    <img src="{{ asset('images/course1.svg') }}" alt="" class="img-fluid" class="img-fluid" width="200" height="224">
                    <div class="btn-container">
                        <button class="btn btn-viewCourse">View Course</button>
                        <button class="btn btn-addTocart">Add to cart</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mx-auto">
                <div class="card-course">
                    <img src="{{ asset('images/course1.svg') }}" alt="" class="img-fluid" class="img-fluid" width="200" height="224">
                    <div class="btn-container">
                        <button class="btn btn-viewCourse">View Course</button>
                        <button class="btn btn-addTocart">Add to cart</button>
                    </div>
                </div>
            </div>

        </div><!--row forcards-->
  </div>
        <div class="card my-5" data-step="3" data-intro="Sample">
        <div class="row mt-5">
          <div class="col-lg-8">
            <h4 class="" style="font-size: 18px;">All Courses</h4>
          </div>
          <div class="col-lg-4 d-flex">
              <div class="form-group" style="float: right">
                <select class="form-control"
                style="border: none;
                    border-radius: 20px;
                    background-color:transparent;
                    color:  #000000;
                    ";
                >
                  <option>Filter by</option>
                  <option>Course</option>
                  <option>Subject</option>
                </select>
              </div>
              <div class="form-group" style="float: right">
                <select class="form-control"
                style="border: none;
                    border-radius: 20px;
                    background-color:transparent;
                    color:  #000000;
                    ";
                >
                  <option>Sort by</option>
                  <option>Course</option>
                  <option>Subject</option>
                </select>
              </div>
            </div>
          </div>
        </div>

      <div class="card my-5" data-step="3" data-intro="Sample">
        <div class="row mt-3">

            <div class="col-lg-3 mb-5 ">
                <div class="card-course">
                    <img src="{{ asset('images/course1.svg') }}" alt="" class="img-fluid" width="200" height="224">
                    <div class="btn-container">
                        <button class="btn btn-viewCourse">View Course</button>
                        <button class="btn btn-addTocart">Add to cart</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-5 mx-auto">
                <div class="card-course">
                    <img src="{{ asset('images/course2.svg') }}" alt="" class="img-fluid" class="img-fluid" width="200" height="224">
                    <div class="btn-container">
                        <button class="btn btn-viewCourse">View Course</button>
                        <button class="btn btn-addTocart">Add to cart</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-5 mx-auto">
                <div class="card-course">
                    <img src="{{ asset('images/course1.svg') }}" alt="" class="img-fluid" class="img-fluid" width="200" height="224">
                    <div class="btn-container">
                        <button class="btn btn-viewCourse">View Course</button>
                        <button class="btn btn-addTocart">Add to cart</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-5 mx-auto">
                <div class="card-course">
                    <img src="{{ asset('images/course1.svg') }}" alt="" class="img-fluid" class="img-fluid" width="200" height="224">
                    <div class="btn-container">
                        <button class="btn btn-viewCourse">View Course</button>
                        <button class="btn btn-addTocart">Add to cart</button>
                    </div>
                </div>
            </div>

        </div><!--row forcards 2-->

        <div class="row">

            <div class="col-lg-3">
                <div class="card-course">
                    <img src="{{ asset('images/course1.svg') }}" alt="" class="img-fluid" width="200" height="224">
                    <div class="btn-container">
                        <button class="btn btn-viewCourse">View Course</button>
                        <button class="btn btn-addTocart">Add to cart</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 pr-6">
                <div class="card-course">
                    <img src="{{ asset('images/course2.svg') }}" alt="" class="img-fluid" class="img-fluid" width="200" height="224">
                    <div class="btn-container">
                        <button class="btn btn-viewCourse">View Course</button>
                        <button class="btn btn-addTocart">Add to cart</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mr-9">
                <div class="card-course">
                    <img src="{{ asset('images/course1.svg') }}" alt="" class="img-fluid" class="img-fluid" width="200" height="224">
                    <div class="btn-container">
                        <button class="btn btn-viewCourse">View Course</button>
                        <button class="btn btn-addTocart">Add to cart</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mr-9">
                <div class="card-course">
                    <img src="{{ asset('images/course1.svg') }}" alt="" class="img-fluid" class="img-fluid" width="200" height="224">
                    <div class="btn-container">
                        <button class="btn btn-viewCourse">View Course</button>
                        <button class="btn btn-addTocart">Add to cart</button>
                    </div>
                </div>
            </div>

        </div><!--row forcards 2-->
</div><!--row forcards 2-->



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

<script>

    $('#nav-browse').css('background-color','rgba(8, 205, 255, 0.1)');
    $('#nav-browse').css('width','100%');
    $('#nav-browse').css('border-radius','16px');

</script>
<script type="text/javascript" src="{{ asset('js/intro.js') }}"></script>
<script type="text/javascript">
if (RegExp('multipage', 'gi').test(window.location.search)) {

  var x = window.location.href;
  console.log(x);
  if (x == 'http://hdp.pci/browse-courses?multipage=true') {
    introJs().setOption('doneLabel', 'Next page').start().oncomplete(function() {
      window.location.href =   BASE+'/my-teacher?multipage=true';
    });
  }
     }
</script>

@endsection
