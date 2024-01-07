<?php
namespace App\Services\Backend\Features\Subscribers;

use Lucid\Units\Feature;
use Illuminate\Http\Request;
use App\Domains\Http\Jobs\RespondWithViewJob;
use Http\Discovery\Exception\NotFoundException;
use App\Domains\Subscribers\Jobs\GetSingleSubscriberJob;

class ShowSubscriberEditAddFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = [];
        $data['subscribers'] = null;
        if($subscriberId = $request->subscriber)
        {
             if(!$data['subscribers'] = $this->run(new GetSingleSubscriberJob($subscriberId)))
             {
                 throw new NotFoundException();
             }
        }

        return $this->run(new RespondWithViewJob('backend::subscribers.edit-add',$data));


    }
}
