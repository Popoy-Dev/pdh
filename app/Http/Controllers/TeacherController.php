<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Helpers\Helper;
use App\Instructional;
use App\Subjectassessment;
use App\AssessmentAbank;
use App\AssessmentQbank;
use App\TopicQbank;
use App\TopicAbank;
use App\Lesson;
use App\TopicAssessment;
use App\LearnMaterial;
use App\Topic;
use App\Activity;
use App\Assignment;
use App\ActivityAbank;
use App\ActivityQbank;
use App\AssignmentAbank;
use App\AssignmentQbank;
use App\Jobs\VideoTranscodeUpload;
use App\Video;
use App\Teacher;
use Auth;
use Image;
use Storage;
use Str;
use Arr;
use Hash;
use Aws\Exception\CredentialsException;
class TeacherController extends Controller
{
  public function __construct()
  {
    $this->middleware('teacher');
  }


  //View
  public function mySubject(){
    $id = Helper::getUserInfo('id');
    $auth = Subject::where('uploader_id',$id);
    $all = $auth->get();
    return view('teacher.subject.subjects',compact('all'));
  }

  public function subject($suuid){
    $data = Subject::where('s_uuid',$suuid)->first();

    $ins = Instructional::where('subject_id',$data->id)
    ->select('id','i_uuid','subject_id','title','type','sort')->orderBy('sort')->get();

    return view('teacher.subject.createSubject',compact('data','ins'));
  }

  public function addAssessment(Subjectassessment $sa_uuid){
    $sub = Instructional::join('subjects','subjects.id','instructionals.subject_id')
    ->where('instructionals.id',$sa_uuid->inst_id)->select('subjects.s_uuid','subjects.subject','subjects.grade')->first();

    $data = Subjectassessment::where('sa_uuid',$sa_uuid->sa_uuid)
    ->select('id','sa_uuid','quiz_item','quiz_title','quiz_type','passing_score','quiz_desc','time_limit')->first();

    $cquestion = AssessmentQbank::where('sa_id',$sa_uuid->id)->count();

    $question = AssessmentQbank::join('assessment_abanks','assessment_abanks.aq_id','assessment_qbanks.id')
    ->where('assessment_qbanks.sa_id',$sa_uuid->id)
    ->select('assessment_qbanks.id as qid','assessment_abanks.id as aid','assessment_qbanks.q_uuid',
    'assessment_qbanks.question','assessment_abanks.right_answer','assessment_abanks.choices','assessment_qbanks.points','assessment_qbanks.q_type')
    ->paginate(5);
    return view('teacher.subject.addAssessment',compact('data','cquestion','question','sub'));
  }

  public function learningMaterial(Lesson $id){
    $subject = Subject::join('instructionals','instructionals.subject_id','subjects.id')
    ->join('lessons','lessons.inst_id','instructionals.id')->where('lessons.id',$id->id)
    ->select('subjects.s_uuid','lessons.id')
    ->first();

    $sub = Subject::where('s_uuid',$subject->s_uuid)->select('subjects.s_uuid','subjects.subject','subjects.grade')->first();

    return view('teacher.subject.learningMaterial',compact('subject','id','sub'));
  }

  public function confirmQuiz($id) {
    $data = Topic::where('t_uuid',$id)->first();
    return view('teacher.subject.confirmQuiz', compact('data'));
  }

  public function learningMaterialDetials($id){
    $topic = Subject::join('instructionals','instructionals.subject_id','subjects.id')
    ->join('lessons','lessons.inst_id','instructionals.id')
    ->join('topics','topics.lesson_id','lessons.id')
    ->where('topics.t_uuid',$id)
    ->select('topics.id as t_id','subjects.s_uuid')
    ->first();

    $sub = Subject::where('s_uuid',$topic->s_uuid)->select('subjects.s_uuid','subjects.subject','subjects.grade')->first();

    $data = Topic::join('learn_materials','learn_materials.id','topics.lm_id')
    ->where('topics.id',$topic->t_id)
    ->first();

    $topicQuiz = TopicAssessment::where('t_id',$topic->t_id)->get();

    $act = Activity::where('t_id',$topic->t_id)->get();

    $ass = Assignment::where('t_id',$topic->t_id)->get();

    $urlencode = urlencode('https://scuola-maria.s3-ap-southeast-1.amazonaws.com/local-dev/subjects/'.$topic->s_uuid.'/files/'.$data->file);
    return view('teacher.subject.editLearningMaterial',compact('data','topic','urlencode','topicQuiz','act','ass','sub'));
  }

