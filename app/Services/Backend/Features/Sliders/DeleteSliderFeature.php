<?php
namespace App\Services\Backend\Features\Sliders;

use App\Domains\Sliders\Jobs\DeleteSliderJob;
use App\Domains\Sliders\Jobs\DeleteSlidersJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class DeleteSliderFeature extends Feature
{
    public function handle(Request $request)
    {
        $result = $this->run(new DeleteSlidersJob($request->slider));
        return $result;
    }
}
