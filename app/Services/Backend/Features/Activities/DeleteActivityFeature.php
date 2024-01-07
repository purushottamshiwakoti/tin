<?php
namespace App\Services\Backend\Features\Activities;

use App\Domains\Activities\Jobs\DeleteActivityJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class DeleteActivityFeature extends Feature
{
    public function handle(Request $request)
    {
        $result = $this->run(new DeleteActivityJob($request->activity));
        return $result;
    }
}
