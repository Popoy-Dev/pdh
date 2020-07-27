@extends('dashboardTemplate.main')

@section('content')
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-10 col-md-10">
      <div class="page-content">
        <div class="row justify-content-center">
          <div class="col-lg-8 col-md-8">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Remaing Balance: ₱ {{$bal ? number_format($bal->balance,2) : '28,000.00' }}</h6>
                <form id="formSample" method="POST" action="{{url('/otc/payment')}}">
                  @csrf
                  @if(!$data)
                  <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-8">
                      <div class="form-group">
                        <label for="">Grade Level</label>
                        <select name="gradelevel" id="" class="form-control">
                          <option value="nursery">Nursery – Kinder 1 (3 to 4 y/o) </option>
                          <option value="kinder">Kinder 2 (Should be 5 y/o by August 31,2020) </option>
                          <option value="1">Grade 1</option>
                          <option value="2">Grade 2</option>
                          <option value="3">Grade 3</option>
                          <option value="4">Grade 4</option>
                          <option value="5">Grade 5</option>
                          <option value="6">Grade 6</option>
                          <option value="7">Grade 7</option>
                          <option value="8">Grade 8</option>
                          <option value="9">Grade 9</option>
                          <option value="10">Grade 10</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-8 col-md-8">
                      <div class="form-group">
                        <label for="reg_fee" class="nav-style" style="font-size:18px;">Registration Fee:</label>
                        <input type="text"
                        name="regfee"
                        class="input-payment form-control form-control-sm" id="reg_fee"
                        value="2000"autocomplete="off" readonly>
                      </div>
                    </div>
                    @else
                      <input type="text" name="gradelevel" value="{{ $data->grade }}" hidden>
                    @endif
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-4 ">
                      <div class="form-group bg-pisopay text-center mx-3 ">
                        <a href="#" class="pisopay">
                          <img src="{{ asset('asset/landing/credit.svg') }}" alt="" class="img-fluid my-3" >
                        </a>
                      </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                      <div class="form-group bg-otc text-center bg-blue">
                        <a href="#" class="otc" data-toggle="tooltip" title="SCHOOL OFFICE PAYMENT!">
                          <img src="{{ asset('asset/landing/Counter.svg') }}" alt="" class="img-fluid my-2">
                        </a>
                      </div>
                    </div>

                  </div>
                  <div class="otc-container">
                    <div class="row justify-content-center">
                      <div class="col-lg-8 col-md-8">
                        <div class="form-group">
                          <label for="otc-amount" class="nav-style" style="font-size:18px;">Amount:</label>
                          <input type="text"
                          name="amount"
                          class="input-payment
                          form-control form-control-sm amount"
                          id="otc-amount" autocomplete="off" >
                          <div class="amount"></div>
                        </div>
                      </div>
                    </div>
                  </div>



                  @if(date('Y-m-d',strtotime($date)) == '2020-06-15')
                  <div class="d-none pisopay-container">
                    <div class="row justify-content-center">
                      <div class="col-lg-8 col-md-8">
                        <div class="form-group">
                          <label for="reg_fee" class="nav-style" style="font-size:18px;">Payment:</label>
                          <select class="form-control input-payment payment" name="payment">
                            <option selected disabled>Choose payment</option>
                            <option value="f">Full Payment</option>
                            <option value="m" >Monthly</option>
                            <option value="q">Quarterly</option>
                            <option value="o">Others</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row justify-content-center d-none others-container">
                      <div class="col-lg-8 col-md-8">
                        <div class="form-group">
                          <label for="others-amount" class="nav-style" style="font-size:18px;">Amount:</label>
                          <input type="hidden" class="input-payment form-control form-control-sm others"
                          id="others-amount"
                          autocomplete="off" >
                        </div>
                      </div>
                    </div>

                    <div class="row justify-content-center">
                      <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                          <div class="card pricing">
                            <div class="card-body text-center p-body">
                              <p>Choose Payment</p>
                            </div>
                            <div class="card-footer p-footer text-center">

                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                  @else
                  <div class="container text-center d-none date my-3">
                    <p class="nav-style">Online payment will be available on June 15,2020</p>
                  </div>
                  @endif
                  <div class="text-center form-group">
                    <button type="submit" class="btn pay-tution mr-2 d-none ppayment">Proceed Payment</button>
                    <a href="#"  data-toggle="modal" data-target="#exampleModal" class="btn btn-warning mr-2" style="color:#fff;">Terms and Conditions</a>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Terms And Conditions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <p>
          Distance Learning Program (DLP) Enrollment Policies and Procedures

          Upon enrolling in Scuola Maria, through the Distance Learning Program, the parents or legal guardians of our students enter into this agreement which specifies the conditions of enrollment including payment of fees and registration procedures in exchange for the service offered by the institution.

          Payment of Fees
        </p>

        <ul>
          <li>
            • Each student must pay a one-time and non-refundable system registration fee of Php 2,000.00.
          </li>
          <li>
            • The total cost of the DLP is Php 28,000.00 for 10 academic months. Students may pay the full amount or by installment either on a monthly or quarterly basis. No interest rates will be applied for installment payments.
          </li>
          <li>
            • All learning materials can be accessed in the Learning Management System (LMS) of Scuola Maria on a prepaid basis. Access to the system shall be limited to students who were able to pay prior to the deadline.
          </li>
          <li>
            • Accounts must be settled before the issuance of report cards.
          </li>
        </ul>

        <p>
          Refund Policies

        </p>
        <ul>
          <li>
            • Only students who paid in full on or before June 24, 2020 can apply for refund.

          </li>
          <li>
            • Payment refunds shall follow the matrix below:

          </li>
        </ul>

        <p>Timing of Refund  Rate of Refund</p>
        <p>
          Prior to release of grades for 1st Grading  20%

        </p>
        <p>
          Prior to release of grades for 2nd Grading  10%

        </p>
        <p>
          Prior to release of grades for 3rd Grading  5%

        </p>
        <p>
          Prior to release of final grades  No refund

        </p>

        <ul>
          <li>
            • The parent or legal guardian must notify Scuola Maria in writing for refund claims.

          </li>
          <li>
            • Processing of refunds may take up to four (4) weeks.

          </li>
        </ul>
        <p>
          Enrollment Procedures

        </p>

        <ul>
          <li>
            • Create an e-mail address for your child through GMAIL (gmail.com). Kindly follow this format: firstnamelastname.scuolamaria@gmail.com
            (e.g. juandelacruz.scuolamaria@gmail.com)
          </li>
          <li>
            • Go to www.scuolamaria.edu.ph
          </li>
          <li>
            • Create an account using the new e-mail address.
          </li>
          <li>
            • Pay through the website using the different payment options or in cash at the school office.
            Minimum required payment is Php 4,800.00 (one-time system registration and one month advance).
          </li>
          <li>
            • Wait for the e-mail confirmation that your account has been activated.
          </li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn pay-tution" id="proceed" data-dismiss="modal">I Agree</button>
      </div>
    </div>
  </div>
</div>
@endsection
