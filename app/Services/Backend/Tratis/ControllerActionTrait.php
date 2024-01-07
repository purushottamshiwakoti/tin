<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/31/18
 * Time: 1:01 PM
 */

namespace App\Services\Backend\Tratis;


use App\Services\Backend\Features\ListItemsFeature;
use App\Services\Backend\Features\RemoveItemFeature;
use App\Services\Backend\Features\ShowIndexPageFeature;
use App\Services\Backend\Features\ShowItemEditAddFeature;
use App\Services\Backend\Features\ShowSingleItemFeature;
use App\Services\Backend\Features\StoreItemFeature;
use App\Services\Backend\Features\UpdateItemFeature;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Lucid\Bus\ServesFeatures;

trait ControllerActionTrait
{

    use ValidatesRequests, ServesFeatures;

    public function index()
    {
        return $this->serve(ShowIndexPageFeature::class,['interface'=>$this->interface]);
    }

    public function create()
    {

        return $this->serve(ShowItemEditAddFeature::class,['interface'=>$this->interface]);

    }

    public function store()
    {
        return $this->serve(StoreItemFeature::class,['interface'=>$this->interface]);
    }

    public function update(Request $request,$id)
    {
        return $this->serve(UpdateItemFeature::class,['interface'=>$this->interface,'id'=>$id]);
    }

    public function edit(Request $request,$id)
    {
        return $this->serve(ShowItemEditAddFeature::class,['interface'=>$this->interface,'id'=>$id]);
    }

    public function show($id)
    {
        return $this->serve(ShowSingleItemFeature::class,['interface'=>$this->interface,'id'=>$id]);
    }

    public function destroy($id)
    {
        return $this->serve(RemoveItemFeature::class,['interface'=>$this->interface,'id'=>$id]);
    }

    public function getData()
    {
        return $this->serve(ListItemsFeature::class,['interface'=>$this->interface]);
    }



}