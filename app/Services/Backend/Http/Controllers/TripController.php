<?php
namespace App\Services\Backend\Http\Controllers;

use App\Data\Models\Trip;
use Lucid\Units\Controller;
use Illuminate\Http\Request;
use App\Services\Backend\Features\Trips\ListTripFeature;
use App\Services\Backend\Features\Trips\StoreTripFeature;
use App\Services\Backend\Features\Trips\DeleteTripFeature;
use App\Services\Backend\Features\Trips\UpdateTripFeature;
use App\Services\Backend\Features\Trips\ShowTripIndexFeature;
use App\Services\Backend\Features\Trips\ShowSingleTripFeature;
use App\Services\Backend\Features\Trips\ShowTripEditAddFeature;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->serve(ShowTripIndexFeature::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->serve(ShowTripEditAddFeature::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->serve(StoreTripFeature::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->serve(ShowSingleTripFeature::class);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->serve(ShowTripEditAddFeature::class);
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
        return $this->serve(UpdateTripFeature::class);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->serve(DeleteTripFeature::class);
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function getData(Request $request)
    {
        return $this->serve(ListTripFeature::class);
    }

    public function checkTripCode(Request $request)
    {
        $query = Trip::query();
        if($request->trip_id != 0)
        {
            $query->where('id','!=',$request->trip_id);
        }
        $query->where('trip_code',$request->trip_code)->get();
        $trip = $query->get();
        if(count($trip)>0)
        {   
            return response()->json(['status'=>false]);
        }
        return response()->json(['status'=>true]);
        
    }

}
