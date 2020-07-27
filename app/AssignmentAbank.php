<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssignmentAbank extends Model
{
  use SoftDeletes;
      protected $fillable = [
        'assa_uuid',
        'assq_id',
        'choices',
        'right_answer'
      ];

      protected $hidden = [
        'id'
      ];

      public function getRouteKeyName()
      {
        return 'assa_uuid';
      }
}
