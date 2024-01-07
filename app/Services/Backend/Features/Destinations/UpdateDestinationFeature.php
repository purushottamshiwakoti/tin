<?php
namespace App\Services\Backend\Features\Destinations;

use App\Domains\Attachments\Jobs\SaveAttachmentJob;
use App\Domains\Attachments\Jobs\SaveCoverImageJob;
use App\Domains\Attachments\Jobs\UploadMediaJob;
use App\Domains\Destinations\Jobs\UpdateDestinationJob;
use App\Services\Destinations\Http\Requests\StoreDestinationRequest;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class UpdateDestinationFeature extends Feature
{
    public function handle(StoreDestinationRequest $request)
    {
        // dd($request->all());
        $faq=$request->input('faq');
        // dd($faq);
        $destinationId = $request->destination;
        $attachment = $this->run(new UploadMediaJob($request->file('image')));
        $cover_image = $this->run(new UploadMediaJob($request->file('cover_image')));

        $destination = $this->run(new UpdateDestinationJob($destinationId,$request->except('_token')));

        $this->run(new SaveAttachmentJob($destination,$attachment));
        $this->run(new SaveCoverImageJob($destination,$cover_image));
        if(!$destination)
        {
            $result = ['message'=>'Something went wrong','alert-type'=>'error'];
            return redirect()->back()->with($result);
        }
        $destination->faqs()->delete();
        $destination->activities()->sync($request->input('activities'));
        $destination->regions()->sync($request->input('regions'));
        $destination->destinationTrip()->sync($request->input('trips'));
        if($faq){
            foreach ($faq as $f){
                // dd($f['question']);
                $destination->faqs()->create(['question' => $f['question'],'answer'=>$f['answer']]);
            }
        }
        return redirect()->route('admin.destinations.index');

    }
}
