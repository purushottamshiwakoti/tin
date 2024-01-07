<?php
namespace App\Services\Ratings\Features;

use App\Data\Repositories\Contracts\RatingInterface;
use App\Domains\Attachments\Jobs\SaveAttachmentJob;
use App\Domains\Attachments\Jobs\UploadMediaJob;
use App\Domains\Backend\Jobs\StoreRepositoryJob;
use App\Services\Ratings\Http\Requests\StoreRatingRequest;
use Lucid\Units\Feature;

class StoreRatingFeature extends Feature
{
    public function handle(StoreRatingRequest $request,RatingInterface $rating)
    {
        $attachment = $this->run(new UploadMediaJob($request->file('image')));
        $rating = $this->run(new StoreRepositoryJob($rating,$request->except('_token')));
        $this->run(new SaveAttachmentJob($rating,$attachment));
        if($rating)
        {
            return redirect()->route('admin.ratings.index');
        }
        $result = ['message'=>'Something went wrong','alert-type'=>'error'];
        return redirect()->back()->with($result);
    }
}