  public function addQuizTopic($uuid){
    $sub = Topic::join('topic_assessments','topic_assessments.t_id','topics.id')
    ->where('topic_assessments.ta_uuid',$uuid)
    ->select('topics.topic_title','topics.t_uuid')
    ->first();

    $data = TopicAssessment::where('ta_uuid',$uuid)->first();
    $cquestion = TopicQbank::where('ta_id',$data->id)->count();
    $question = TopicQbank::join('topic_abanks','topic_abanks.tq_id','topic_qbanks.id')
    ->where('topic_qbanks.ta_id',$data->id)
    ->select('topic_qbanks.id as qid','topic_abanks.id as aid','topic_qbanks.tq_uuid',
    'topic_qbanks.question','topic_abanks.right_answer','topic_abanks.choices','topic_qbanks.points')
    ->paginate(5);

    return view('teacher.subject.addTopicAssessment',compact('data','cquestion','question','sub'));
  }

  public function addActivity($uuid){
    $sub = Topic::join('activities','activities.t_id','topics.id')
    ->where('activities.act_uuid',$uuid)
    ->select('topics.topic_title','topics.t_uuid')
    ->first();

    $data = Activity::where('act_uuid',$uuid)->first();
    $cquestion = ActivityQbank::where('act_id',$data->id)->count();

    $question = ActivityQbank::join('activity_abanks','activity_abanks.aq_id','activity_qbanks.id')
    ->where('activity_qbanks.act_id',$data->id)
    ->select('activity_qbanks.id as qid','activity_abanks.id as aid','activity_qbanks.aq_uuid',
    'activity_qbanks.question','activity_abanks.right_answer','activity_abanks.choices','activity_qbanks.points')
    ->paginate(5);


    return view('teacher.subject.addActivity',compact('data','cquestion','question','sub'));
  }


  public function addAssignment($uuid){
    $sub = Topic::join('assignments','assignments.t_id','topics.id')
    ->where('assignments.ass_uuid',$uuid)
    ->select('topics.topic_title','topics.t_uuid')
    ->first();
    $data = Assignment::where('ass_uuid',$uuid)->first();

    $cquestion = AssignmentQbank::where('ass_id',$data->id)->count();

    $question = AssignmentQbank::join('assignment_abanks','assignment_abanks.assq_id','assignment_qbanks.id')
    ->where('assignment_qbanks.ass_id',$data->id)
    ->select('assignment_qbanks.id as qid','assignment_abanks.id as aid','assignment_qbanks.assq_uuid',
    'assignment_qbanks.question','assignment_abanks.right_answer','assignment_abanks.choices','assignment_qbanks.points')
    ->paginate(5);

    return view('teacher.subject.addAssignment',compact('data','cquestion','question','sub'));
  }

  //Ajax Functions
  public function editProfile(){
    $data = Teacher::where('id',Auth::guard('teacher')->user()->id)->first();

    $data->first_name = request('fname');
    $data->last_name = request('lname');
    $data->department = request('dept');
    $data->save();

    return response()->json(['msg' => 'success']);
  }
  //change password
  public function passwordChange(){
    $this->validate(request(),[
    'current-password' => 'required',
    'password' => 'required|min:8|confirmed',
    ]);
     $current_password = Auth::guard('teacher')->user()->password;
     if(Hash::check(request('current-password'), $current_password)){
      $data = Teacher::where('id', Auth::guard('teacher')->user()->id)->first();
      $data->password = bcrypt(request('password'));
      $data->save();
    }
    return response()->json(['msg'=>'success']);
  }
  //publish subject
  public function publish($id){
    $data = Subject::where('s_uuid',$id)->first();
    $data->status = request('ids');
    $data->save();
    return response()->json(['msg' => 'success']);
  }

  public function cancelRequest($id){

    $data = Subject::where('s_uuid',$id)->first();
    $data->status = request('ids');
    $data->save();
    return response()->json(['msg' => 'success']);
  }
  //Create Subject
  public function createSubject(){
    $this->validate(request(),[
      'subject' => 'required',
      'grade' => 'required'
    ]);
    $data = Subject::create([
      's_uuid' => Helper::getUUID(),
      'grade' => request('grade'),
      'subject' => request('subject'),
      'status' => 0,
      'uploader_id' => Auth::guard('teacher')->user()->id,
    ]);
    $path = 'local-dev/subjects'.'/'.$data->s_uuid;
    $makeFolder = Storage::disk('s3')->makeDirectory($path);

    return response()->json(['msg' => 'success']);
  }

