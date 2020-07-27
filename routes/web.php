<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//UUID
Route::get('uuid', 'Auth\RegisterController@uuid');
//Landing Page
Route::get('/', 'PageController@index');
Route::get('/about', 'PageController@about');
Route::get('/program', 'PageController@program');
Route::get('/faq', 'PageController@faq');
Route::get('/blog', 'PageController@blog');

Route::get('/registration', 'PageController@application');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Added Browse Course
Route::get('/browse-courses', 'HomeController@browseCourse');
Route::get('/about-course', 'HomeController@aboutCourse');


Route::get('/change-email', 'HomeController@email');
Route::post('/put/email', 'HomeController@changeEmail');
//Avatar
Route::post('/change/avatar/{ids}', 'HomeController@changeAvatar');
//subject
Route::get('/subject-list', 'HomeController@subjectList');
Route::get('/subject-grid', 'HomeController@subjectGrid');
Route::get('/subject/{uuid}', 'HomeController@subjectSingle');

//Subject Assessment
Route::get('/assessment/{sauuid}', 'HomeController@subjectAssess');
// Get Subject Assessment
Route::get('/quiz/{said}', 'HomeController@getSubQuiz');
// Save Subject Assessment
Route::post('/save/quiz', 'HomeController@postSubQuiz');

//Topic Assessment
Route::get('/topic-assessment/{tauuid}', 'HomeController@topicAssess');
//Get Topic Assessment Slick quiz
Route::get('/topic-quiz/{tauuid}', 'HomeController@getTopicAssess');

//Activity
Route::get('/activity/{act}', 'HomeController@activity');
//Get Activity Assessment Slick quiz
Route::get('/get/activity/{act}', 'HomeController@getActivity');

//Assignment
Route::get('/assignment/{ass}', 'HomeController@assignment');
//Get Assignment Assessment Slick quiz
Route::get('/get/assignment/{ass}', 'HomeController@getAssignment');

//Learning Material
Route::get('/learning-material/{sub}/{tp}', 'HomeController@learningMaterialDetials');

//Forum
Route::get('/guidelines', 'HomeController@guidelines');
Route::get('/forum', 'HomeController@forum');
Route::get('/forum-single', 'HomeController@forumSingle');
Route::get('/start-discussion', 'HomeController@startDiscussion');
Route::get('/chat', 'HomeController@chat');

//Teacher
Route::get('/my-teacher', 'HomeController@myTeacher');
//My Task
Route::get('/my-task', 'HomeController@myTask');
//Payment
Route::get('/payment', 'HomeController@payment');

Route::get('/payment-transaction', 'HomeController@paymentTranstion');
Route::post('/otc/payment', 'HomeController@paymentOtc');


