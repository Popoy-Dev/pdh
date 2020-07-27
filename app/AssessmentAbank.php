<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class AssessmentAbank extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'a_uuid',
    'aq_id',
    'choices',
    'right_answer'
  ];
  protected $hidden = [
    'id'
  ];

  public function getRouteKeyName()
  {
    return 'a_uuid';
  }
}