  //EDIT SUBJECT
  public function editSubject($suuid){
    $data = Subject::where('s_uuid',$suuid)->first();
    $data->subject = request('subject_title');
    $data->grade = request('subject_grade');
    $data->description = request('subject_description');
    $data->save();
    return response()->json(['msg' => 'success']);
  }

  //change subject thumbnail
  public function thumbnailSubject($suuid){
    $subFile = Subject::where('s_uuid',$suuid)->select('id','photo','s_uuid')->first();
    $this->validate(request(),[
      'thumbnail' => 'mimes:jpg,jpeg,png,gif'
    ]);
    if(request()->hasFile('thumbnail')){
      $file = request('thumbnail');
      $extension = request()->file('thumbnail')->getClientOriginalExtension();
      $filename = "scuola-maria".md5($file->getClientOriginalName() .''. date('Y-m-d-h:i:s')) . '.' . $extension;
      $resize = Image::make($file)->resize(636,580);
      $resize = $resize->stream();

      $file_Path = '/local-dev/subjects/'.$subFile->s_uuid.'/subject-thumbnail';
      $makeFolder = Storage::disk('s3')->makeDirectory($file_Path);
      $filePath = $file_Path.'/'.$filename;
      $del = Storage::disk('s3')->delete($file_Path.'/'.$subFile->photo);
      $s3 = Storage::disk('s3')->put($filePath, $resize->__toString());
      $subFile->photo = $filename;
      $subFile->save();
    }

    return response()->json(['msg' => 'success']);
  }

  // Create Instructional
  public function instructional(){
    $this->validate(request(),[
      'ints_type' => 'required',
      'inst_title' => 'required'
    ]);
    $c = array_combine(request('ints_type'),request('inst_title'));
    foreach ($c as $key => $value) {
      $k = substr($key,0,1);
      Instructional::create([
        'i_uuid' => Helper::getUUID(),
        'type' => $k,
        'title' => $value,
        'subject_id' => request('s_id')
      ]);
    }
    return response()->json([
      'msg' => 'success'
    ]);
  }
  //Get Instructional
  public function getInstructional(Instructional $iid){
    $data = Instructional::where('i_uuid',$iid->i_uuid)->first();
    return response()->json([
      'msg' => 'success',
      'data' => $data,
    ]);
  }

  //Edit Instructional
  public function editInstrutional(Instructional $id){
    $data = Instructional::where('id',$id->id)->first();
    $data->title = request('input');
    $data->save();
    return response()->json([
      'msg' => 'success'
    ]);
  }

  public function delInstructional(Instructional $id){
    $del = Instructional::where('id',$id->id)->delete();
    // $del->delete();
    return response()->json([
      'msg' => 'success'
    ]);
  }

  //sort
  public function sortInstructional() {
    foreach (request('ids') as $key => $value) {
      $data = Instructional::where('i_uuid',$value)->first();
      $data->sort = $key;
      $data->save();
    }
    return response()->json(['msg' => 'updated']);
  }

  //END Instructional

  //Subject Assessment Quiz
  public function subjAssessment() {
    $this->validate(request(),[
      'quiz_title' => 'required',
      'type_of_quiz' => 'required',
      'quiz_item' => 'required'
    ]);
    Subjectassessment::create([
      'sa_uuid' => Helper::getUUID(),
      'inst_id' => request('ids'),
      'quiz_title' => request('quiz_title'),
      'quiz_desc' => request('instruction'),
      'quiz_type' => request('type_of_quiz'),
      'quiz_item' => request('quiz_item'),
      'passing_score' => request('passing_score'),
      'time_limit' => request('time_limit')
    ]);


    return response()->json([
      'msg' => 'success'
    ]);
  }

  //END Subject Assessment Quiz