Route::group(['prefix' => 'teacher'], function () {
  Route::get('/login', 'TeacherAuth\LoginController@showLoginForm');
  Route::post('/login', 'TeacherAuth\LoginController@login');
  Route::post('/logout', 'TeacherAuth\LoginController@logout');

  Route::get('/register', 'TeacherAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'TeacherAuth\RegisterController@register');

  // Route::post('/password/email', 'TeacherAuth\ForgotPasswordController@sendResetLinkEmail');
  // Route::get('/password/reset', 'TeacherAuth\ForgotPasswordController@showLinkRequestForm');
  // Route::get('/password/reset/{token}', 'TeacherAuth\ResetPasswordController@showResetForm');
});
Route::group(['prefix' => 'teacher', 'middleware' => ['teacher']], function () {

  Route::post('/edit/profile', 'TeacherController@editProfile');
  Route::post('/password/reset', 'TeacherController@passwordChange');

  //publish
  Route::post('/publish/{id}', 'TeacherController@publish');
  Route::post('/cancel-request/{id}', 'TeacherController@cancelRequest');

  //Subject
  Route::get('/subjects', 'TeacherController@mySubject');
  Route::get('/subject/{suuid}', 'TeacherController@subject');
  Route::get('/assessment/{sa_uuid}', 'TeacherController@addAssessment');

  //Start Ajax
  //AddSuject
  Route::post('/create/subject', 'TeacherController@createSubject');
  Route::post('/edit/subject/{suuid}', 'TeacherController@editSubject');
  Route::post('/edit/thumbnail/{suuid}', 'TeacherController@thumbnailSubject');
  //End Ajax

  //Instructional Design
  Route::post('/instructional-design', 'TeacherController@instructional');
  Route::post('/sort/instructional-design', 'TeacherController@sortInstructional');
  Route::get('/get/inst-design/{iid}', 'TeacherController@getInstructional');
  Route::put('/put/inst-design/{id}', 'TeacherController@editInstrutional');
  Route::delete('/del/inst-design/{id}', 'TeacherController@delInstructional');
  //END Instructional Design

  //Start Subject Assesstment
  Route::post('/add/subject-assessment', 'TeacherController@subjAssessment');
  Route::post('/edit/subject-assessment/{sa_uuid}', 'TeacherController@editQuiz');

  //Quiz Question
  Route::post('/add/quiz-question/{sa_uuid}', 'TeacherController@createQuestion');
  Route::post('/edit/quiz-question', 'TeacherController@editQuestion');
  Route::get('/get/quiz-question/{sa_id}', 'TeacherController@getQuestion');
  Route::delete('/del/quiz-question/{id}', 'TeacherController@deleteQuestion');

  //LEsson
  Route::post('/add/lesson', 'TeacherController@createLesson');

  //Learning Materials
  Route::get('/learning-material/{id}', 'TeacherController@learningMaterial');
  Route::get('/topic/learning-material/{id}', 'TeacherController@learningMaterialDetials');
  Route::post('/add/learning-material', 'TeacherController@addLearningMaterial');
  Route::post('/edit/learning-material', 'TeacherController@editLearningMaterial');

  //Confirm Quiz
  Route::get('/confirm/quiz/{id}', 'TeacherController@confirmQuiz');

  //Topic Quiz Assessment
  Route::get('/quiz/topic/{uuid}', 'TeacherController@addQuizTopic');
  Route::post('/edit/topic-assessment/{ta_uuid}', 'TeacherController@editTopicQuiz');
  Route::post('/add/topic-assessment', 'TeacherController@addTopicQuiz');
  //Add Topic Question
  Route::post('/add/topic-question/{id}', 'TeacherController@createTopicQuestion');
  Route::post('/edit/topic-question', 'TeacherController@editTopicQuestion');
  Route::delete('/del/topic-question/{id}', 'TeacherController@deleteTopicQuestion');

  //Activity
  Route::get('/activity/{uuid}', 'TeacherController@addActivity');
  Route::post('/edit/activity/{act_uuid}', 'TeacherController@editActivity');
  //Activity Question
  Route::post('/add/activity-question/{id}', 'TeacherController@createActivityQuestion');
  Route::post('/edit/acitivity-question', 'TeacherController@editActivityQuestion');
  Route::delete('/del/acitivity-question/{id}', 'TeacherController@deleteActivityQuestion');

  //Assignment
  Route::get('/assignment/{uuid}', 'TeacherController@addAssignment');
  Route::post('/edit/assignment/{ass_uuid}', 'TeacherController@editAssignment');
  //Assignment Question
  Route::post('/add/assignment-question/{id}', 'TeacherController@createAssignmentQuestion');
  Route::post('/edit/assignment-question', 'TeacherController@editAssignmentQuestion');
  Route::delete('/del/assignment-question/{id}', 'TeacherController@deleteAssignmentQuestion');
  // Route::post('/edit/assignment/{ass_uuid}', 'TeacherController@editActivity');
});

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout');
  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
  //Dashboard
  Route::get('/gradelevel', 'AdminController@gradelevel');
  //Home
  Route::get('/home', 'AdminController@home');
  //Subjects
  Route::get('/subject', 'AdminController@subject');
  Route::post('/unpublish', 'AdminController@unpublish');
  Route::post('/for-approval', 'AdminController@forApproval');

  //Teacher Account
  Route::get('/teacher-account', 'AdminController@teacher');
  Route::post('/create/teacher-account', 'AdminController@addTeacher');


  Route::get('/payment', 'AdminController@payment');
  Route::post('/approve', 'AdminController@approvedStudent');
});
