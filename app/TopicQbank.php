<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TopicQbank extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'tq_uuid',
    'ta_id',
    'question',
    'points',
    'q_type'
  ];

  protected $hidden = [
    'id'
  ];

  public function getRouteKeyName()
  {
    return 'tq_uuid';
  }
}
