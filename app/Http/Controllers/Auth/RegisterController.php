<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Webpatser\Uuid\Uuid;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Register Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles the registration of new users as well as their
  | validation and creation. By default this controller uses a trait to
  | provide this functionality without requiring any additional code.
  |
  */

  use RegistersUsers;

  /**
  * Where to redirect users after registration.
  *
  * @var string
  */
  protected $redirectTo = RouteServiceProvider::HOME;

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('guest');
  }

  /**
  * Get a validator for an incoming registration request.
  *
  * @param  array  $data
  * @return \Illuminate\Contracts\Validation\Validator
  */
  public function uuid(){
    $uuid = uuid::generate(4);
    return $uuid;
  }
  protected function validator(array $data)
  {
    return Validator::make($data, [
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
      'last_name' => ['required', 'string'],
      'first_name' => ['required', 'string'],
      'birthplace' => ['required', 'string'],
      'regilion' => ['string'],
      'gender' => ['required','string'],
      'address' => ['required','string', 'max:255'],
      'father_name' => ['string','nullable'],
      'father_contact' => ['numeric','nullable'],
      'mother_name' => ['string','nullable'],
      'mother_contact' => ['numeric','nullable'],
      'guardian_name' => ['string','nullable'],
      'relationship' => ['string','nullable'],
      'guardian_contact' => ['numeric','nullable'],
      'guardian_name' => ['string','nullable'],
      'relationship' => ['string','nullable'],
      'guardian_contact' => ['numeric','nullable'],
      'student_status' => ['string'],
      'student_number' => ['numeric','nullable']
    ]);
  }

  /**
  * Create a new user instance after a valid registration.
  *
  * @param  array  $data
  * @return \App\User
  */
  protected function create(array $data)
  {
    $bday = request('month').'-'.request('day').'-'.request('year');
    $uuid = Self::uuid();
     $data = User::create([
      'uuid' => $uuid,
      'email' => request('email'),
      'password' => bcrypt($data['password']),
      'firstname' => request('first_name'),
      'middlename' => request('middle_name'),
      'lastname' => request('last_name'),
      'birthplace' => request('birthplace'),
      'religion' => request('religion'),
      'gender' => request('gender'),
      'address' => request('address'),
      'birthday' => $bday,
      'fathername' => request('father_name'),
      'fathercontact' => request('father_contact'),
      'mothername' => request('mother_name'),
      'mothercontact' => request('mother_contact'),
      'guardianname' => request('guardian_name'),
      'relationship' => request('relationship'),
      'guardiancontact' => request('guardian_contact'),
      'std_status' => request('std_status'),
      'grade' => request('grade'),
      'std_no' => request('std_no'),
    ]);

    $lrn = User::where('id',$data->id)->first();
    $year = date('Y',strtotime('+1 year',strtotime($lrn->created_at)));
    $lrn->lrn_no = $year.'-00'.$data->id;
    $lrn->save();

    return $data;
  }
}
