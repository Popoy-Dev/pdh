@extends('dashboardTemplate.main')

@section('content')

<div class="container my-5">
  <div class="row">
    <div class="col-lg-10 col-md-10">
      <div class="page-content">
        <div class="card">
          <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-line " id="lineTab" role="tablist">
              <li class="nav-item ">
                <a class="nav-link active" id="publish-line-tab" data-toggle="tab" href="#publish" role="tab" aria-controls="home" aria-selected="true">Publish</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-line-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">For Approval</a>
              </li>
            </ul>
            <div class="tab-content mt-3 p-2" id="lineTabContent">
              <div class="tab-pane fade show active " id="publish" role="tabpanel" aria-labelledby="publish-line-tab">
                <div class="responsive-table">
                  <table class="table table-striped">
                    <thead>
                      <th>Subject</th>
                      <th>Author</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                      @foreach($publish as $pub)
                      <tr>
                        <td>{{ $pub->subject .' '. $pub->grade}}</td>
                        <td>{!! Helper::getTeacher($pub->uploader_id) !!}</td>
                        <td>{{$pub->created_at->diffForHumans() }}</td>
                        <td>
                          <a href="#" class="btn instructional btn-unpublish" data-ids="{{ $pub->id }}">Unpublish</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="mt-2">
                  {{ $publish->links('pagination::bootstrap-4') }}
                </div>
              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-line-tab">
                <div class="responsive-table">
                  <table class="table table-striped">
                    <thead>
                      <th>Subject</th>
                      <th>Author</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                       @foreach($approval as $pub)
                        <tr>
                          <td>{{ $pub->subject .' '. $pub->grade}}</td>
                          <td>{!! Helper::getTeacher($pub->uploader_id) !!}</td>
                          <td>{{$pub->created_at->diffForHumans() }}</td>
                          <td>
                            <a href="#" class="btn pay-tution for-approval" data-ids="{{ $pub->id }}">For Approval</a>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="mt-2">
                  {{ $approval->links('pagination::bootstrap-4') }}
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
