<?php
namespace App\Services\Backend\Features\TravelStyle;

use App\Domains\TravelStyles\Jobs\DeleteTravelStyleJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class DeleteTravelStyleFeature extends Feature
{
    public function handle(Request $request)
    {
        $result = $this->run(new DeleteTravelStyleJob($request->travelstyle));
        return $result;
    }
}
