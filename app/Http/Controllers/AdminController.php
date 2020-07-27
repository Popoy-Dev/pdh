<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use DB;
use App\Admin;
use App\User;
use App\Subject;
use App\Teacher;
use App\Helpers\Helper;
use App\Otc;
use App\Invoice;
use App\Payment;
use App\Balance;
use App\Enrollment;

class AdminController extends Controller
{
  public function __construct()
  {
    $this->middleware('admin');
  }
  public function home(){

    $data = User::count();
    $user = User::orderBy('created_at','DESC')->paginate(10);
    $subject = Subject::count();

    return view('admin.home',compact('data','user','subject'));
  }
  public function payment(){
    $data = Invoice::orderBy('created_at','DESC')->paginate(10);
    return view('admin.payment.payment',compact('data'));
  }

  public function subject(){
    $publish = Subject::where('status',1)->paginate(5,['*'],'publish');
    $approval = Subject::where('status',2)->paginate(5,['*'],'unpublish');
    return view('admin.subject',compact('publish','approval'));
  }

  public function teacher(){
    return view('admin.teacher');
  }

  // AJAX
  //Chart dashboard
  public function gradelevel(){
    $grd = [];
    $cgrade = [];
    $enroll = Enrollment::where('status',1)->select('grade',
    DB::raw('count(grade) as cgrade'))
    ->groupBy('grade')
    ->get();

    foreach($enroll as $key => $value) {
      $val ='';
      if($value->grade == 'nursery' || $value->grade == 'kinder'){
        $val = $value->grade;
      }else{
        $val = 'Grade '. $value->grade;
      }
      $grd[]=$val;
      $cgrade[] = $value->cgrade;
    }

    return response()->json(['gradelvl' => $grd, 'count' => $cgrade ]);
  }
  public function approvedStudent(){
    $var = [];
    $data = Invoice::where('id',request('ids'))->first();
    $datas = Invoice::where('in_user_id',request('uid'))->select('id')->get();

    foreach ($datas as $key => $value) {
      $var[] = $value->id;
    }
    $payment = Payment::where('invoice_id',$data->id)->where('py_pay_type','manual')->first();

    $balance = Balance::where('user_id',$data->in_user_id)->first();

    $enroll = Enrollment::where('user_id',$data->in_user_id)->first();

    $bal = $balance->balance - $data->amount;

    $data->regfee_status = 1;

    $data->inv_status = 1;

    $payment->py_status = 'success';

    $balance->balance = $bal;

    if($enroll){
      $enroll->status = 1;
      $enroll->invoice_id = $var;
      $enroll->save();
    }else{
      Enrollment::create([
        'e_uuid' => Helper::getUUID(),
        'grade' => $data->grade,
        'user_id' =>$data->in_user_id,
        'invoice_id' => $data->id,
        'status' => 1,
      ]);
    }

    $payment->save();
    $data->save();
    $balance->save();

    return response()->json(['msg' => 'success']);
  }

  //Unpublish
  public function unpublish(){
    $data = Subject::where('id',request('ids'))->select('id','status')->first();
    $data->status = 2;
    $data->save();

    return response()->json(['msg' => 'success']);
  }

  //for approval
  public function forApproval(){
    $data = Subject::where('id',request('ids'))->select('id','status')->first();
    $data->status = 1;
    $data->save();
    return response()->json(['msg' => 'success']);
  }

  //create teacher
  public function addTeacher(){
    $this->validate(request(),[
      'email' => 'required|email|max:255|unique:teachers',
      'password' => 'required|min:8|confirmed',
    ]);
    Teacher::create([
      't_uuid' => Helper::getUUID(),
      'email' => request('email'),
      'password' => bcrypt(request('password'))
    ]);

    return response()->json(['msg' => 'success']);
  }
}
