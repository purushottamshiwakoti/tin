<?php
namespace App\Services\Website\Features;

use App\Data\Models\CustomRequest;
use App\Domains\TravelStyles\Jobs\StoreCustomTravelRequestJob;
use App\Services\Website\Http\Requests\StoreCustomTravelRequest;
use App\Events\Website\CustomTravelRequested;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class StoreCustomTravelRequestFeature extends Feature
{
    // public function handle(StoreCustomTravelRequest $request)
    // {
    //     if(!$tripRequest = $this->run(new StoreCustomTravelRequestJob($request->except('_token'))))
    //     {
    //         $response = ['message'=>'Something went wrong!!','alert-type'=>'error'];
    //     }else{
    //         event(new CustomTravelRequested($tripRequest));
    //         $response = ['message'=>'Successfully posted for moderation.','alert-type'=>'success'];
    //     }
    //     return redirect()->back()->with($response);
    // }
      public function handle(StoreCustomTravelRequest $request)
    {
        // dd($request->all());
        $request['ipaddress'] = $request->getClientIp();
        $request['activities'] = json_encode($request['activities']);
        // $request['guide'] = json_encode($request['guide']);
        // $request['interested'] = json_encode($request['interested']);
        // $request['about_us'] = json_encode($request['about_us']);
            $tripRequest = $this->run(new StoreCustomTravelRequestJob($request->except('_token')));
        if ($tripRequest) {
            event(new CustomTravelRequested($tripRequest));
            $response = ['message'=>'Successfully requested . We will get back to you soon.','alert-type'=>'success'];
            return redirect()->back()->with($response);
        } else {
            $response = ['message'=>'Something went wrong.','alert-type'=>'failed'];
            return redirect()->back()->with($response);
        }
    }
}
