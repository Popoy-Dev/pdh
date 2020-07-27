<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
  use SoftDeletes;

  protected $fillable = [
    't_uuid',
    'lesson_id',
    'lm_id',
    'topic_assess_id',
    'topic_title',
    'topic_type',
  ];
  protected $hidden = [
    'id'
  ];

  public function getRouteKeyName()
  {
    return 'lm_uuid';
  }
}
