<?php
namespace App\Services\Backend\Features\Destinations;

use App\Domains\Attachments\Jobs\SaveAttachmentJob;
use App\Domains\Attachments\Jobs\SaveCoverImageJob;
use App\Domains\Attachments\Jobs\UploadMediaJob;
use App\Domains\Destinations\Jobs\StoreDestinationJob;
use App\Services\Destinations\Http\Requests\StoreDestinationRequest;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class StoreDestinationFeature extends Feature
{
    public function handle(StoreDestinationRequest $request)
    {
        // dd($request->input('trips'));
        $faq=$request->input('faq');
        $attachment = $this->run(new UploadMediaJob($request->file('image')));
        $cover_image = $this->run(new UploadMediaJob($request->file('cover_image')));
        $destination = $this->run(new StoreDestinationJob($request->all()));
      if($faq){
        foreach ($faq as $f){
            // dd($f['question']);
            $destination->faqs()->create(['question' => $f['question'],'answer'=>$f['answer']]);
        }
      }
        // dd($request->input('activities'));
        $destination->activities()->sync($request->input('activities'));
        $destination->regions()->sync($request->input('regions'));
        $destination->destinationTrip()->sync($request->input('trips'));
        $this->run(new SaveAttachmentJob($destination,$attachment));
        $this->run(new SaveCoverImageJob($destination,$cover_image));
        if($destination)
        {
            return redirect()->route('admin.destinations.index');
        }
        $result = ['message'=>'Something went wrong','alert-type'=>'error'];
        return redirect()->back()->with($result);

    }
}
