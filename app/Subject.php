<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
  use SoftDeletes;

  protected $fillable = [
    's_uuid',
    'photo',
    'grade',
    'subject',
    'status',
    'description',
    'photo',
    'uploader_id'
  ];

  protected $hidden = [
    'id'
  ];

  public function getRouteKeyName()
  {
    return 's_uuid';
  }
}