  //Quiz Edit
  public function editQuiz($sa_uuid){
    $data = Subjectassessment::where('sa_uuid',$sa_uuid)->first();
    $del = AssessmentQbank::join('assessment_abanks','assessment_abanks.aq_id','assessment_qbanks.id')
    ->where('assessment_qbanks.sa_id',$data->id)
    ->select('assessment_qbanks.q_type','assessment_qbanks.id as q_id','assessment_abanks.id as a_id')
    ->get();

    $req = request('time_limit');
    $str = Str::substr($req,0,2);
    $data->quiz_title = request('quiz_title');
    $data->quiz_desc = request('instruction');
    $data->quiz_type = request('quiz_type');
    $data->quiz_item = request('quiz_item');
    $data->passing_score = request('passing_score');
    $data->time_limit =  $str;
    $data->save();

    foreach($del as $dl){
      if($dl->q_type != $data->quiz_type){
        $q = AssessmentQbank::where('id',$dl->q_id)->delete();
        $a = AssessmentAbank::where('id',$dl->a_id)->delete();
      }
    }

    return response()->json(['msg' => 'success']);
  }


  public function createQuestion($sa_uuid){
    $ans = NULL;
    if(request('ans') != NULL){
      $ans = json_encode(array(request('ans')));
    }
    $this->validate(request(),[
      'question' => 'required',
    ]);
    $qdata = AssessmentQbank::create([
      'q_uuid' => Helper::getUUID(),
      'sa_id' => request('sa_id'),
      'question' =>request('question'),
      'points' => request('points'),
      'q_type' => request('q_type')
    ]);

    $adata = AssessmentAbank::create([
      'a_uuid' => Helper::getUUID(),
      'aq_id' => $qdata->id,
      'choices' => $ans,
      'right_answer' => request('correct_answer')
    ]);

    return response()->json(['msg'=>'success']);
  }

  public function editQuestion(){

    $question = AssessmentQbank::where('id',request('ids'))->first();
    $answer = AssessmentAbank::where('aq_id',$question->id)->first();

    $return = Arr::accessible(request('u_answer'));
    if($return){
      $ans = array(request('u_answer'));
    }
    else{
      $ans = request('u_answer');
    }
    $question->question = request('question');
    $question->points = request('points');
    $answer->choices = $ans;
    $answer->right_answer = request('right_answer');

    $question->save();
    $answer->save();
    return response()->json(['msg' => 'success']);
  }

  public function deleteQuestion(){
    $question = AssessmentQbank::where('id',request('ids'))->first();
    $answer = AssessmentAbank::where('aq_id',$question->id)->first();
    $question->delete();
    $answer->delete();
    return response()->json(['msg' => 'success']);
  }
  // EDIT QUIZ
  //END QUIZ

  //LESSON

  public function createLesson(){
    foreach (request('lesson') as $key => $value) {
      Lesson::create([
        'l_uuid' => Helper::getUUID(),
        'inst_id' => request('ids'),
        'lesson_title' => $value
      ]);
    }
    return response()->json(['msg'=>'success']);
  }

  //END LESSON

  // Learning Material

