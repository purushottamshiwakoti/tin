<?php
namespace App\Services\Backend\Http\Controllers;

use App\Data\Repositories\Contracts\FixedDepartureInterface;
use App\Services\Backend\Features\ListItemsFeature;
use App\Services\Backend\Features\RemoveItemFeature;
use App\Services\Backend\Features\ShowIndexPageFeature;
use App\Services\Backend\Features\ShowItemEditAddFeature;
use App\Services\Backend\Features\ShowSingleItemFeature;
use App\Services\Backend\Features\UpdateItemFeature;
use App\Services\FixedDepartures\Features\RemoveDealFeature;
use Illuminate\Http\Request;
use Lucid\Units\Controller;

class FixedDepartureController extends Controller
{

    protected $interface;
    public function __construct(FixedDepartureInterface $departure)
    {
        $this->interface = $departure;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        if($request->get('type') == 'deal')
        {
            return $this->serve(RemoveDealFeature::class,['id'=>$id]);
        }
        return $this->serve(ShowSingleItemFeature::class,['interface'=>$this->interface,'id'=>$id]);
    }

    public function edit(Request $request,$id)
    {
        return $this->serve(ShowItemEditAddFeature::class,['interface'=>$this->interface,'id'=>$id]);
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

        return $this->serve(UpdateItemFeature::class,['interface'=>$this->interface,'id'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        return $this->serve(RemoveItemFeature::class,['interface'=>$this->interface,'id'=>$id]);

    }

    public function getData()
    {
        return $this->serve(ListItemsFeature::class,['interface'=>$this->interface]);
    }
}
