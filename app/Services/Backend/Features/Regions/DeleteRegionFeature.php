<?php
namespace App\Services\Backend\Features\Regions;

use App\Domains\Regions\Jobs\DeleteRegionJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class DeleteRegionFeature extends Feature
{
    public function handle(Request $request)
    {
        $result = $this->run(new DeleteRegionJob($request->region));
        return $result;
    }
}