  public function addLearningMaterial(Subject $id) {
    $this->validate(request(),[
      'title' => 'required',
      'type' => 'required|in:v,f,u',
    ]);
    if(request('type') == 'v'){
      $this->validate(request(),[
        'mp4' => 'required',
        'v_thumbnail' => 'mimes:jpg,jpeg,png,gif|nullable',
      ]);
    }else if (request('type') == 'f' || request('type') == 'p') {
      $this->validate(request(),[
        'files' => 'required|mimes:ppt,pptx,doc,docx,pdf',
      ]);
    }else if(request('type') == 'u'){
      $this->validate(request(),[
        'url' => 'required',
      ]);

    }
    if (request()->hasFile('mp4') && request()->hasFile('v_thumbnail')) {
      $file = request('mp4');
      if($file->getClientOriginalExtension() == 'mp4'){

        $v_file = request('mp4');
        // $path = md5($v_file->getClientOriginalName().time()) . "." .$v_file->getClientOriginalExtension();
        $fname = "scuola-maria".md5($v_file->getClientOriginalName() .''. date('Y-m-d-h:i:s')) . '.' . $v_file->getClientOriginalExtension();
        // $v_file->move(public_path('/tmp_vids'),$fname);
        $v_file->storeAs('public', $fname);
        $video = Video::create([
          'disk'          => 'public',
          'original_name' => $v_file->getClientOriginalName(),
          'path'          => $fname,
          'title'         => request('title'),
        ]);
        VideoTranscodeUpload::dispatch($video,request('s_uuid'));

        // End Video Save
        //start thumbnail save
        $thumb = request('v_thumbnail');
        //get extension
        $extension = request()->file('v_thumbnail')->getClientOriginalExtension();
        //encrypt filename
        $f_thumb = "scuola-maria".md5($thumb->getClientOriginalName() .''. date('Y-m-d-h:i:s')) . '.' . $extension;
        //resize
        $resize = Image::make($thumb)->resize(636,580);
        $resize = $resize->stream();
        // search file path s3
        $t_file_Path = '/local-dev/subjects/'.request('s_uuid').'/video-thumbnail';
        // make directory if no directory
        $makeFolder = Storage::disk('s3')->makeDirectory($t_file_Path);
        $t_filePath = $t_file_Path.'/'.$f_thumb;
        $s3 = Storage::disk('s3')->put($t_filePath, $resize->__toString());
        //End thumbnail

        $data = LearnMaterial::create([
          'lm_uuid' => Helper::getUUID(),
          'file' => $fname,
          'v_thumbnail' => $f_thumb
        ]);

        $module = Topic::create([
          't_uuid' => Helper::getUUID(),
          'lesson_id' => request('lesson_id'),
          'lm_id' => $data->id,
          'topic_title' => request('title'),
          'topic_type' => request('type'),
        ]);
      }else{
        return response()->json([
          'error' => 'Invalid File extension'
        ]);
      }
    }else if (request()->hasFile('files')) {
      $file = request('files');
      $filename = "scuola-maria".md5($file->getClientOriginalName() . '' . date('Y-m-d h:i:s')) . '.' . $file->getClientOriginalExtension();
      $file_Path = '/local-dev/subjects/'.request('s_uuid').'/files';
      // make directory if no directory
      $makeFolder = Storage::disk('s3')->makeDirectory($file_Path);
      $filePath = $file_Path.'/'.$filename;
      Storage::disk('s3')->put($filePath, fopen($file,'r+'));

      $data = LearnMaterial::create([
        'lm_uuid' => Helper::getUUID(),
        'file' => $filename,
      ]);
      $module = Topic::create([
        't_uuid' => Helper::getUUID(),
        'lesson_id' => request('lesson_id'),
        'lm_id' => $data->id,
        'topic_title' => request('title'),
        'topic_type' => request('type'),
      ]);

    }else{
      if (strlen(request('url')) > 43) {
        $exp = explode('&',request('url'));
        $f_url = $exp[0];
      }else{
        $f_url = request('url');
      }

      $data = LearnMaterial::create([
        'lm_uuid' => Helper::getUUID(),
        'file' => $f_url,
      ]);

      $module = Topic::create([
        't_uuid' => Helper::getUUID(),
        'lesson_id' => request('lesson_id'),
        'lm_id' => $data->id,
        'topic_title' => request('title'),
        'topic_type' => request('type'),
      ]);
    }
    return response()->json([
      'url' => url('/teacher/confirm/quiz',$module->t_uuid)
    ]);

  }

