<?php
namespace App\Services\Backend\Http\Controllers;


use App\Data\Repositories\Contracts\DestinationInterface;
use App\Services\Backend\Features\Destinations\DeleteDestinationFeature;
use App\Services\Backend\Features\Destinations\ListDestinationsFeature;
use App\Services\Backend\Features\Destinations\ShowDestinationEditAddFeature;
use App\Services\Backend\Features\Destinations\ShowDestinationIndexFeature;
use App\Services\Backend\Features\Destinations\StoreDestinationFeature;
use App\Services\Backend\Features\Destinations\UpdateDestinationFeature;
use App\Services\Backend\Features\ShowSingleItemFeature;
use Illuminate\Http\Request;
use Lucid\Units\Controller;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->serve(ShowDestinationIndexFeature::class);
    }

    public function getData()
    {
        return $this->serve(ListDestinationsFeature::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->serve(ShowDestinationEditAddFeature::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->serve(StoreDestinationFeature::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(DestinationInterface $interface,$id)
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
        return $this->serve(ShowDestinationEditAddFeature::class);
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
        return $this->serve(UpdateDestinationFeature::class);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->serve(DeleteDestinationFeature::class);
    }
}
