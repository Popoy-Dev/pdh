@extends('dashboardTemplate.main')

@section('content')
<div class="container my-5">
  <div class="row">
    <div class="col-lg-9 col-md-9">
      <div class="page-content">
        <div class="col-md-12">
          <div class="card my-5" data-step="2" data-intro="Sample">

          <div class="card">
            <div class="card-body">
              <div id='fullcalendar'></div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="createEventModal" class="modal fade">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="modalTitle2" class="modal-title">Add event</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
      </div>
      <div id="modalBody2" class="modal-body">
        <form>
          <div class="form-group">
            <label for="formGroupExampleInput">Example label</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Another label</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="{{ asset('js/intro.js') }}"></script>
<script type="text/javascript">
if (RegExp('multipage', 'gi').test(window.location.search)) {

  var x = window.location.href;
  console.log(x);
  if (x == 'http://hdp.pci/my-task?multipage=true') {
    introJs().setOption('doneLabel', 'Next page').start().oncomplete(function() {
      window.location.href =   BASE+'/forum?multipage=true';
    });
  }
     }
</script>
<script>

    $('#nav-calendar').css('background-color','rgba(8, 205, 255, 0.1)');
    $('#nav-calendar').css('width','100%');
    $('#nav-calendar').css('border-radius','16px');

</script>
@endsection
