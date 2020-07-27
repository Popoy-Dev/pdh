<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
  protected $fillable = [
    'title',
    'original_name',
    'disk',
    'path',
    'stream_path',
    'processed',
    'converted_for_streaming_at',
  ];
}
