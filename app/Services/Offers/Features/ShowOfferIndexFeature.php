<?php
namespace App\Services\Offers\Features;

use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ShowOfferIndexFeature extends Feature
{
    public function handle(Request $request)
    {

        return $this->run(new RespondWithViewJob('offers::index'));
    }
}
