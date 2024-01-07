<?php
namespace App\Services\Backend\Http\Controllers;

use App\Data\Repositories\Contracts\ActivityInterface;
use App\Services\Backend\Features\Activities\DeleteActivityFeature;
use App\Services\Backend\Features\Activities\ListActivitiesFeature;
use App\Services\Backend\Features\Activities\ShowActivityEditAddFeature;
use App\Services\Backend\Features\Activities\ShowActivityIndexFeature;
use App\Services\Backend\Features\Activities\StoreActivityFeature;
use App\Services\Backend\Features\Activities\UpdateActivityFeature;
use App\Services\Backend\Features\ShowSingleItemFeature;
use Illuminate\Http\Request;
use Lucid\Units\Controller;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->serve(ShowActivityIndexFeature::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->serve(ShowActivityEditAddFeature::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->serve(StoreActivityFeature::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ActivityInterface $interface,$id)
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
        return $this->serve(ShowActivityEditAddFeature::class);
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
        return $this->serve(UpdateActivityFeature::class);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->serve(DeleteActivityFeature::class);
    }

    public function getData(Request $request)
    {
        return $this->serve(ListActivitiesFeature::class);
    }
}
