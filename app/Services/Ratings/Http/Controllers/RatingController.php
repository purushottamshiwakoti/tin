<?php
namespace App\Services\Ratings\Http\Controllers;

use App\Data\Repositories\Contracts\RatingInterface;
use App\Services\Backend\Features\ShowSingleItemFeature;
use App\Services\Ratings\Features\DeleteRatingFeature;
use App\Services\Ratings\Features\ListRatingsFeature;
use App\Services\Ratings\Features\ShowAddUpdateRatingFeature;
use App\Services\Ratings\Features\ShowIndexRatingFeature;
use App\Services\Ratings\Features\StoreRatingFeature;
use App\Services\Ratings\Features\UpdateRatingFeature;
use Illuminate\Http\Request;
use Lucid\Units\Controller;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->serve(ShowIndexRatingFeature::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->serve(ShowAddUpdateRatingFeature::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->serve(StoreRatingFeature::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(RatingInterface $interface,$id)
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
        return $this->serve(ShowAddUpdateRatingFeature::class);
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
        return $this->serve(UpdateRatingFeature::class);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->serve(DeleteRatingFeature::class);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getData(Request $request)
    {
        return $this->serve(ListRatingsFeature::class);
    }
}
