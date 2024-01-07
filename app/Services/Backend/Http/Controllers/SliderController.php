<?php
namespace App\Services\Backend\Http\Controllers;

use App\Data\Repositories\Contracts\SliderInterface;
use App\Services\Backend\Features\ShowSingleItemFeature;
use App\Services\Backend\Features\Sliders\DeleteSliderFeature;
use App\Services\Backend\Features\Sliders\ListSlidersFeature;
use App\Services\Backend\Features\Sliders\ShowSliderEditAddFeature;
use App\Services\Backend\Features\Sliders\ShowSliderIndexFeature;
use App\Services\Backend\Features\Sliders\StoreSliderFeature;
use App\Services\Backend\Features\Sliders\UpdateSliderFeature;
use Illuminate\Http\Request;
use Lucid\Units\Controller;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->serve(ShowSliderIndexFeature::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->serve(ShowSliderEditAddFeature::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->serve(StoreSliderFeature::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SliderInterface $interface,$id)
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
        return $this->serve(ShowSliderEditAddFeature::class);
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
        return $this->serve(UpdateSliderFeature::class);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->serve(DeleteSliderFeature::class);
    }

    public function getData(Request $request)
    {
        return $this->serve(ListSlidersFeature::class);
    }
}
