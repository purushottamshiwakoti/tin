<?php
namespace App\Services\Backend\Features\Subscribers;

use Lucid\Units\Feature;

use Illuminate\Http\Request;
use App\Domains\Subscribers\Jobs\UpdateSubscriberJob;

class UpdateSubscriberFeature extends Feature
{
    public function handle(Request $request)
    {
        $subscriberId = $request->subscriber;

        $subscriber = $this->run(new UpdateSubscriberJob($subscriberId,$request->all()));
        if($subscriber)
        {
            $result = ['message'=>'Subscriber updated successfully.','alert-type'=>'success'];
            return redirect()->route('admin.subscribers.index')->with($result);
        }
        $result = ['message'=>'Something went wrong','alert-type'=>'error'];
        return redirect()->back()->with($result);

    }
}
