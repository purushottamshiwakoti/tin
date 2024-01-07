<?php
namespace App\Services\Backend\Features;

use App\Data\Repositories\Repository;
use App\Data\Traits\RepoUpdatesTrait;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class UpdateItemFeature extends Feature
{
    use RepoUpdatesTrait;
    public $basePrefix = '';
    public $interface;
    public $id;
    public function __construct(Repository $interface,$id)
    {
        $this->interface = $interface;
        $this->id = $id;
        $this->basePrefix = '';
    }

    public function handle(Request $request)
    {
        $routeName = $request->route()->getName();
        $dataName = explode('.',$routeName)[1];
        $this->basePrefix = $dataName;
        return $this->update($request,$this->interface,$this->id);
    }
}
