@extends('dashboardTemplate.main')

@section('content')

  <div class="row justify-content-center my-3">
    <div class="col-lg-10 col-md-10">
      <div class="page-content">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Student No.</th>
                    <th>
                      Name
                    </th>
                    <th>Grade</th>
                    <th>Amount</th>
                    <th>Registration Fee</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $dt)
                  @php
                  $user = Helper::getUser($dt->in_user_id)
                  @endphp
                  <tr>
                    <td>
                      {!!$user->lrn_no!!}

                    </td>
                    <td>
                      {!! $user->firstname !!}
                      {!! $user->middlename !!}
                      {!! $user->lastname !!}
                    </td>
                    <td>{{ $dt->grade}}</td>
                    <td>{{ $dt->amount }}</td>
                    <td>
                      <p class="nav-style {{$dt->regfee_status == 0 ? 'text-warning' : 'text-success'}}">
                        {{ $dt->regfee_status == 0 ? 'Unpaid Reg fee' : 'Paid Reg fee'}}
                      </p>
                    </td>
                    <td>
                      <p class="nav-style {{$dt->inv_status == 0 ? 'text-warning' : 'text-success'}}">
                        {{ $dt->inv_status == 0 ? 'Unpaid' : 'Paid'}}
                      </p>
                    </td>
                    <td>
                    {!! date('F d, Y',strtotime($dt->created_at)) !!}
                    </td>
                    <td>
                      @if($dt->inv_status == 0)
                      <form method="POST">
                        @csrf
                        <button class="btn pay-tution approved" data-ids="{{ $dt->id }}" data-user="{{ $dt->in_user_id }}">
                          For Approval
                        </button>
                      </form>
                      @else
                      <button class="btn publish">
                        Approved
                      </button>
                      @endif
                    </td>

                  </tr>
                  @endforeach
                </tbody>
              {{ $data->links() }}

              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
