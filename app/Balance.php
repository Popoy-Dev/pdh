<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Balance extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'b_uuid',
    'user_id',
    'balance'
  ];
  protected $hidden = [
    'id'
  ];

  public function getRouteKeyName()
  {
    return 'b_uuid';
  }
}
