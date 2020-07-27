@extends('student.subject.mySubject')

@section('subject')
<div class="row justify-content-row">
  <div class="col-lg-10 col-md-10">
    <div class="row">
      @if($data->isNotEmpty())
      @foreach($data as $dt)
      <div class="col-lg-4 col-md-4 my-2">
        <div class="card">
          <div class="card-header">
            <img src="https://scuola-maria.s3-ap-southeast-1.amazonaws.com/local-dev/subjects/{{ $dt->s_uuid }}/subject-thumbnail/{{$dt->photo}}"
            class="card-img-top img-fluid" alt="...">
          </div>
          <div class="card-body">
            <h5 class="nav-style assess">{{ $dt->subject.' '.$dt->grade}}</h5>
            <small class="nav-style card-text" style="font-size:14px;">{!! $dt->description !!}</small>
            <br/>
            <small class="nav-style card-text" style="font-size:10px;">{{ $dt->first_name .' '. $dt->last_name}}</small>
            <!-- <div class="progress ht-10 mt-3">
              <div class="progress-bar" role="progressbar" style="width: 25%;background: #53BA6A!important;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
            </div> -->
            <!-- <p class="mt-3">Quiz:20/25</p> -->
            <div class="text-center mt-3">
              <a href="{{ url('/subject',$dt->s_uuid) }}" class="btn btn-subj" style="border-radius: 10px;">Learn</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      @else
      <div class="col-lg-12 col-md-12 my-2">
        <div class="card">
          <div class="card-body">

            <div class="text-center p-3">
              <img src="{{ asset('asset/landing/avatar').'/'.Auth::user()->photo.'.svg' }}" alt="" class="img-fluid" width="200" height="200">
              <p class="nav-style my-3" style="font-size:18px;">
                You don’t have subjects yet. <br/> Please settle payment to add.
              </p>
              <a href="#" class="btn pay-tution">Pay Tuition</a>
            </div>

          </div>
        </div>
      </div>
      @endif

    </div>
  </div>
</div>
@endsection
