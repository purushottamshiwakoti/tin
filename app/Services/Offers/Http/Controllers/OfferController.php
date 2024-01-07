<?php
namespace App\Services\Offers\Http\Controllers;

use App\Data\Repositories\Contracts\OfferInterface;
use App\Services\Backend\Features\ShowSingleItemFeature;
use App\Services\Offers\Features\DeleteOfferFeature;
use App\Services\Offers\Features\ListOffersFeature;
use App\Services\Offers\Features\ShowOfferAddUpdateFeature;
use App\Services\Offers\Features\ShowOfferIndexFeature;
use App\Services\Offers\Features\StoreOfferFeature;
use App\Services\Offers\Features\UpdateOfferFeature;
use Illuminate\Http\Request;
use Lucid\Units\Controller;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->serve(ShowOfferIndexFeature::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->serve(ShowOfferAddUpdateFeature::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->serve(StoreOfferFeature::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(OfferInterface $interface,$id)
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
        return $this->serve(ShowOfferAddUpdateFeature::class);
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
        return $this->serve(UpdateOfferFeature::class);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->serve(DeleteOfferFeature::class);
    }

    public function getData()
    {
        return $this->serve(ListOffersFeature::class);
    }
}
