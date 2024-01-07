<?php
namespace App\Services\Backend\Features\Menus;

use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ShowMenuIndexFeature extends Feature
{
    public function handle(Request $request)
    {
        return $this->run(new RespondWithViewJob('backend::menus.index'));
    }
}