  public function editLearningMaterial(){
    $lm = LearnMaterial::where('id',request('ids'))->first();
    $topic = Topic::where('lm_id',$lm->id)->first();
    $this->validate(request(),[
      'v_thumbnail' => 'mimes:jpg,jpeg,png|nullable',
    ]);
    if(request()->hasFile('mp4') && request()->hasFile('v_thumbnail')){
      $file = request('mp4');
      if($file->getClientOriginalExtension() == 'mp4'){
        //Start Video Save
        $filename = "scuola-maria".md5($file->getClientOriginalName() .''. date('Y-m-d-h:i:s')) . '.' . $file->getClientOriginalExtension();
        // search file path s3
        $file_Path = '/local-dev/subjects/'.request('s_uuid').'/video';
        // make directory if no directory
        $makeFolder = Storage::disk('s3')->makeDirectory($file_Path);
        $filePath = $file_Path.'/'.$filename;
        $del = Storage::disk('s3')->delete($file_Path.'/'.$lm->file);
        Storage::disk('s3')->put($filePath, fopen($file,'r+'));
        // End Video

        //start thumbnail save
        $thumb = request('v_thumbnail');
        //get extension
        $extension = request()->file('v_thumbnail')->getClientOriginalExtension();
        //encrypt filename
        $f_thumb = "scuola-maria".md5($thumb->getClientOriginalName() .''. date('Y-m-d-h:i:s')) . '.' . $extension;
        //resize
        $resize = Image::make($thumb)->resize(636,580);
        $resize = $resize->stream();
        // search file path s3
        $t_file_Path = '/local-dev/subjects/'.request('s_uuid').'/video-thumbnail';
        // make directory if no directory
        $makeFolder = Storage::disk('s3')->makeDirectory($t_file_Path);
        $t_filePath = $t_file_Path.'/'.$f_thumb;
        $del = Storage::disk('s3')->delete($file_Path.'/'.$lm->v_thumbnail);
        $s3 = Storage::disk('s3')->put($t_filePath,$resize->__toString());
        //End thumbnail
        $lm->file = $filename;
        $lm->v_thumbnail = $f_thumb;
        $topic->topic_title = request('title');
      }else{
        return response()->json([
          'error' => 'error'
        ]);
      }
    }
    else if (request()->hasFile('mp4')) {
      $file = request('mp4');
      if($file->getClientOriginalExtension() == 'mp4'){
        //Start Video Save
        $filename = "scuola-maria".md5($file->getClientOriginalName() .''. date('Y-m-d-h:i:s')) . '.' . $file->getClientOriginalExtension();
        // search file path s3
        $file_Path = '/local-dev/subjects/'.request('s_uuid').'/video';
        // make directory if no directory
        $makeFolder = Storage::disk('s3')->makeDirectory($file_Path);
        $filePath = $file_Path.'/'.$filename;
        $del = Storage::disk('s3')->delete($file_Path.'/'.$lm->file);
        Storage::disk('s3')->put($filePath, fopen($file,'r+'));
        // End Video

        // $file->move(public_path('/uploads/lms/course-material'),$filename);
        $lm->file = $filename;
        $topic->topic_title = request('title');

      }else{
        return response()->json([
          'error' => 'error'
        ]);
      }
    }else if(request()->hasFile('v_thumbnail')){
      //start thumbnail save
      $thumb = request('v_thumbnail');
      //get extension
      $extension = request()->file('v_thumbnail')->getClientOriginalExtension();
      //encrypt filename
      $f_thumb = "scuola-maria".md5($thumb->getClientOriginalName() .''. date('Y-m-d-h:i:s')) . '.' . $extension;
      //resize
      $resize = Image::make($thumb)->resize(636,580);
      $resize = $resize->stream();
      // search file path s3
      $t_file_Path = '/local-dev/subjects/'.request('s_uuid').'/video-thumbnail';
      // make directory if no directory
      $makeFolder = Storage::disk('s3')->makeDirectory($t_file_Path);
      $t_filePath = $t_file_Path.'/'.$f_thumb;
      $del = Storage::disk('s3')->delete($file_Path.'/'.$lm->v_thumbnail);
      $s3 = Storage::disk('s3')->put($t_filePath,$resize->__toString());
      //End thumbnail
      $lm->v_thumbnail = $f_thumb;

    }
    else if (request()->hasFile('file')) {

      $file = request('files');
      $filename = "scuola-maria".md5($file->getClientOriginalName() . '' . date('Y-m-d h:i:s')) . '.' . $file->getClientOriginalExtension();
      $file_Path = '/local-dev/subjects/'.request('s_uuid').'/files';
      // make directory if no directory
      $makeFolder = Storage::disk('s3')->makeDirectory($file_Path);

      $filePath = $file_Path.'/'.$filename;

      $del = Storage::disk('s3')->delete($file_Path.'/'.$lm->file);

      Storage::disk('s3')->put($filePath, fopen($file,'r+'));


      $topic->top_title = request('title');
      $lm->file = $filename;
    }
    else if (!empty(request('url'))) {
      $topic->topic_title = request('title');
      if (strlen(request('url')) > 43) {
        $exp = explode('&',request('url'));
        $f_url = $exp[0];
      }else{
        $f_url = request('url');
      }
      $lm->file = $f_url;
    }
    else{
      $topic->topic_title = request('title');
    }
    $topic->save();
    $lm->save();
    return response()->json([
      'msg' => 'success'
    ]);
  }
  // Topic Question QUiz
  public function addTopicQuiz() {
    if(request('type_of_quiz') == 'quiz'){
      TopicAssessment::create([
        'ta_uuid' => Helper::getUUID(),
        't_id' => request('ids'),
        'quiz_title' => request('quiz_title'),
      ]);
    }else if(request('type_of_quiz') == 'act'){
      Activity::create([
        'act_uuid' => Helper::getUUID(),
        't_id' => request('ids'),
        'quiz_title' => request('quiz_title'),
      ]);
    }else{
      Assignment::create([
        'ass_uuid' => Helper::getUUID(),
        't_id' => request('ids'),
        'quiz_title' => request('quiz_title'),
      ]);
    }

    return response()->json([
      'msg' => 'success'
    ]);
  }

