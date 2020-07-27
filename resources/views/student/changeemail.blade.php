@extends('dashboardTemplate.main')

@section('content')
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-10 col-md-10">
      <div class="page-content">
        <div class="row">
          <div class="col-lg-8 col-md-8">
            <div class="card"  data-step="2" data-intro="Sample">
              <div class="card-header">
                Change Email Address
              </div>
              <form id="changeEmail" method="POST" action="{{ url('/put/email') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="">New Email</label>
                    <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                    <div class="email"></div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="form-group float-right">
                    <button type="submit" class="btn pay-tution"><i class="mdi mdi mdi-content-save"></i> Save</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="{{ asset('js/intro.js') }}"></script>
<script type="text/javascript">
if (RegExp('multipage', 'gi').test(window.location.search)) {

  var x = window.location.href;
  console.log(x);
  if (x == 'http://hdp.pci/change-email?multipage=true') {
    introJs().setOption('doneLabel', 'Next page').start().oncomplete(function() {
      window.location.href =   BASE+'/chat?multipage=true';
    });
  }
     }
</script>
@endsection
