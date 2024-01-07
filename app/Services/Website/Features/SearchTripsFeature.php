<?php

namespace App\Services\Website\Features;

use Lucid\Units\Feature;
use Illuminate\Http\Request;
use App\Domains\Trips\Jobs\SearchTripsJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Pages\Jobs\GetScopedPagesJob;
use App\Domains\Http\Jobs\RespondWithJsonJob;

class SearchTripsFeature extends Feature
{
    public function handle(Request $request)
    {
        if(!$request->ajax())
        {
                    $attributes = ['title', 'caption', 'meta_title', 'trip_code' ,'slug'];
        $data['nepalPostsTour'] = $this->run(new GetScopedPagesJob(['NepalHomeFeatured']));

        $tripsOne = 
        //    dd($request->all());
        $data['trips'] = $this->run(new SearchTripsJob($attributes, $request->get('query'), $request->all()));

        return $this->run(new RespondWithViewJob('website::search', $data));
        }
        $attributes = ['title','caption','meta_title','trip_code'];
        $trips = $this->run(new SearchTripsJob($attributes,$request->get('q'),$request->all()));
        return $this->run(new RespondWithJsonJob($trips->toArray()));
        
    }
}