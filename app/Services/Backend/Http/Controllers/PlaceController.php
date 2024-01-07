<?php
namespace App\Services\Backend\Http\Controllers;

use App\Data\Repositories\Contracts\PlaceInterface;
use App\Services\Backend\Features\Searches\DeletePlaceFeature;
use App\Services\Backend\Features\Searches\ListPlaceFeature;
use App\Services\Backend\Features\Searches\ShowPlaceEditAddFeature;
use App\Services\Backend\Features\Searches\ShowPlaceIndexFeature;

use App\Services\Backend\Features\Searches\StorePlaceFeature;
use App\Services\Backend\Features\Searches\UpdatePlaceFeature;
use App\Services\Backend\Features\ShowSingleItemFeature;
use Illuminate\Http\Request;
use Lucid\Units\Controller;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return $this->serve(ShowPlaceIndexFeature::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->serve(ShowPlaceEditAddFeature::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        return $this->serve(StorePlaceFeature::class);
    }

    public function storeData (Request $request)
    {
        return $this->serve(StorePlaceFeature::class)->name('userdata')->okay;
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PlaceInterface  $interface,$id)
    {
        return $this->serve(ShowSingleItemFeature::class,['interface'=>$interface,'id'=>$id]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->serve(ShowPlaceEditAddFeature::class);

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
        return $this->serve(UpdatePlaceFeature::class);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->serve(DeletePlaceFeature::class);
    }



    /**
     * @param Request $request
     * @return mixed
     */
    public function getData()
    {
        return $this->serve(ListPlaceFeature::class);
    }

}