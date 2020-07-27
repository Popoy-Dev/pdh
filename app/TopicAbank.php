<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TopicAbank extends Model
{
  use SoftDeletes;
    protected $fillable = [
      'ta_uuid',
      'tq_id',
      'choices',
      'right_answer'
    ];
    protected $hidden = [
      'id'
    ];

    public function getRouteKeyName()
    {
      return 'ta_uuid';
    }
}
