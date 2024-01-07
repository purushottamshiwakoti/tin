<?php
namespace App\Services\Backend\Features\Subscribers;

use Lucid\Units\Feature;

use Illuminate\Http\Request;
use App\Domains\Subscribers\Jobs\StoreSubscriberJob;

class StoreSubscriberFeature extends Feature
{
    public function handle(Request $request)
    {

        $subscriber = $this->run(new StoreSubscriberJob($request->all()));
        if($subscriber)
        {
            $result = ['message'=>'Subscriber stored successfully.','alert-type'=>'success'];
            return redirect()->route('admin.subscribers.index')->with($result);
        }
        $result = ['message'=>'Something went wrong','alert-type'=>'error'];
        return redirect()->back()->with($result);

    }
}
