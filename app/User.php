<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'uuid',
      'email',
      'password',
      'firstname',
      'middlename',
      'address',
      'lastname',
      'birthplace',
      'religion',
      'gender',
      'photo',
      'isLogin',
      'birthday',
      'fathername',
      'fathercontact',
      'mothername',
      'mothercontact',
      'guardianname',
      'relationship',
      'guardiancontact',
      'std_status',
      'grade',
      'grade_level',
      'std_no',
      'lrn_no'
    ];
    public function getRouteKeyName()
    {
      return 'uuid';
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id','password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
