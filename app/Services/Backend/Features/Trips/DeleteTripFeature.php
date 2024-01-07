<?php
namespace App\Services\Backend\Features\Trips;

use App\Domains\Trips\Jobs\DeleteTripJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class DeleteTripFeature extends Feature
{
    public function handle(Request $request)
    {
        $result = $this->run(new DeleteTripJob($request->trip));
        return $result;
    }
}
