<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;
use App\User;
class PageController extends Controller
{
  // public $uuid;

  public function index(){
    return view('welcome');
  }
  public function about(){
    return view('about_us');
  }
  public function program(){
    return view('program');
  }
  public function faq(){
    return view('faq');
  }
  public function blog(){
    return view('blog');
  }
  public function application(){
    return view('application');
  }


}
