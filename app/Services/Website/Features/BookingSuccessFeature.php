<?php
namespace App\Services\Website\Features;


use Lucid\Units\Feature;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Domains\Http\Jobs\RespondWithViewJob;


class BookingSuccessFeature extends Feature
{

    public function handle()
    {
        return $this->run(new RespondWithViewJob('website::trips.booking.success'));
    }
}