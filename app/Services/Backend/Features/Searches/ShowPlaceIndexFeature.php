<?php
namespace App\Services\Backend\Features\Searches;

use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ShowPlaceIndexFeature extends Feature
{
    public function handle(Request $request)
    {
      
        return $this->run(new RespondWithViewJob('backend::searches.index'));
    }
}