<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Otc;
use App\Invoice;
use App\Payment;
use App\Lesson;
use App\Balance;
use App\Enrollment;
use App\Subject;
use App\Teacher;
use App\Instructional;
use App\Subjectassessment;
use App\AssessmentAbank;
use App\AssessmentQbank;
use App\StudentAnswerAssessment;
use App\Topic;
use App\Activity;
use App\ActivityQbank;
use App\ActivityAbank;
use App\Assignment;
use App\AssignmentQbank;
use App\AssignmentAbank;
use App\TopicAssessment;
use App\TopicQbank;
use App\TopicAbank;
use Auth;
use Carbon\Carbon;
use Helper;

class HomeController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */

  //VIEWS FUNCTIONS
  public function index(){
    return view('home');
  }

 public function browseCourse(){
    return view("browsecourse");
  }
  public function aboutCourse(){
    return view("aboutcourse");
  }
  public function email(){
    return view("student.changeemail");
  }
  public function subjectList(){
    return view('student.subject.mySubjectList');
  }
  public function subjectGrid(){
    $data = Enrollment::join('subjects','subjects.grade','enrollments.grade')
    ->join('teachers','teachers.id','subjects.uploader_id')
    ->where('enrollments.user_id',Auth::user()->id)
    ->where('enrollments.status',1)
    ->where('subjects.status',1)
    ->select('subjects.s_uuid','teachers.first_name','teachers.last_name',
    'subjects.subject','subjects.description','subjects.photo','subjects.grade')
    ->get();


    return view('student.subject.mySubjectGrid',compact('data'));
  }
  public function subjectSingle($uuid){
    $data = Subject::join('teachers','teachers.id','subjects.uploader_id')
    ->where('subjects.s_uuid',$uuid)
    ->select('subjects.id as sid','subjects.subject','subjects.grade','subjects.description','subjects.s_uuid',
    'teachers.first_name','teachers.last_name','subjects.photo')
    ->first();

    $subject = Instructional::where('subject_id',$data->sid)->orderBy('sort')->get();

    return view('student.subject.mySubjectSingle',compact('data','subject'));
  }

  public function learningMaterialDetials(Subject $sub,$tp){
    $topic = Subject::join('instructionals','instructionals.subject_id','subjects.id')
    ->join('lessons','lessons.inst_id','instructionals.id')
    ->join('topics','topics.lesson_id','lessons.id')
    ->where('topics.t_uuid',$tp)
    ->select('topics.id as t_id','subjects.s_uuid','subjects.id as sid','lessons.lesson_title','lessons.id as lid','topics.sort')
    ->first();

    $data = Topic::join('learn_materials','learn_materials.id','topics.lm_id')
    ->where('topics.id',$topic->t_id)
    ->first();

    $inst = Instructional::where('subject_id',$topic->sid)
    ->where('type','t')
    ->select('id','i_uuid','title','sort')
    ->orderBy('sort')->get();

    $quiz = TopicAssessment::where('t_id',$topic->t_id)->get();


    $act = Activity::where('t_id',$topic->t_id)->get();

    $ass = Assignment::where('t_id',$topic->t_id)->get();

    $urlencode = urlencode('https://scuola-maria.s3-ap-southeast-1.amazonaws.com/local-dev/subjects/'.$topic->s_uuid.'/files/'.$data->file);

    return view('student.subject.learningMaterial',compact('data','topic','urlencode','inst','quiz','act','ass','tp'));
  }



  public function subjectAssess($sauuid){
    $data  = Subjectassessment::where('sa_uuid',$sauuid)->first();
    return view('student.quiz.subjectAssessment',compact('data'));
  }

  public function topicAssess($tauuid){
    $data = TopicAssessment::where('ta_uuid',$tauuid)->first();
    return view('student.quiz.topicAssessment',compact('data'));
  }

  public function activity($act){
    $data = Activity::where('act_uuid',$act)->first();
    return view('student.quiz.activity',compact('data'));
  }

  public function assignment($ass){
    $data = Assignment::where('ass_uuid',$ass)->first();
    return view('student.quiz.assignment',compact('data'));
  }


  public function forum(){
    return view('student.forum.forumList');
  }
  public function forumSingle(){
    return view('student.forum.forumSingle');
  }
  public function startDiscussion(){
    return view('student.forum.forumDiscussion');
  }
  public function guidelines(){
    return view('student.forum.guidelines');
  }
  public function myTeacher(){
    return view('student.myTeacher');
  }
  public function myTask(){
    return view('student.myTask');
  }
  public function chat(){
    return view('student.chat');
  }

  public function payment(){
    $data = Invoice::where('in_user_id',Auth::user()->id)->first();
    $date = Carbon::now();
    $bal = Balance::where('user_id',Auth::user()->id)->select('balance')->first();
    return view('student.payment',compact('data','date','bal'));
  }
  public function paymentTranstion(){
    $data = Invoice::where('in_user_id',Auth::user()->id)->get();
    $total = Invoice::where('in_user_id',Auth::user()->id)->sum('amount');
    return view('student.payment_transaction',compact('data','total'));
  }

  //AJAX FUNCTIONS
  //Change Avatar
  public function changeAvatar($ids){
    $data = User::where('uuid',$ids)->select('id','uuid','photo','isLogin')->first();
    $data->photo = request('image');
    $data->isLogin = 1;
    $data->save();
    return response()->json(['msg' => 'success']);
  }
  //Change Email
  public function changeEmail(){
    $this->validate(request(),[
      'email' => 'required|email|unique:users'
    ]);
    $data = User::where('id',Auth::user()->id)->first();
    $data->email = request('email');
    $data->save();

    return response()->json(['msg' => 'success']);
  }

  //Enrollment
  public function paymentOtc(){
    $enroll = Enrollment::where('user_id',Auth::user()->id)->exists();
    $this->validate(request(),[
      'amount' => 'required'
    ]);
    //change to invoice model with payment table
    // dd(Helper::getUUID());
    $inv = Invoice::create([
      'in_uuid' => Helper::getUUID(),
      'in_user_id' => Auth::user()->id,
      'amount' => request('amount'),
      'grade' => request('gradelevel'),
      'regfee_status' => Helper::checkRegFeeStatus(),
    ]);

    $invoice_num = date('y').date('m').str_pad($inv->id,3,'0',STR_PAD_LEFT);
    $inv->invoice_num = $invoice_num;
    $inv->save();

    $trc = substr(md5(rand()), 0, 11);
    Payment::create([
      'py_uuid' => Helper::getUUID(),
      'py_user_id' => Auth::user()->id,
      'py_name' => Auth::user()->firstname.' '.Auth::user()->lastname,
      'py_email' => Auth::user()->email,
      'py_contact' => Auth::user()->guardiancontact,
      'trace_no' => $trc,
      'py_amount' => request('amount'),
      'py_details' => json_encode(array()),
      'py_pay_type' => 'manual',
      'invoice_id' => $inv->id,
    ]);
    if(!$enroll){
      Balance::create([
        'b_uuid' => Helper::getUUID(),
        'user_id' => Auth::user()->id
      ]);
    }

    return response()->json(['msg' => 'success']);
  }



  //Slick Get Quiz
  //Subject Assessment
  public function getSubQuiz($said){
    $data = Subjectassessment::where('sa_uuid',$said)->select('id','sa_uuid','quiz_title','quiz_desc')->first();

    $questions = AssessmentQbank::join('assessment_abanks','assessment_abanks.aq_id','assessment_qbanks.id')
    ->where('assessment_qbanks.sa_id',$data->id)
    ->select('assessment_qbanks.question','assessment_qbanks.points','assessment_abanks.right_answer','assessment_abanks.choices','assessment_qbanks.id as qid')
    ->get();

    $exam = array(
      "info" => array(
        "name" => $data->quiz_title,
        "main" => $data->quiz_desc,
        "results" => "Thank you for finishing the Test.",
        "level1" => "Excellent!",
        "level2" => "Very Good",
        "level3" => "Good",
        "level4" => "Satisfactory",
        "level5" => "Poor"
      )
    );

    for($i=0; $i < $questions->count(); $i++){

      $choices = json_decode($questions[$i]->choices);

      // $exam['questions'][$i]['c_id'] = $data->c_id;
      //
      // $exam['questions'][$i]['type'] = $data->quiz_type;
      //
      $exam['questions'][$i]['id'] = $questions[$i]->qid;
      $exam['questions'][$i]['sid'] = $data->id;
      // $exam['questions'][$i]['assess_id'] = $questions[$i]->assessment_id;
      $exam['questions'][$i]['q'] = $questions[$i]->question;

      for($j=0; $j < count($choices[0]); $j++){
        $exam['questions'][$i]['a'][$j]['option'] = $choices[0][$j];
        //
        if($choices[0][$j]==$questions[$i]->right_answer){
          $exam['questions'][$i]['a'][$j]['correct'] = true;
        } else{
          $exam['questions'][$i]['a'][$j]['correct'] = false;
        }
      }

    }
    return response()->json($exam);
  }
  public function postSubQuiz(){
    $msg = '';
    $data = StudentAnswerAssessment::where('user_id',Auth::user()->id)
    ->where('sa_id',request('sid'))
    ->where('qid',request('qd'))
    ->exists();
    if($data){
      $msg = 'Already Taken!';
    }else{
      StudentAnswerAssessment::create([
        'saa_uuid' => Helper::getUUID(),
        'sa_id' => request('sid'),
        'qid' => request('qd'),
        'user_id' => Auth::user()->id,
        'answer' => request('ans'),
      ]);
      $msg = 'Success';
    }


    return response()->json($msg);

  }

  public function getTopicAssess($tauuid){
    $data = topicAssessment::where('ta_uuid',$tauuid)->select('id','ta_uuid','quiz_title','quiz_desc')->first();

    $questions = TopicQbank::join('topic_abanks','topic_abanks.tq_id','topic_qbanks.id')
    ->where('topic_qbanks.ta_id',$data->id)
    ->select('topic_qbanks.question','topic_qbanks.points','topic_abanks.right_answer','topic_abanks.choices')
    ->get();

    $exam = array(
      "info" => array(
        "name" => $data->quiz_title,
        "main" => $data->quiz_desc,
        "results" => "Thank you for finishing the Test.",
        "level1" => "Excellent!",
        "level2" => "Very Good",
        "level3" => "Good",
        "level4" => "Satisfactory",
        "level5" => "Poor"
      )
    );

    for($i=0; $i < $questions->count(); $i++){

      $choices = json_decode($questions[$i]->choices);

      // $exam['questions'][$i]['c_id'] = $data->c_id;
      //
      // $exam['questions'][$i]['type'] = $data->quiz_type;
      //
      // $exam['questions'][$i]['id'] = $questions[$i]->id;
      //
      // $exam['questions'][$i]['assess_id'] = $questions[$i]->assessment_id;
      $exam['questions'][$i]['q'] = $questions[$i]->question;

      for($j=0; $j < count($choices[0]); $j++){
        $exam['questions'][$i]['a'][$j]['option'] = $choices[0][$j];
        //
        if($choices[0][$j]==$questions[$i]->right_answer){
          $exam['questions'][$i]['a'][$j]['correct'] = true;
        } else{
          $exam['questions'][$i]['a'][$j]['correct'] = false;
        }
      }

    }
    return response()->json($exam);
  }

  public function getActivity($act){
    $data = Activity::where('act_uuid',$act)->select('id','act_uuid','quiz_title','quiz_desc')->first();

    $questions = ActivityQbank::join('activity_abanks','activity_abanks.aq_id','activity_qbanks.id')
    ->where('activity_qbanks.act_id',$data->id)
    ->select('activity_qbanks.question','activity_qbanks.points','activity_abanks.right_answer','activity_abanks.choices')
    ->get();

    $exam = array(
      "info" => array(
        "name" => $data->quiz_title,
        "main" => $data->quiz_desc,
        "results" => "Thank you for finishing the Test.",
        "level1" => "Excellent!",
        "level2" => "Very Good",
        "level3" => "Good",
        "level4" => "Satisfactory",
        "level5" => "Poor"
      )
    );

    for($i=0; $i < $questions->count(); $i++){

      $choices = json_decode($questions[$i]->choices);

      // $exam['questions'][$i]['c_id'] = $data->c_id;
      //
      // $exam['questions'][$i]['type'] = $data->quiz_type;
      //
      // $exam['questions'][$i]['id'] = $questions[$i]->id;
      //
      // $exam['questions'][$i]['assess_id'] = $questions[$i]->assessment_id;
      $exam['questions'][$i]['q'] = $questions[$i]->question;

      for($j=0; $j < count($choices[0]); $j++){
        $exam['questions'][$i]['a'][$j]['option'] = $choices[0][$j];
        //
        if($choices[0][$j]==$questions[$i]->right_answer){
          $exam['questions'][$i]['a'][$j]['correct'] = true;
        } else{
          $exam['questions'][$i]['a'][$j]['correct'] = false;
        }
      }

    }
    return response()->json($exam);
  }

  public function getAssignment($ass){
    $data = Assignment::where('ass_uuid',$ass)->select('id','ass_uuid','quiz_title','quiz_desc')->first();

    $questions = AssignmentQbank::join('assignment_abanks','assignment_abanks.assq_id','assignment_qbanks.id')
    ->where('assignment_qbanks.ass_id',$data->id)
    ->select('assignment_qbanks.question','assignment_qbanks.points','assignment_abanks.right_answer','assignment_abanks.choices')
    ->get();

    $exam = array(
      "info" => array(
        "name" => $data->quiz_title,
        "main" => $data->quiz_desc,
        "results" => "Thank you for finishing the Test.",
        "level1" => "Excellent!",
        "level2" => "Very Good",
        "level3" => "Good",
        "level4" => "Satisfactory",
        "level5" => "Poor"
      )
    );

    for($i=0; $i < $questions->count(); $i++){

      $choices = json_decode($questions[$i]->choices);

      // $exam['questions'][$i]['c_id'] = $data->c_id;
      //
      // $exam['questions'][$i]['type'] = $data->quiz_type;
      //
      // $exam['questions'][$i]['id'] = $questions[$i]->id;
      //
      // $exam['questions'][$i]['assess_id'] = $questions[$i]->assessment_id;
      $exam['questions'][$i]['q'] = $questions[$i]->question;

      for($j=0; $j < count($choices[0]); $j++){
        $exam['questions'][$i]['a'][$j]['option'] = $choices[0][$j];
        //
        if($choices[0][$j]==$questions[$i]->right_answer){
          $exam['questions'][$i]['a'][$j]['correct'] = true;
        } else{
          $exam['questions'][$i]['a'][$j]['correct'] = false;
        }
      }

    }
    return response()->json($exam);
  }

}
