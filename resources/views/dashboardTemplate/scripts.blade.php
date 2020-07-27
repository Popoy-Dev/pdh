<script src="{{ asset('asset/temp/js/app.js') }}"></script>
<script src="{{ asset('asset/temp/js/feather.min.js') }}"></script>
<script src="{{ asset('asset/temp/js/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('asset/temp/js/chat.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/temp/js/Chart.min.js') }}"></script>
<script src="{{ asset('asset/temp/js/template.js') }}"></script>
<script type="text/javascript">var BASE = {!! json_encode(url('/')) !!}</script>
<script type="text/javascript" src="{{ asset('asset/temp/js/moment.min.js') }}"></script>
<!-- <script type="text/javascript" src="{{ asset('asset/temp/js/jquery-ui.min.js') }}"></script> -->
<script type="text/javascript" src="{{ asset('asset/temp/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/temp/js/summernote.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/temp/js/summernote-bs4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/temp/js/sweetalert2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/temp/js/fullcalendar.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/temp/js/fullcalendar.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/intro.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/js/accordion.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/temp/js/nestable.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/temp/dropify/dropify.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/temp/js/ajaxForm.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/temp/js/video.js')}}"></script>
<script type="text/javascript" src="{{ asset('asset/temp/js/tempusdominus-bootstrap-4.js')}}"></script>

@if(Auth::guard('teacher')->check())
<script type="text/javascript" src="{{ asset('asset/js/teacher/teacher.js') }}"></script>
@else
<script type="text/javascript" src="{{ asset('asset/js/admin/dev.js') }}"></script>
@endif
@auth('web')
<script type="text/javascript" src="{{ asset('asset/js/student/slickQuiz.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/js/student/student.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/js/student/dev.js') }}"></script>
@if(Auth::user()->isLogin == 0 )
<div class="modal-backdrop fade show"></div>
@endif
@endauth
