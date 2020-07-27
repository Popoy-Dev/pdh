<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <title>Scuola Maria</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @include('dashboardTemplate.style')
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap');
  </style>

</head>
@auth('web')
<body style="{{  Auth::user()->isLogin == 0 ? 'background-color: rgb(229, 229, 229); padding-right: 15px;' : 'background-color:#E5E5E5;'}}" class="{{ Auth::user()->isLogin == 0 ? 'modal-open' : ''}}">
@else
<body style="background-color:#E5E5E5;">
@endauth
  <script src="{{ asset('asset/temp/js/spinner.js') }}"></script>
