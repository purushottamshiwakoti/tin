<?php
namespace App\Services\Backend\Features\MenuItems;

use App\Domains\Http\Jobs\RespondWithJsonJob;
use App\Domains\MenuItems\Jobs\DeleteMenuItemJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class DeleteMenuItemFeature extends Feature
{
    public function handle(Request $request)
    {
        $result = $this->run(new DeleteMenuItemJob($request->menu_item));
        return $this->run(new RespondWithJsonJob((int)$result));

    }
}
