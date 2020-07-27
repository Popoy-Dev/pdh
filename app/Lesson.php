<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Lesson extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'l_uuid',
    'inst_id',
    'lesson_title',
    'sort'
  ];
  protected $hidden = [
    'id'
  ];

  public function getRouteKeyName()
  {
    return 'l_uuid';
  }
}
