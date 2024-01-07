<?php
namespace App\Services\Website\Features;

use App\Domains\Notifications\Jobs\StoreNotificationJob;
use App\Domains\Subscribers\Jobs\AddSubscribersToSpideyMailJob;
use App\Domains\Subscribers\Jobs\StoreSubscriberJob;
use App\Services\Website\Http\Requests\StoreSubscriptionRequest;
use Illuminate\Validation\ValidationException;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class StoreSubscibersFeature extends Feature
{
    public function handle(StoreSubscriptionRequest $request)
    {
        if($subscriber = $this->run(new StoreSubscriberJob($request->all())))
        {
            $this->run(new AddSubscribersToSpideyMailJob($subscriber));
            $this->run(new StoreNotificationJob('New Subscription','Newsletter subscription by '.$subscriber->email,'subscribers/'.$subscriber->id));
            $result = ['alert_type'=>'success','message'=>'Successful!!','page'=>'subscribe'];
        }else{
            $result = ['alert_type'=>'error','message'=>'Something went wrong!!'];
        }
        return $result;
    }
}
