<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enrollment extends Model
{
    use SoftDeletes;

  protected $fillable = [
    'e_uuid',
    'grade',
    'invoice_id',
    'user_id',
    'status',
  ];

  protected $hidden = [
    'id'
  ];

  public function getRouteKeyName()
  {
    return 'assq_uuid';
  }
}
