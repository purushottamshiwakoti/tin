<?php

namespace App\Services\Backend\Http\Controllers;

use App\Data\Repositories\Contracts\RegionInterface;
use App\Services\Backend\Features\Regions\DeleteRegionFeature;
use App\Services\Backend\Features\Regions\ListRegionsFeature;
use App\Services\Backend\Features\Regions\ShowRegionEditAddFeature;
use App\Services\Backend\Features\Regions\ShowRegionIndexFeature;
use App\Services\Backend\Features\Regions\StoreRegionFeature;
use App\Services\Backend\Features\Regions\UpdateRegionFeature;
use App\Services\Backend\Features\ShowSingleItemFeature;
use Illuminate\Http\Request;
use Lucid\Units\Controller;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->serve(ShowRegionIndexFeature::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->serve(ShowRegionEditAddFeature::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->serve(StoreRegionFeature::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(RegionInterface $interface, $id)
    {
        return $this->serve(ShowSingleItemFeature::class, ['interface' => $interface, 'id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->serve(ShowRegionEditAddFeature::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->serve(UpdateRegionFeature::class);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->serve(DeleteRegionFeature::class);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getData(Request $request)
    {
        return $this->serve(ListRegionsFeature::class);
    }
}
