<?php
namespace App\Domains\Attachments\Jobs;

use App\Data\Repositories\Contracts\AttachmentInterface;
use Lucid\Units\Job;

class DeleteAttachmentJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @param AttachmentInterface $attachment
     * @return mixed
     */
    public function handle(AttachmentInterface $attachment)
    {
        return $attachment->remove($this->id);
    }
}
