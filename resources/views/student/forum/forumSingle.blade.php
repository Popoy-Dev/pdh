@extends('student.forum.forum')

@section('forum')
<!-- <div class="row">
  <div class="col-lg-3 col-md-3 d-flex flex-column">
    <div class="my-3">
      <a href="{{ url('/start-discussion') }}" class="btn btn-forum">Start Discussion </a>
    </div>
    <div class="my-2">
      <a href="{{ url('/guidelines') }}" class="btn btn-forum">guidelines </a>
    </div>
  </div>

  <div class="col-lg-9 col-md-9">
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group my-3 d-flex">
          <div>
            <input type="text" class="form-control"/>
          </div>
          <div class="mx-3 my-auto">
            <button class="btn btn-search">Search</button>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group d-flex my-3">
          <div style="border-right:2px solid grey;">
            <h4 class="p-1">SORT</h4>
          </div>
          <div class="mx-3 my-auto">

          </div>
        </div>
      </div>
    </div>

  </div>
</div> -->



<div class="row">
  <div class="col-lg-10 col-md-8">
    <div class="my-3">
    <button class="btn btn-hdpAdminNew">HDP Admin</button>
      <h4 class="nav-style f-welcome">Welcome to Scuola new members!</h4>
      <h6 class="f-guidelines nav-style">Maria dela Cruz</h6>
      <small class="f-date">Updated 4 days ago</small>
    </div>

    <div class="">
      <p class="f-desc text-justify">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        A cras semper auctor neque vitae tempus quam pellentesque nec. Ac turpis egestas integer eget aliquet nibh praesent tristique magna.
        Et ultrices neque ornare aenean euismod elementum nisi quis. Urna cursus eget nunc scelerisque.
      </p>
      <span><i class="mdi mdi-wechat" style="font-size:25px;color:#85CADB;"></i> 1</span>
      <span><i class="mdi mdi-heart" style="font-size:25px;color:#DC143C;"></i> 1</span>
    </div>

    <div class="form-group my-5">
      <textarea name="name" rows="8" cols="100" class="form-control">Type something here..</textarea>
      <button class="btn btn-primary mt-3 float-right">Comment</button>
    </div>

    <div class="my-5">
      <h6>Comments</h6>
      <div class="media d-block d-sm-flex my-3">

        <img src="{{ asset('asset/landing/avatar/ava1.svg') }}" class="wd-100p wd-sm-50 mb-3 mb-sm-0 mr-3 img-fluid" alt="...">
        <div class="media-body">
          <h5 class="mt-0">Media heading</h5>
          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

          <div class="media d-block d-sm-flex mt-3">
            <a class="mr-3" href="#">
              <img src="{{ asset('asset/landing/avatar/ava2.svg') }}" class="wd-100p wd-sm-50 mb-3 mb-sm-0 mr-3 img-fluid" alt="...">
            </a>
            <div class="media-body">
              <h5 class="mt-0">Media heading</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
