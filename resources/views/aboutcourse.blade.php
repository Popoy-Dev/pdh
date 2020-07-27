@extends('dashboardTemplate.main')

@section('content')

<div class="row mt-5">
  <div class="container my-5">
    <div class="col-lg-9">
      <div class="page-content">
       
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="card pt-4 pb-4" style="border-radius: 20px;">
                    <img src="{{ asset('images/bigcourse.svg') }}" alt="" class="img-fluid"> 
                    <div class="desc-about mt-3 ">
                        <h1>Science Grade 6</h1>
                        <h3>Teacher John Cruz</h3>

                        <h2>Course Description</h2>
                        <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                </div>
               
            </div>
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mx-auto pr-5 pl-5 pb-3" style="border-radius: 20px;">
                            <div class="progress mb-4 mt-5">
                                <div class="progress-bar" role="progressbar"
                                style="width: 0%;" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100">
                                </div>
                                0%
                            </div>
                            <button class="btn btn-AddcartCourse mb-4">Add to Cart</button>
                            <div class="cost">
                                <p class="mb-3"><i class="icon link-icon" data-feather="calendar" style="height: 12px;"></i>&nbsp;&nbsp;&nbsp;Last Update: 3 weeks ago</p>
                                <p class="mb-3"><i class="icon link-icon" data-feather="clock" style="height: 12px;"></i>&nbsp;&nbsp;&nbsp;Estimated Course Duration: 3 hrs.</p>
                                <p class="mb-3"><i class="icon link-icon" data-feather="credit-card" style="height: 12px;"></i>&nbsp;&nbsp;&nbsp;Price: ₱ 5,000.00</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                          <div class="card mx-auto pr-4 pl-4 pb-4 mt-3" style="border-radius: 20px;">
                          <h2 class="pt-3 c-nav-title">Course Navigation</h2>
                            <div class="btn-group mt-3">
                                <button type="button" style="border-radius: 20px;" class="btn btn-courseNav dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p>Topic 1: Lorem Ipsum<i data-feather="align-justify" style="height: 13px;float: right"></i></p>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Lorem Ipsum</a>
                                    <a class="dropdown-item" href="#">Lorem Ipsum</a>
                                    <a class="dropdown-item" href="#">Lorem Ipsum</a>
                                </div>
                            </div> 
                            <div class="btn-group mt-3">
                                <button type="button" style="border-radius: 20px;" class="btn btn-courseNav dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p>Topic 2: Lorem Ipsum<i data-feather="align-justify" style="height: 13px;float: right"></i></p>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Lorem Ipsum</a>
                                    <a class="dropdown-item" href="#">Lorem Ipsum</a>
                                    <a class="dropdown-item" href="#">Lorem Ipsum</a>
                                </div>
                            </div> 
                            <div class="btn-group mt-3">
                                <button type="button" style="border-radius: 20px;" class="btn btn-courseNav dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p>Topic 3: Lorem Ipsum<i data-feather="align-justify" style="height: 13px;float: right"></i></p>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Lorem Ipsum</a>
                                    <a class="dropdown-item" href="#">Lorem Ipsum</a>
                                    <a class="dropdown-item" href="#">Lorem Ipsum</a>
                                </div>
                            </div>
                            <div class="btn-group mt-3">
                                <button type="button" style="border-radius: 20px;" class="btn btn-courseNav dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p>Topic 4: Lorem Ipsum<i data-feather="align-justify" style="height: 13px;float: right"></i></p>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Lorem Ipsum</a>
                                    <a class="dropdown-item" href="#">Lorem Ipsum</a>
                                    <a class="dropdown-item" href="#">Lorem Ipsum</a>
                                </div>
                            </div>  

                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div><!--page content-->
    </div><!--first col -->
    </div> <!--container -->
  </div><!--row -->

  <script>

$('#nav-browse').css('background-color','rgba(8, 205, 255, 0.1)');
$('#nav-browse').css('width','100%');
$('#nav-browse').css('border-radius','16px');

</script>

@endsection