<?php
namespace App\Services\Backend\Features;

use App\Data\Repositories\Repository;
use App\Domains\Backend\Jobs\RemoveRepositoryJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class RemoveItemFeature extends Feature
{
    public $interface;
    public $id;
    public function __construct(Repository $interface,$id)
    {
        $this->interface = $interface;
        $this->id = $id;
    }

    public function handle(Request $request)
    {
        return $this->run(new RemoveRepositoryJob($this->interface,$this->id));
    }
}
