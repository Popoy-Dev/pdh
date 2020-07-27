<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Otc extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'o_uuid',
    'user_id',
    'grade_level',
    'reg_fee',
    'amount',
    'status'
  ];

  protected $hidden = [
    'id'
  ];

  public function getRouteKeyName()
  {
    return 'o_uuid';
  }
}
