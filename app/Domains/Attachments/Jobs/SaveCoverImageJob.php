<?php
namespace App\Domains\Attachments\Jobs;

use Lucid\Units\Job;

class SaveCoverImageJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $attachable;
    private $attachment;
    public function __construct($attachable,$attachment = null)
    {
        $this->attachable = $attachable;
        $this->attachment = $attachment;
    }

    /**
     * @return mixed
     */
    public function handle()
    {
        if($this->attachment)
        {
            if($this->attachable->coverImage) {
                $this->attachable->coverImage->delete();
            }
            $this->attachment->media_type='cover';
           // print_r($this->attachment);exit;
            return $this->attachable->coverImage()->save($this->attachment);
        }
    }
}
