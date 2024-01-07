<?php
namespace App\Services\Backend\Features\TravelStyle;

use Lucid\Units\Feature;
use Illuminate\Http\Request;
use App\Domains\Http\Jobs\RespondWithViewJob;


class ShowTravelStyleIndexFeature extends Feature
{
    public function handle(Request $request)
    {
        return $this->run(new RespondWithViewJob('backend::travelstyles.index'));


    }
}
