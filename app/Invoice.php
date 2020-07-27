<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
  use SoftDeletes;

    protected $fillable = ['in_uuid','in_user_id','invoice_num','amount','coupon','regfee_status','inv_status','grade'];

    // protected $hidden = [
    //   'id'
    // ];

    public function getRouteKeyName()
    {
      return 'in_uuid';
    }
}
