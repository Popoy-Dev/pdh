<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Instructional extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'i_uuid',
    'subject_id',
    'title',
    'type',
    'sort',
  ];
  protected $hidden = [
    'id'
  ];

  public function getRouteKeyName()
  {
    return 'i_uuid';
  }
}
