<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class AssignmentQbank extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'assq_uuid',
      'ass_id',
      'question',
      'points',
      'quiz_type'
    ];

    protected $hidden = [
      'id'
    ];

    public function getRouteKeyName()
    {
      return 'assq_uuid';
    }
}
