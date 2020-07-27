<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
  use SoftDeletes;

    protected $fillable = [
      'py_uuid',
      'py_user_id',
      'py_name',
      'py_email',
      'py_contact',
      'trace_no',
      'py_amount',
      'py_details',
      'py_course_id',
      'refNo',
      'py_pay_type',
      'invoice_id',
      'py_status'
    ];

    protected $hidden = [
      'id'
    ];

    public function getRouteKeyName()
    {
      return 'py_uuid';
    }
}
