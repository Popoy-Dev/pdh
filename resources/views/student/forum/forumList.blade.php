@extends('student.forum.forum')


@section('forum')

<div class="forum-content mx-4 mb-5">
  <div class="container">
    <div class="row mx-5">

      <div class="col-lg-8">
          <form action="">
            <div class="row">
              <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text"
                      class="form-control"
                      placeholder="Search topic"
                      style="border: none;
                      border-radius: 20px;
                      background-color:#F5F5F5;
                      color:  #A7A4A4;
                      ";

                      >
                  </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <select class="form-control"
                      style="border: none;
                      border-radius: 20px;
                      background-color:#F5F5F5;
                      color:  #A7A4A4;
                      ";
                  >
                    <option>Sort by:</option>
                    <option>Course</option>
                    <option>Subject</option>
                  </select>
                </div>
              </div>
            </div>
          </form>
      </div>
      <div class="col-lg-4">
        <div class="form-group" style="float: right">
            <select class="form-control"
            style="border: none;
                border-radius: 20px;
                background-color:transparent;
                color:  #000000;
                ";
            >
              <option>Bookmarked Topics :</option>
              <option>Course</option>
              <option>Subject</option>
            </select>
          </div>
        </div>


    </div>
  </div>
</div>

<button class="btn btn-hdpAdmin ml-5">HDP Admin</button>

<a href="{{ url('forum-single') }}">
  <div class="card my-5" data-step="3" data-intro="Sample">

<div class="row mt-5 mb-5">
  <div class="col-sm-1">
    <img src="{{ url('asset/landing/avatar/ava2.svg') }}" class="img-fluid img-forum" alt="">
  </div>
  <div class="col-sm-7" >
      <h1 class="forum-title">Welcome to HDP!</h1>
      <p class="forum-para"> Lorem ipsum dolor sit amet, consectetur adipiscing elit,
         sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      <p class="forum-date">Updated on January 20,2020</p>
  </div>
  <div class="col-sm-4">

    <div class="comment-content mb-5 ml-5">
      <p style="font-size: 18px;" class="mr-5"><i class="mdi mdi-wechat mr-2" style="color: #08CDFF"></i> 24</p>
      <p style="font-size: 18px;"><i class="mdi mdi-heart mr-2" style="color: #D5372F;"></i> 24</p>
    </div>

    <div class="share-content">
      <p style="font-size: 18px;" class="mr-4"> <i data-feather="share-2" style="color: #B8B8B8"></i>
      <span style="font-size: 10px;color: #B8B8B8">Share</span> </p>
      <p style="font-size: 18px;" class="mr-4"> <i data-feather="alert-octagon" style="color: #B8B8B8"></i>
      <span style="font-size: 10px;color: #B8B8B8">Report to admin</span> </p>
      <p style="font-size: 18px;" class="mr-4"> <i data-feather="star" style="color: #B8B8B8"></i>
      <span style="font-size: 10px;color: #B8B8B8">Bookmark</span> </p>
    </div>
  </div>
</div>
</div>
<hr>
</a>


<div class="row mt-5 mb-5">
  <div class="col-sm-1">
    <img src="{{ url('asset/landing/avatar/ava1.svg') }}" class="img-fluid img-forum" alt="">
  </div>
  <div class="col-sm-7" >
      <h1 class="forum-title">Lorem Ipsum dolor sit amet</h1>
      <p class="forum-para"> Lorem ipsum dolor sit amet, consectetur adipiscing elit,
         sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      <p class="forum-date">Updated on January 20,2020</p>
  </div>
  <div class="col-sm-4">

    <div class="comment-content mb-5 ml-5">
      <p style="font-size: 18px;" class="mr-5"><i class="mdi mdi-message-text mr-2" style="color: #08CDFF"></i> 24</p>
      <p style="font-size: 18px;"><i class="mdi mdi-heart mr-2" style="color: #D5372F;"></i> 24</p>
    </div>

    <div class="share-content">
      <p style="font-size: 18px;" class="mr-4"> <i data-feather="share-2" style="color: #B8B8B8"></i>
      <span style="font-size: 10px;color: #B8B8B8">Share</span> </p>
      <p style="font-size: 18px;" class="mr-4"> <i data-feather="alert-octagon" style="color: #B8B8B8"></i>
      <span style="font-size: 10px;color: #B8B8B8">Report to admin</span> </p>
      <p style="font-size: 18px;" class="mr-4"> <i data-feather="star" style="color: #B8B8B8"></i>
      <span style="font-size: 10px;color: #B8B8B8">Bookmark</span> </p>
    </div>
  </div>
</div>
<hr>

<div class="row mt-5 mb-5">
  <div class="col-sm-1">
    <img src="{{ url('asset/landing/avatar/ava3.svg') }}" class="img-fluid img-forum" alt="">
  </div>
  <div class="col-sm-7" >
      <h1 class="forum-title">Lorem Ipsum dolor sit amet</h1>
      <p class="forum-para"> Lorem ipsum dolor sit amet, consectetur adipiscing elit,
         sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      <p class="forum-date">Updated on January 20,2020</p>
  </div>
  <div class="col-sm-4">

    <div class="comment-content mb-5 ml-5">
      <p style="font-size: 18px;" class="mr-5"><i class="mdi mdi-message-text mr-2" style="color: #08CDFF"></i> 24</p>
      <p style="font-size: 18px;"><i class="mdi mdi-heart mr-2" style="color: #D5372F;"></i> 24</p>
    </div>

    <div class="share-content">
      <p style="font-size: 18px;" class="mr-4"> <i data-feather="share-2" style="color: #B8B8B8"></i>
      <span style="font-size: 10px;color: #B8B8B8">Share</span> </p>
      <p style="font-size: 18px;" class="mr-4"> <i data-feather="alert-octagon" style="color: #B8B8B8"></i>
      <span style="font-size: 10px;color: #B8B8B8">Report to admin</span> </p>
      <p style="font-size: 18px;" class="mr-4"> <i data-feather="star" style="color: #B8B8B8"></i>
      <span style="font-size: 10px;color: #B8B8B8">Bookmark</span> </p>
    </div>
  </div>
</div>
<hr>

<script type="text/javascript" src="{{ asset('js/intro.js') }}"></script>
<script type="text/javascript">
if (RegExp('multipage', 'gi').test(window.location.search)) {

  var x = window.location.href;
  console.log(x);
  if (x == 'http://hdp.pci/forum?multipage=true') {
    introJs().setOption('doneLabel', 'Next page').start().oncomplete(function() {
      window.location.href =   BASE+'/change-email?multipage=true';
    });
  }
     }
</script>
@endsection
