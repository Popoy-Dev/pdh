<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use FFMpeg;
use Dimension;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class VideoTranscodeUpload implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  /**
  * Create a new job instance.
  *
  * @return void
  */
  public $video;
  public $s_uuid;

  public function __construct($video,$s_uuid)
  {
    $this->video = $video;
    $this->s_uuid = $s_uuid;
  }

  /**
  * Execute the job.
  *
  * @return void
  */
  public function handle()
  {
    // create a video format...
    $lowBitrateFormat = (new \FFMpeg\Format\Video\X264('libmp3lame', 'libx264'))->setKiloBitrate(500);
    // $lowBitrateFormat = (new \FFMpeg\Format\Video\WebM())->setKiloBitrate(500);

    $converted_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $this->video->path) . '-trd.mp4';

    FFMpeg::fromDisk($this->video->disk)
    ->open($this->video->path)
    ->addFilter(function ($filters) {
      $filters->resize(new FFMpeg\Coordinate\Dimension(1280, 720));
    })
    ->export()
    ->toDisk('public')
    ->inFormat($lowBitrateFormat)
    ->save($converted_name);

    $this->video->update([
      'converted_for_streaming_at' => Carbon::now(),
      'processed' => true,
      'stream_path' => $converted_name
    ]);

    $file = Storage::disk('public')->get($converted_name);
    //Start Video Save
    $filename = $this->video->path;
    // search file path s3
    $file_Path = '/local-dev/subjects/'.$this->s_uuid.'/video';
    // make directory if no directory
    $makeFolder = Storage::disk('s3')->makeDirectory($file_Path);
    $filePath = $file_Path.'/'.$filename;

    // Storage::disk('s3')->put($filePath, fopen(storage_path('/public').'/'.$this->video->path,'r+'));
    Storage::disk('s3')->put($filePath, $file);
    Storage::disk('public')->delete($this->video->path);
    Storage::disk('public')->delete($converted_name);
  }
}
