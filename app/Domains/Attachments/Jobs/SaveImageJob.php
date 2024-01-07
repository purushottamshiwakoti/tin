<?php
namespace App\Domains\Attachments\Jobs;

use Lucid\Units\Job;

class SaveImageJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $attachable;
    private $attachment;
    private $mediaType;
    public function __construct($attachable,$attachment,$mediaType)
    {
        $this->attachable = $attachable;
        $this->attachment = $attachment;
        $this->mediaType = $mediaType;
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->attachment)
        {
            $relation = camel_case($this->mediaType);
            if($this->attachable->{$relation}) {
                $this->attachable->{$relation}()->delete();
            }
            $this->attachment->media_type=$this->mediaType;
            // print_r($this->attachment);exit;
            return $this->attachable->{$relation}()->save($this->attachment);
        }
    }
}
