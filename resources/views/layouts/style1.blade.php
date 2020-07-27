
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="PCI Tech Center" content="Scuola Maria">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Scuola Maria</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('asset/css/page.css') }}">
</head>
<body>

  <div id="app" class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a href="#">
          <img src="{{ asset('asset/landing/logo.svg') }}" alt="" width="357" height="108" class="block w-full">
        </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div id="navbarNavDropdown" class="navbar-collapse collapse">
              <ul class="navbar-nav ml-5">
                  <li class="nav-item active mx-5 nav-style-link">
                      <a class="nav-link" href="#">About Us <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item mx-5 nav-style-link">
                      <a class="nav-link" href="#">DLP</a>
                  </li>
                  <li class="nav-item mx-5 nav-style-link">
                      <a class="nav-link" href="#">Blogs</a>
                  </li>
                  <li class="nav-item mx-5 nav-style-link">
                      <a class="nav-link" href="#">Contact Us</a>
                  </li>
                  <li class="nav-item mx-5 nav-style-link get-started">
                      <a class="nav-link" href="#">GET STARTED</a>
                  </li>
              </ul>

          </div>
      </nav>
  </div>
  <!-- <nav class="navbar navbar-expand-sm navbar-light">
    <div class="container">
      <a href="#">
        <img src="{{ asset('asset/landing/logo.svg') }}" alt="" width="357" height="108" class="block w-full">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse"
      data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>

    </div>
  </div>




</nav> -->
