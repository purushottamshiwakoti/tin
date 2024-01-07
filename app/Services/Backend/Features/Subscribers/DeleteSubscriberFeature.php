<?php
namespace App\Services\Backend\Features\Subscribers;

use App\Domains\Subscribers\Jobs\DeleteSubscriberJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class DeleteSubscriberFeature extends Feature
{
    public function handle(Request $request)
    {
        $result = $this->run(new DeleteSubscriberJob($request->subscriber));
        return $result;
    }
}
