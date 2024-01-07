<?php
namespace App\Services\Backend\Features\Attachments;

use App\Domains\Attachments\Jobs\DeleteAttachmentJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class RemoveAttachmentFeature extends Feature
{
    public function handle(Request $request)
    {
        $result = $this->run(new DeleteAttachmentJob($request->attachment));
        return $result;
    }
}
