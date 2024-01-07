<?php
namespace App\Services\Backend\Http\Controllers;

use Lucid\Units\Controller;
use Illuminate\Http\Request;
use App\Services\Backend\Features\ShowSingleItemFeature;
use App\Data\Repositories\Contracts\TravelStyleInterface;
use App\Services\Backend\Features\TravelStyle\ListTravelStyleFeature;
use App\Services\Backend\Features\TravelStyle\StoreTravelStyleFeature;
use App\Services\Backend\Features\TravelStyle\DeleteTravelStyleFeature;
use App\Services\Backend\Features\TravelStyle\UpdateTravelStyleFeature;
use App\Services\Backend\Features\TravelStyle\ShowTravelStyleIndexFeature;
use App\Services\Backend\Features\TravelStyle\ShowTravelStyleEditAddFeature;

class TravelStyleController extends Controller
{

 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('here');
        return $this->serve(ShowTravelStyleIndexFeature::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->serve(ShowTravelStyleEditAddFeature::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->serve(StoreTravelStyleFeature::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TravelStyleInterface $interface,$id)
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
        return $this->serve(ShowTravelStyleEditAddFeature::class);
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
        return $this->serve(UpdateTravelStyleFeature::class);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->serve(DeleteTravelStyleFeature::class);
      
    }

    public function getData(Request $request)
    {
        return $this->serve(ListTravelStyleFeature::class);
    }
}
