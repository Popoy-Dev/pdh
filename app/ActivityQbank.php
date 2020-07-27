<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityQbank extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'aq_uuid',
    'act_id',
    'question',
    'points',
    'quiz_type'
  ];

  protected $hidden = [
    'id'
  ];

  public function getRouteKeyName()
  {
    return 'aq_uuid';
  }
}
