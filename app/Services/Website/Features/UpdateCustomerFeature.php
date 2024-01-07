<?php
namespace App\Services\Website\Features;

use App\Domains\Attachments\Jobs\SaveAttachmentJob;
use App\Domains\Attachments\Jobs\UploadMediaJob;
use App\Domains\Customers\Jobs\UpdateCustomerJob;
use App\Services\Website\Http\Requests\UpdateCustomerRequest;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class UpdateCustomerFeature extends Feature
{
    public function handle(UpdateCustomerRequest $request)
    {
        $attachment = $this->run(new UploadMediaJob($request->file('image')));
        $customer = $this->run(new UpdateCustomerJob($request->user,$request->all()));
        $this->run(new SaveAttachmentJob($customer,$attachment));
        if(!$customer)
        {
            return redirect()->back()->with(['message'=>'Something went wrong!!','alert-type'=>'error']);
        }
        return redirect()->back()->with(['message'=>'Updated!!','alert-type'=>'success']);

    }
}
