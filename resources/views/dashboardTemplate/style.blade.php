<link href="{{ asset('asset/temp/css/app.css') }}" rel="stylesheet" />
<link href="{{ asset('asset/temp/feather-font/css/iconfont.css') }}" rel="stylesheet" />
<link href="{{ asset('asset/temp/css/flag-icon.min.css')}}" rel="stylesheet" />
<link href="{{ asset('asset/temp/mdi/css/materialdesignicons.min.css')}}" rel="stylesheet" />
<link href="{{ asset('asset/temp/css/perfect-scrollbar.css') }}" rel="stylesheet" />
<link href="{{ asset('asset/temp/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('asset/temp/css/summernote.min.css') }}" rel="stylesheet">
<link href="{{ asset('asset/temp/css/summernote-bs4.min.css') }}" rel="stylesheet">
<link href="{{ asset('asset/temp/css/sweetalert2.min.css') }}" rel="stylesheet">
<link href="{{ asset('asset/temp/css/fullcalendar.min.css') }}" rel="stylesheet">
<link href="{{ asset('asset/temp/css/nestable.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/introjs.min.css') }}">
<link href="{{ asset('asset/temp/dropify/dropify.min.css') }}" rel="stylesheet">
<link href="{{ asset('asset/temp/css/video-js.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('asset/css/accordion.css') }}">
<link rel="stylesheet" href="{{ asset('asset/teacher/css/font-awesome.min.css') }}">

<link rel="stylesheet" href="{{ asset('asset/temp/css/tempusdominus-bootstrap-4.min.css') }}">

<link href="{{ asset('asset/css/student/style.css') }}" rel="stylesheet">

<link href="{{ asset('asset/css/admin/style.css') }}" rel="stylesheet">
@if(Auth::guard('admin')->check())
@elseif(Auth::guard('teacher')->check())
<link href="{{ asset('asset/css/student/style.css') }}" rel="stylesheet">
@else
<link href="{{ asset('asset/css/student/slickquiz/master.css') }}" rel="stylesheet">
<!-- <link href="{{ asset('asset/css/student/slickquiz/reset.css') }}" rel="stylesheet"> -->
<link href="{{ asset('asset/css/student/slickquiz/slickquiz.css') }}" rel="stylesheet">
@endif