  public function editTopicQuiz($ta_uuid){
    $data = TopicAssessment::where('ta_uuid',$ta_uuid)->first();
    $del = TopicQbank::join('topic_abanks','topic_abanks.tq_id','topic_qbanks.id')
    ->where('topic_qbanks.ta_id',$data->id)
    ->select('topic_qbanks.q_type','topic_qbanks.id as q_id','topic_qbanks.id as a_id')
    ->get();

    $req = request('time_limit');
    $str = Str::substr($req,0,2);
    $data->quiz_title = request('quiz_title');
    $data->quiz_desc = request('instruction');
    $data->quiz_type = request('quiz_type');
    $data->quiz_item = request('quiz_item');
    $data->passing_score = request('passing_score');
    $data->time_limit =  $str;
    $data->save();

    foreach($del as $dl){
      if($dl->q_type != $data->quiz_type){
        $q = TopicQbank::where('id',$dl->q_id)->delete();
        $a = TopicAbank::where('id',$dl->a_id)->delete();
      }
    }
    return response()->json(['msg' => 'success']);
  }
  //END QUiz

  // Add Question
  public function createTopicQuestion(){
    $ans = NULL;
    if(request('ans') != NULL){
      $ans = json_encode(array(request('ans')));
    }
    $this->validate(request(),[
      'question' => 'required',
    ]);
    $qdata = TopicQbank::create([
      'tq_uuid' => Helper::getUUID(),
      'ta_id' => request('ta_id'),
      'question' =>request('question'),
      'points' => request('points'),
      'q_type' => request('q_type')
    ]);

    $adata = TopicAbank::create([
      'ta_uuid' => Helper::getUUID(),
      'tq_id' => $qdata->id,
      'choices' => $ans,
      'right_answer' => request('correct_answer')
    ]);

    return response()->json(['msg'=>'success']);
  }


  public function editTopicQuestion(){
    $return = Arr::accessible(request('u_answer'));
    $question = TopicQbank::where('id',request('ids'))->first();
    $answer = TopicAbank::where('tq_id',$question->id)->first();
    if($return){
      $ans = array(request('u_answer'));
    }
    else{
      $ans = request('u_answer');
    }
    $question->question = request('question');
    $question->points = request('points');
    $answer->choices = $ans;
    $answer->right_answer = request('right_answer');

    $question->save();
    $answer->save();

    return response()->json(['msg' => 'success']);
  }

  public function deleteTopicQuestion(){
    $question = TopicQbank::where('id',request('ids'))->first();
    $answer = TopicAbank::where('tq_id',$question->id)->first();

    $question->delete();
    $answer->delete();
    return response()->json(['msg' => 'success']);
  }
  // END

  //Activity
  public function editActivity($act_uuid){

    $data = Activity::where('act_uuid',$act_uuid)->first();

    $del = ActivityQbank::join('activity_abanks','activity_abanks.aq_id','activity_qbanks.id')
    ->where('activity_qbanks.act_id',$data->id)
    ->select('activity_qbanks.quiz_type','activity_qbanks.id as q_id','activity_qbanks.id as a_id')
    ->get();

    $req = request('time_limit');
    $str = Str::substr($req,0,2);
    $data->quiz_title = request('quiz_title');
    $data->quiz_type = request('quiz_type');
    $data->quiz_desc = request('instruction');
    $data->quiz_item = request('quiz_item');
    $data->passing_score = request('passing_score');
    $data->time_limit =  $str;
    $data->save();

    foreach($del as $dl){
      if($dl->quiz_type != $data->quiz_type){
        $q = ActivityQbank::where('id',$dl->q_id)->delete();
        $a = ActivityAbank::where('id',$dl->a_id)->delete();
      }
    }
    return response()->json(['msg' => 'success']);
  }


