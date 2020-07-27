<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentAnswerAssessment extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'saa_uuid',
    'sa_id',
    'qid',
    'user_id',
    'answer'
  ];
  protected $hidden = [
    'id'
  ];

  public function getRouteKeyName()
  {
    return 'saa_uuid';
  }
}
