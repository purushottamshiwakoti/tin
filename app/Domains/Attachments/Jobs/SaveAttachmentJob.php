<?php
namespace App\Domains\Attachments\Jobs;

use App\Data\Repositories\Contracts\AttachmentInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Lucid\Units\Job;
use Symfony\Component\Console\Input\Input as InputInput;

class SaveAttachmentJob extends Job
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
     * @param Request $request
     * @param AttachmentInterface $attachmentInter
     * @return mixed
     */
    public function handle(Request $request,AttachmentInterface $attachmentInter)
    {
        if(FacadesRequest::get('captions'))
        {
            $captions = $request->get('captions');
            foreach ($captions as $key=>$caption)
            {
                if($attachmentInter->findById($key))
                {
                    $attachmentInter->update($key,['caption'=>$caption]);
                }

            }
        }
        if($this->attachment)
        {
            return $this->attachable->attachments()->save($this->attachment);
        }
        return false;
    }
}
