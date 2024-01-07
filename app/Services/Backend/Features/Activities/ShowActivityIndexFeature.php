<?php
namespace App\Services\Backend\Features\Activities;

use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ShowActivityIndexFeature extends Feature
{
    public function handle(Request $request)
    {
        return $this->run(new RespondWithViewJob('backend::activities.index'));
    }
}
