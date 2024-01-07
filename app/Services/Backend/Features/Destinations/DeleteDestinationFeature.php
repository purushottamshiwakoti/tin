<?php
namespace App\Services\Backend\Features\Destinations;

use App\Domains\Destinations\Jobs\DeleteDestinationJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class DeleteDestinationFeature extends Feature
{
    public function handle(Request $request)
    {
        $result = $this->run(new DeleteDestinationJob($request->destination));
        return $result;
    }
}
