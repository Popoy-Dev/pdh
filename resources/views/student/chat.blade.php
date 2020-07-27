@extends('dashboardTemplate.main')

@section('content')
<div class="container my-5">

  <div class="page-content">

    <div class="row chat-wrapper">
      <div class="col-md-10">
        <!-- <div class="card"  style="background-color: #F9FAFB">
          <div class="card-body"> -->
            <div class="row position-relative" style="background-color:">
              <div class="col-lg-4 chat-aside">
                <div class="aside-content">
                  <div class="aside-header">
                    <div class="d-flex justify-content-between align-items-center pb-2 mb-2">
                      <div class="d-flex align-items-center">
                        <!-- <figure class="mr-2 mb-0">
                          <img src="{{ asset('asset/landing/avatar/ava3.svg') }}" class="img-sm rounded-circle" alt="profile">
                          <div class="status online"></div>
                        </figure>
                        <div>
                          <h6>{{ Auth::user()->firstname .' '. Auth::user()->lastname}}</h6>
                          <p class="text-muted tx-13">Software Developer</p>
                        </div> -->
                      </div>
                      <!-- <div class="dropdown">
                        <button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="icon-lg text-muted pb-3px" data-feather="settings" data-toggle="tooltip" title="Settings"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View Profile</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit Profile</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="aperture" class="icon-sm mr-2"></i> <span class="">Add status</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="settings" class="icon-sm mr-2"></i> <span class="">Settings</span></a>
                        </div>
                      </div> -->
                    </div>
                    <form class="search-form mb-5">
                        <input type="text" class="form-control border-0 "
                        id="searchForm"
                         placeholder="Search here..."
                         style="border-radius: 20px">
                         <span style="float: right;margin-top: -28px;">
                         <i data-feather="search" style="height: 14px;color: #B8B8B8"></i>
                        </span>
                    </form>
                  </div>
                  <div class="aside-body">
                    <!-- <ul class="nav nav-tabs mt-3" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="chats-tab" data-toggle="tab" href="#chats" role="tab" aria-controls="chats" aria-selected="true">
                          <div class="d-flex flex-row flex-lg-column flex-xl-row align-items-center">
                            <i data-feather="message-square" class="icon-sm mr-sm-2 mr-lg-0 mr-xl-2 mb-md-1 mb-xl-0"></i>
                            <p class="d-none d-sm-block">Chats</p>
                          </div>
                        </a>
                      </li>

                    </ul> -->
                    <div class="tab-content mt-3">
                      <div class="tab-pane fade show active" data-step="2" data-intro="Sample" id="chats" role="tabpanel" aria-labelledby="chats-tab">
                        <div>
                          <p class="text-muted mb-1">Recent chats</p>
                          <ul class="list-unstyled chat-list px-1">
                            <li class="chat-item pr-1">
                              <a href="javascript:;" class="d-flex align-items-center">
                                <figure class="mb-0 mr-2">
                                  <img src="{{ asset('asset/landing/avatar/ava2.svg') }}" class="img-xs rounded-circle" alt="user">
                                  <div class="status online"></div>
                                </figure>
                                <div class="d-flex justify-content-between flex-grow border-bottom">
                                  <div>
                                    <p class="text-body font-weight-bold">John Doe</p>
                                    <p class="text-muted tx-13">Hi, How are you?</p>
                                  </div>
                                  <div class="d-flex flex-column align-items-end">
                                    <p class="text-muted tx-13 mb-1">4:32 PM</p>
                                    <div class="badge badge-pill badge-primary ml-auto">5</div>
                                  </div>
                                </div>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="calls" role="tabpanel" aria-labelledby="calls-tab">
                        <p class="text-muted mb-1">Recent calls</p>
                        <ul class="list-unstyled chat-list px-1">
                          <li class="chat-item pr-1">
                            <a href="javascript:;" class="d-flex align-items-center">
                              <figure class="mb-0 mr-2">
                                <img src="../assets/images/faces/face4.jpg" class="img-xs rounded-circle" alt="user">
                                <div class="status online"></div>
                              </figure>
                              <div class="d-flex align-items-center justify-content-between flex-grow border-bottom">
                                <div>
                                  <p class="text-body">Jensen Combs</p>
                                  <div class="d-flex align-items-center">
                                    <i data-feather="arrow-up-right" class="icon-sm text-success mr-1"></i>
                                    <p class="text-muted tx-13">Today, 03:11 AM</p>
                                  </div>
                                </div>
                                <div class="d-flex flex-column align-items-end">
                                  <i data-feather="phone-call" class="text-success icon-md"></i>
                                </div>
                              </div>
                            </a>
                          </li>
                          <li class="chat-item pr-1">
                            <a href="javascript:;" class="d-flex align-items-center">
                              <figure class="mb-0 mr-2">
                                <img src="../assets/images/faces/face5.jpg" class="img-xs rounded-circle" alt="user">
                                <div class="status offline"></div>
                              </figure>
                              <div class="d-flex align-items-center justify-content-between flex-grow border-bottom">
                                <div>
                                  <p class="text-body">Leonardo Payne</p>
                                  <div class="d-flex align-items-center">
                                    <i data-feather="arrow-down-left" class="icon-sm text-success mr-1"></i>
                                    <p class="text-muted tx-13">Today, 11:41 AM</p>
                                  </div>
                                </div>
                                <div class="d-flex flex-column align-items-end">
                                  <i data-feather="video" class="text-success icon-md"></i>
                                </div>
                              </div>
                            </a>
                          </li>
                          <li class="chat-item pr-1">
                            <a href="javascript:;" class="d-flex align-items-center">
                              <figure class="mb-0 mr-2">
                                <img src="../assets/images/faces/face6.jpg" class="img-xs rounded-circle" alt="user">
                                <div class="status offline"></div>
                              </figure>
                              <div class="d-flex align-items-center justify-content-between flex-grow border-bottom">
                                <div>
                                  <p class="text-body">Carl Henson</p>
                                  <div class="d-flex align-items-center">
                                    <i data-feather="arrow-down-left" class="icon-sm text-danger mr-1"></i>
                                    <p class="text-muted tx-13">Today, 04:24 PM</p>
                                  </div>
                                </div>
                                <div class="d-flex flex-column align-items-end">
                                  <i data-feather="phone-call" class="text-danger icon-md"></i>
                                </div>
                              </div>
                            </a>
                          </li>
                          <li class="chat-item pr-1">
                            <a href="javascript:;" class="d-flex align-items-center">
                              <figure class="mb-0 mr-2">
                                <img src="../assets/images/faces/face7.jpg" class="img-xs rounded-circle" alt="user">
                                <div class="status online"></div>
                              </figure>
                              <div class="d-flex align-items-center justify-content-between flex-grow border-bottom">
                                <div>
                                  <p class="text-body">Jensen Combs</p>
                                  <div class="d-flex align-items-center">
                                    <i data-feather="arrow-down-left" class="icon-sm text-danger mr-1"></i>
                                    <p class="text-muted tx-13">Today, 12:53 AM</p>
                                  </div>
                                </div>
                                <div class="d-flex flex-column align-items-end">
                                  <i data-feather="video" class="text-danger icon-md"></i>
                                </div>
                              </div>
                            </a>
                          </li>
                          <li class="chat-item pr-1">
                            <a href="javascript:;" class="d-flex align-items-center">
                              <figure class="mb-0 mr-2">
                                <img src="../assets/images/faces/face2.jpg" class="img-xs rounded-circle" alt="user">
                                <div class="status online"></div>
                              </figure>
                              <div class="d-flex align-items-center justify-content-between flex-grow border-bottom">
                                <div>
                                  <p class="text-body">John Doe</p>
                                  <div class="d-flex align-items-center">
                                    <i data-feather="arrow-down-left" class="icon-sm text-success mr-1"></i>
                                    <p class="text-muted tx-13">Today, 01:42 AM</p>
                                  </div>
                                </div>
                                <div class="d-flex flex-column align-items-end">
                                  <i data-feather="video" class="text-success icon-md"></i>
                                </div>
                              </div>
                            </a>
                          </li>
                          <li class="chat-item pr-1">
                            <a href="javascript:;" class="d-flex align-items-center">
                              <figure class="mb-0 mr-2">
                                <img src="../assets/images/faces/face3.jpg" class="img-xs rounded-circle" alt="user">
                                <div class="status offline"></div>
                              </figure>
                              <div class="d-flex align-items-center justify-content-between flex-grow border-bottom">
                                <div>
                                  <p class="text-body">John Doe</p>
                                  <div class="d-flex align-items-center">
                                    <i data-feather="arrow-up-right" class="icon-sm text-success mr-1"></i>
                                    <p class="text-muted tx-13">Today, 12:01 AM</p>
                                  </div>
                                </div>
                                <div class="d-flex flex-column align-items-end">
                                  <i data-feather="phone-call" class="text-success icon-md"></i>
                                </div>
                              </div>
                            </a>
                          </li>
                        </ul>
                      </div>
                      <div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                        <p class="text-muted mb-1">Contacts</p>
                        <ul class="list-unstyled chat-list px-1">
                          <li class="chat-item pr-1">
                            <a href="javascript:;" class="d-flex align-items-center">
                              <figure class="mb-0 mr-2">
                                <img src="../assets/images/faces/face2.jpg" class="img-xs rounded-circle" alt="user">
                                <div class="status offline"></div>
                              </figure>
                              <div class="d-flex align-items-center justify-content-between flex-grow border-bottom">
                                <div>
                                  <p class="text-body">Amiah Burton</p>
                                  <div class="d-flex align-items-center">
                                    <p class="text-muted tx-13">Front-end Developer</p>
                                  </div>
                                </div>
                                <div class="d-flex align-items-end text-body">
                                  <i data-feather="message-square" class="icon-md text-success mr-2"></i>
                                  <i data-feather="phone-call" class="icon-md text-primary mr-2"></i>
                                  <i data-feather="video" class="icon-md text-danger"></i>
                                </div>
                              </div>
                            </a>
                          </li>
                          <li class="chat-item pr-1">
                            <a href="javascript:;" class="d-flex align-items-center">
                              <figure class="mb-0 mr-2">
                                <img src="../assets/images/faces/face3.jpg" class="img-xs rounded-circle" alt="user">
                                <div class="status online"></div>
                              </figure>
                              <div class="d-flex align-items-center justify-content-between flex-grow border-bottom">
                                <div>
                                  <p class="text-body">John Doe</p>
                                  <div class="d-flex align-items-center">
                                    <p class="text-muted tx-13">Back-end Developer</p>
                                  </div>
                                </div>
                                <div class="d-flex align-items-end text-body">
                                  <i data-feather="message-square" class="icon-md text-success mr-2"></i>
                                  <i data-feather="phone-call" class="icon-md text-primary mr-2"></i>
                                  <i data-feather="video" class="icon-md text-danger"></i>
                                </div>
                              </div>
                            </a>
                          </li>
                          <li class="chat-item pr-1">
                            <a href="javascript:;" class="d-flex align-items-center">
                              <figure class="mb-0 mr-2">
                                <img src="../assets/images/faces/face4.jpg" class="img-xs rounded-circle" alt="user">
                                <div class="status offline"></div>
                              </figure>
                              <div class="d-flex align-items-center justify-content-between flex-grow border-bottom">
                                <div>
                                  <p class="text-body">Yaretzi Mayo</p>
                                  <div class="d-flex align-items-center">
                                    <p class="text-muted tx-13">Fullstack Developer</p>
                                  </div>
                                </div>
                                <div class="d-flex align-items-end text-body">
                                  <i data-feather="message-square" class="icon-md text-success mr-2"></i>
                                  <i data-feather="phone-call" class="icon-md text-primary mr-2"></i>
                                  <i data-feather="video" class="icon-md text-danger"></i>
                                </div>
                              </div>
                            </a>
                          </li>
                          <li class="chat-item pr-1">
                            <a href="javascript:;" class="d-flex align-items-center">
                              <figure class="mb-0 mr-2">
                                <img src="../assets/images/faces/face5.jpg" class="img-xs rounded-circle" alt="user">
                                <div class="status offline"></div>
                              </figure>
                              <div class="d-flex align-items-center justify-content-between flex-grow border-bottom">
                                <div>
                                  <p class="text-body">John Doe</p>
                                  <div class="d-flex align-items-center">
                                    <p class="text-muted tx-13">Front-end Developer</p>
                                  </div>
                                </div>
                                <div class="d-flex align-items-end text-body">
                                  <i data-feather="message-square" class="icon-md text-success mr-2"></i>
                                  <i data-feather="phone-call" class="icon-md text-primary mr-2"></i>
                                  <i data-feather="video" class="icon-md text-danger"></i>
                                </div>
                              </div>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Card Start -->
              <div class="col-lg-8 chat-content p-4" style="background-color: #fff;border-radius: 20px;">
                <div class="chat-header border-bottom pb-2">
                  <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                      <i data-feather="corner-up-left" id="backToChatList" class="icon-lg mr-2 ml-n2 text-muted d-lg-none"></i>
                      <figure class="mb-0 mr-2">
                        <img src="{{ asset('asset/landing//avatar/ava2.svg') }}" class="img-sm rounded-circle" alt="image">
                        <div class="status online"></div>
                        <div class="status online"></div>
                      </figure>
                      <div data-step="3" data-intro="Sample" >
                        <p>Kurt Duane Alagar </p>
                        <!-- <p class="text-muted tx-13">Back-end Developer</p> -->
                        <div class="d-flex justify-content-between">
                          <div class="d-flex align-items-center">
                              <button class="mr-2" style="padding: 6px;
                              background: rgba(8, 196, 255, 0.17);
                              border-radius: 100px;color: #08C4FF;border: none;font-size: 12px;">English 9 & 10</button>
                              <button class="mr-2" style="padding: 6px;
                              background: rgba(8, 196, 255, 0.17);
                              border-radius: 100px;color: #08C4FF;border: none;font-size: 12px;">Values 7 & 8</button>
                              <button class="mr-2" style="padding: 6px;
                              background: rgba(8, 196, 255, 0.17);
                              border-radius: 100px;color: #08C4FF;border: none;font-size: 12px;">Filipino 9 & 10</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="chat-body" data-step="4" data-intro="Sample" >
                  <ul class="messages">
                    <li class="message-item friend">
                      <img src="{{ asset('asset/landing//avatar/ava2.svg') }}" class="img-xs rounded-circle" alt="avatar">
                      <div class="content">
                        <div class="message">
                          <div class="bubble" style="border: 1.5px solid #E9E9E9;padding: 10px;border-radius: 50px;">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                          </div>
                          <span>8:12 PM</span>
                        </div>
                      </div>
                    </li>
                    <li class="message-item me">
                      <img src="{{ asset('asset/landing/avatar/ava3.svg') }}" class="img-xs rounded-circle" alt="avatar">
                      <div class="content">
                        <div class="message">
                          <div class="bubble" style="background: #08C4FF;padding: 10px;border-radius: 50px;color: #fff">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry printing and typesetting industry.</p>
                          </div>
                        </div>
                        <div class="message">
                          <div class="bubble" style="background: #08C4FF;padding: 10px;border-radius: 50px;color: #fff">
                            <p>Lorem Ipsum.</p>
                          </div>
                          <span>8:13 PM</span>
                        </div>
                      </div>
                    </li>

                    <li class="message-item friend">
                      <img src="{{ asset('asset/landing/avatar/ava2.svg') }}" class="img-xs rounded-circle" alt="avatar">
                      <div class="content">
                        <div class="message">
                          <div class="bubble" style="border: 1.5px solid #E9E9E9;padding: 10px;border-radius: 50px;">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                          </div>
                          <span>8:17 PM</span>
                        </div>
                      </div>
                    </li>

                  </ul>
                </div>
                <div class="chat-footer d-flex" data-step="5" data-intro="Sample" >

                  <form class="search-form flex-grow mr-2">
                    <div class="input-group">
                      <input type="text" class="form-control rounded-pill" id="chatForm" placeholder="Type a message">
                    </div>
                  </form>
                  <div>
                    <button type="button" class="btn btn-primary btn-icon rounded-circle" style="background: #08C4FF;">
                      <i data-feather="send"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          <!-- </div>
        </div> -->
      </div>
    </div>





  </div>
</div>

<script>
     $('.sidenavNew').css('width','70px');
      $('.sidenavNew').css('height','700px');
      $('.rightNav').css('display','none');
      $('.navshow').css('display','block');
      $('.calendar-show').css('display','block');
      $('.innerSidenav').css('margin-top','50px');

    $('#nav-message').css('background-color','rgba(8, 205, 255, 0.1)');
    $('#nav-message').css('width','100%');
    $('#nav-message').css('border-radius','16px');

</script>
<script type="text/javascript" src="{{ asset('js/intro.js') }}"></script>
<script type="text/javascript">
if (RegExp('multipage', 'gi').test(window.location.search)) {
   introJs().start();
     }
</script>
@endsection
