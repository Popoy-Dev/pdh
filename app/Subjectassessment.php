<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subjectassessment extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'sa_uuid',
    'inst_id',
    'quiz_title',
    'quiz_desc',
    'quiz_time',
    'quiz_type',
    'quiz_item',
    'passing_score',
    'time_limit'
  ];
  protected $hidden = [
    'id'
  ];

  public function getRouteKeyName()
  {
    return 'sa_uuid';
  }
}
