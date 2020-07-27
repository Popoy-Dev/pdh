<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LearnMaterial extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'lm_uuid',
    'file',
    'v_thumbnail',
  ];
  protected $hidden = [
    'id'
  ];

  public function getRouteKeyName()
  {
    return 'lm_uuid';
  }
}
