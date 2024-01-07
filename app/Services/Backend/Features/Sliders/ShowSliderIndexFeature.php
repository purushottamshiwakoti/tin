<?php
namespace App\Services\Backend\Features\Sliders;

use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ShowSliderIndexFeature extends Feature
{
    public function handle(Request $request)
    {
        return $this->run(new RespondWithViewJob('backend::sliders.index'));
    }
}
