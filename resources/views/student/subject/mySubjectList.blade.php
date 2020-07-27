@extends('student.subject.mySubject')

@section('subject')
<div class="row my-3">
  <div class="col-lg-10 col-md-10 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class="nav-style">
              <tr>
                <th class="th-sub">Subject</th>
                <th>Status</th>
                <th>Quiz</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr class="nav-style">
                <td class="assess-learning">Quiz/Assessment title </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar"
                    style="width: 25%;" aria-valuenow="25"
                    aria-valuemin="0" aria-valuemax="100">25%</div>
                  </div>
                </td>
                <td>20/25</td>
                <td>
                  <a href="" class="btn btn-subj"> View</a>
                </td>
              </tr>

              <tr>
                <td>Quiz/Assessment title </td>
                <td>
                  <button class="btn btn-subj">Completed</button>
                </td>
                <td>20/25</td>
                <td>
                  <a href="" class="btn btn-subj"> View</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>


@endsection
