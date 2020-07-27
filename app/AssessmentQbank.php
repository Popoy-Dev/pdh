<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class AssessmentQbank extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'q_uuid',
    'sa_id',
    'question',
    'points',
    'q_type'
  ];
  protected $hidden = [
    'id'
  ];

  public function getRouteKeyName()
  {
    return 'q_uuid';
  }
}
