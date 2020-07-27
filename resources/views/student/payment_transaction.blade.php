@extends('dashboardTemplate.main')

@section('content')

<div class="row justify-content-center my-3">
  <div class="col-lg-8 col-md-8">
    <div class="page-content">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr class="text-center">
                  <th>Status</th>
                  <th>Registration Fee</th>
                  <th>Amount</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $dt)
                <tr class="text-center">
                  <td>
                    <p class="font-weight-bold {{$dt->regfee_status == 0 ? 'text-warning' : 'text-success'}}">
                      {{ $dt->regfee_status == 0 ? 'Pending' : 'Success'}}
                    </p>
                  </td>
                  <td>
                    <p class="font-weight-bold {{$dt->regfee_status == 0 ? 'text-warning' : 'text-success'}}">
                      {{ $dt->regfee_status == 0 ? 'Unpaid' : 'Paid'}}
                    </p>
                  </td>
                  <td>{{ $dt->amount }}</td>
                  <td>
                    {{ date('F d, Y',strtotime($dt->updated_at)) }}
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <tr>
                    <td colspan="2" class="text-center">
                      <p style="font-size:20px;" class="font-weight-bold">
                        Total:
                      </p>
                    </td>
                    <td colspan="2" class="text-center">
                      <p style="font-size:20px;">
                        ₱ {{number_format($total,2)}}
                      </p>
                    </td>
                  </tr>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
