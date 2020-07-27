<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TopicAssessment extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'ta_uuid',
    't_id',
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
    return 'ta_uuid';
  }
}
