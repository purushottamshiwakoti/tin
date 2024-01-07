<?php
namespace App\Services\Backend\Features;

use App\Data\Repositories\Repository;
use App\Data\Traits\RepoStoresTrait;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class StoreItemFeature extends Feature
{
    use RepoStoresTrait;
    public $basePrefix = '';
    public $interface;
    public function __construct(Repository $interface)
    {
        $this->interface = $interface;
        $this->basePrefix = '';
    }
    public function handle(Request $request)
    {
        $routeName = $request->route()->getName();
        $dataName = explode('.',$routeName)[1];
        $this->basePrefix = $dataName;
        return $this->store($request,$this->interface);

    }
}
