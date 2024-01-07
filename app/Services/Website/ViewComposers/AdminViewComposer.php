<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 9/4/18
 * Time: 3:37 PM
 */

namespace App\Services\Website\ViewComposers;


use App\Data\Repositories\Contracts\NotificationInterface;
use App\Domains\Backend\Jobs\GetScopedRepositoryJob;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\View\View;
use Lucid\Bus\UnitDispatcher;

class AdminViewComposer
{

    protected  $notification;
    public function __construct(NotificationInterface $notification)
    {
        $this->notification = $notification;
    }

    use DispatchesJobs, UnitDispatcher;
    public function compose(View $view)
    {
        $view->with('unotifications',$this->run(new GetScopedRepositoryJob($this->notification,['latest'])));
    }

}