  public function createActivityQuestion(){
    $ans = NULL;
    if(request('ans') != NULL){
      $ans = json_encode(array(request('ans')));
    }
    $this->validate(request(),[
      'question' => 'required',
    ]);
    $qdata = ActivityQbank::create([
      'aq_uuid' => Helper::getUUID(),
      'act_id' => request('ta_id'),
      'question' =>request('question'),
      'points' => request('points'),
      'quiz_type' => request('quiz_type')
    ]);

    $adata = ActivityAbank::create([
      'aa_uuid' => Helper::getUUID(),
      'aq_id' => $qdata->id,
      'choices' => $ans,
      'right_answer' => request('correct_answer')
    ]);

    return response()->json(['msg'=>'success']);
  }

  public function editActivityQuestion(){
    $return = Arr::accessible(request('u_answer'));

    $question = ActivityQbank::where('id',request('ids'))->first();
    $answer = ActivityAbank::where('aq_id',$question->id)->first();
    if($return){
      $ans = array(request('u_answer'));
    }
    else{
      $ans = request('u_answer');
    }
    $question->question = request('question');
    $question->points = request('points');
    $answer->choices = $ans;
    $answer->right_answer = request('right_answer');

    $question->save();
    $answer->save();

    return response()->json(['msg' => 'success']);
  }

  public function deleteActivityQuestion(){
    $question = ActivityQbank::where('id',request('ids'))->first();
    $answer = ActivityAbank::where('tq_id',$question->id)->first();

    $question->delete();
    $answer->delete();
    return response()->json(['msg' => 'success']);
  }

  //End activity

  // Assignment
  public function editAssignment($ass_uuid){

    $data = Assignment::where('ass_uuid',$ass_uuid)->first();

    $del = AssignmentQbank::join('assignment_abanks','assignment_abanks.assq_id','assignment_qbanks.id')
    ->where('assignment_qbanks.ass_id',$data->id)
    ->select('assignment_qbanks.quiz_type','assignment_qbanks.id as q_id','assignment_qbanks.id as a_id')
    ->get();

    $req = request('time_limit');
    $data->quiz_title = request('quiz_title');
    $data->quiz_desc = request('instruction');
    $data->quiz_type = request('quiz_type');
    $data->quiz_item = request('quiz_item');
    $data->passing_score = request('passing_score');
    $data->time_limit =  $req;
    $data->save();

    foreach($del as $dl){
      if($dl->quiz_type != $data->quiz_type){
        $q = AssignmentQbank::where('id',$dl->q_id)->delete();
        $a = AssignmentAbank::where('id',$dl->a_id)->delete();
      }
    }
    return response()->json(['msg' => 'success']);
  }

  public function createAssignmentQuestion(){
    $ans = NULL;
    if(request('ans') != NULL){
      $ans = json_encode(array(request('ans')));
    }
    $this->validate(request(),[
      'question' => 'required',
    ]);
    $qdata = AssignmentQbank::create([
      'assq_uuid' => Helper::getUUID(),
      'ass_id' => request('ta_id'),
      'question' =>request('question'),
      'points' => request('points'),
      'quiz_type' => request('quiz_type')
    ]);

    $adata = AssignmentAbank::create([
      'assa_uuid' => Helper::getUUID(),
      'assq_id' => $qdata->id,
      'choices' => $ans,
      'right_answer' => request('correct_answer')
    ]);

    return response()->json(['msg'=>'success']);
  }


  public function editAssignmentQuestion(){
    $return = Arr::accessible(request('u_answer'));

    $question = AssignmentQbank::where('id',request('ids'))->first();
    $answer = AssignmentAbank::where('assq_id',$question->id)->first();
    if($return){
      $ans = array(request('u_answer'));
    }
    else{
      $ans = request('u_answer');
    }
    $question->question = request('question');
    $question->points = request('points');
    $answer->choices = $ans;
    $answer->right_answer = request('right_answer');

    $question->save();
    $answer->save();

    return response()->json(['msg' => 'success']);
  }

  public function deleteAssignmentQuestion(){
    $question = AssignmentQbank::where('id',request('ids'))->first();
    $answer = AssignmentAbank::where('assq_id',$question->id)->first();

    $question->delete();
    $answer->delete();
    return response()->json(['msg' => 'success']);
  }
  //End Assignment
}
