<?php

namespace App\Helpers;
use Webpatser\Uuid\Uuid;
use App\Subjectassessment;
use App\TopicAssessment;
use App\Lesson;
use App\Topic;
use App\User;
use App\Teacher;
use App\Invoice;
use App\Payment;
use App\Instructional;
use Auth;
class Helper
{
  public static function countUser() {
    $userCount = User::all()->count();
    return $userCount;
  }
  public static function getUUID() {
    $uuid = uuid::generate(4);
    return $uuid;
  }

  public static function getUserInfo($need){
    if (Auth::check()) {
      $auth = Auth::user()->id;
      $name = Auth::user()->first_name.' '.Auth::user()->last_name;
      $role = 'student';
    }elseif (Auth::guard('teacher')->check()) {
      $auth = Auth::guard('teacher')->user()->id;
      $name = Auth::guard('teacher')->user()->first_name.' '.Auth::guard('teacher')->user()->last_name;
      $role = 'teacher';
    }
    else {
      $auth = Auth::guard('admin')->user()->id;
      $name = Auth::guard('admin')->user()->name;
      $role = 'admin';
    }
    if ($need == 'id') {
      return $auth;
    }elseif($need == 'name'){
      return $name;
    }else{
      return $role;
    }
  }

  public static function getSubjAssess($id){
    $data = Subjectassessment::where('inst_id',$id)->select('id','sa_uuid','inst_id','quiz_title')->get();
    return $data;
  }


  public static function getLesson($id){
    $data = Lesson::where('inst_id',$id)->get();
    return $data;
  }

  public static function getTopic($id){
    $data = Topic::where('lesson_id',$id)->select('t_uuid')->first();
    return $data;
  }

  public static function getSubjAssessExist($id){
    $exist = Subjectassessment::where('inst_id',$id)->exists();
    return $exist;
  }
  public static function getTeacher($id){
    $teacher = Teacher::where('id',$id)
    ->select('first_name','last_name')
    ->first();
    $name = $teacher->first_name .' '. $teacher->last_name;
    return $name;
  }
  public static function getUser($id){
    $data = User::where('id',$id)->first();
    return $data;
  }

  public static function nextPage($subj,$id){
    $data = Instructional::join('lessons','lessons.inst_id','instructionals.id')
    ->join('topics','topics.lesson_id','lessons.id')
    ->where('instructionals.subject_id',$subj)
    ->where('topics.sort','>',$id)
    ->select('topics.id','topics.t_uuid','topics.sort')
    ->orderBy('lessons.sort')
    ->first();
    return $data;
  }

  public static function prevPage($subj,$id){
    $data = Instructional::join('lessons','lessons.inst_id','instructionals.id')
    ->join('topics','topics.lesson_id','lessons.id')
    ->where('instructionals.subject_id',$subj)
    ->where('topics.sort','<',$id)
    ->select('topics.id','topics.t_uuid','topics.sort')
    ->orderBy('lessons.sort','desc')
    ->first();
    return $data;
  }


  public static function checkRegFeeStatus(){
    $checker = Invoice::where('in_user_id',Auth::user()->id)->where('regfee_status',1)->first();
    if (!empty($checker)) {
      return 1;
    }else{
      return 0;
    }
  }
}
?>
