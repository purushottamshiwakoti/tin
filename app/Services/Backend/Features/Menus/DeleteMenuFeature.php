<?php
namespace App\Services\Backend\Features\Menus;

use App\Domains\Menus\Jobs\DeleteMenuJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class DeleteMenuFeature extends Feature
{
    public function handle(Request $request)
    {
        $result = $this->run(new DeleteMenuJob($request->menu));
        return $result;
    }
}
