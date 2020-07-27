<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityAbank extends Model
{
  use SoftDeletes;
    protected $fillable = [
      'aa_uuid',
      'aq_id',
      'choices',
      'right_answer'
    ];

    protected $hidden = [
      'id'
    ];

    public function getRouteKeyName()
    {
      return 'aa_uuid';
    }
}
