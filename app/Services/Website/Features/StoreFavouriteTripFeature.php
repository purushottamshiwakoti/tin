<?php
namespace App\Services\Website\Features;

use App\Domains\Trips\Jobs\StoreFavouriteTripJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class StoreFavouriteTripFeature extends Feature
{
    public function handle(Request $request)
    {

        $data = [
            'customer_id'=>$request->user()->id,
            'ip'=>$request->ip(),
        ];
        $fav = $this->run(new StoreFavouriteTripJob($request->all(),$data));
        return $fav;
    }
}
