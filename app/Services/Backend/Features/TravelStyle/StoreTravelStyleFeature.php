<?php
namespace App\Services\Backend\Features\TravelStyle;

use App\Domains\Teams\Jobs\StoreTeamJob;
use App\Domains\TravelStyles\Jobs\StoreTravelStyleJob;
use App\Services\Backend\Http\Requests\StoreTravelStylesRequest;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class StoreTravelStyleFeature extends Feature
{
    public function handle(StoreTravelStylesRequest $request)
    {

       
        $travelstyle = $this->run(new StoreTravelStyleJob($request->all()));
       
        if($travelstyle)
        {
            return redirect()->route('admin.travelstyles.index');
        }
        $result = ['message'=>'Something went wrong','alert-type'=>'error'];
        return redirect()->back()->with($result);

    }
}
