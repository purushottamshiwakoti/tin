<?php
namespace App\Services\Backend\Http\Controllers;

use Lucid\Units\Controller;
use Illuminate\Http\Request;
use App\Services\Backend\Features\ListItemsFeature;
use App\Services\Backend\Features\ShowIndexPageFeature;
use App\Data\Repositories\Contracts\SubscriberInterface;
use App\Services\Backend\Features\ShowSingleItemFeature;
use App\Services\Backend\Features\Subscribers\StoreSubscriberFeature;
use App\Services\Backend\Features\Subscribers\DeleteSubscriberFeature;
use App\Services\Backend\Features\Subscribers\UpdateSubscriberFeature;
use App\Services\Backend\Features\Subscribers\ShowSubscriberEditAddFeature;

class SubscriberController extends Controller
{
    protected $interface;
    public function __construct(SubscriberInterface $subscriber)
    {
        $this->interface = $subscriber;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->serve(ShowIndexPageFeature::class,['interface'=>$this->interface]);
    }

    public function show($id)
    {
        return $this->serve(ShowSingleItemFeature::class,['interface'=>$this->interface,'id'=>$id]);
    }

    public function create()
    {
        return $this->serve(ShowSubscriberEditAddFeature::class);
    }

    public function store(Request $request)
    {
        return $this->serve(StoreSubscriberFeature::class);
    }

    public function edit($id)
    {
        return $this->serve(ShowSubscriberEditAddFeature::class);
    }

    public function update(Request $request)
    {
        return $this->serve(UpdateSubscriberFeature::class);

    }

    public function destroy($id)
    {
        return $this->serve(DeleteSubscriberFeature::class);
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->serve(ListItemsFeature::class,['interface'=>$this->interface]);
    }

}
