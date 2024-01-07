<?php
namespace App\Services\Backend\Features\MenuItems;

use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Menus\Jobs\GetSingleMenuJob;
use App\Domains\Trips\Jobs\GetTripsAsOptionJob;
use App\Domains\Trips\Jobs\GetTripsByIdsJob;
use App\Domains\Trips\Tests\Jobs\GetTripsByIdsJobTest;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ShowMenuItemIndexFeature extends Feature
{
    public function handle(Request $request)
    {
        $data['menu'] = $this->run(new GetSingleMenuJob($request->menu));
        $data['trips'] = $this->run(new GetTripsAsOptionJob());
        return $this->run(new RespondWithViewJob('backend::menus.menu-items.index',$data));
    }
}
