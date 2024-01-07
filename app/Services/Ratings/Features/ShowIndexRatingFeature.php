<?php
namespace App\Services\Ratings\Features;

use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ShowIndexRatingFeature extends Feature
{
    public function handle(Request $request)
    {
        return $this->run(new RespondWithViewJob('ratings::index'));
    }
}
