<?php
namespace App\Services\Backend\Http\Controllers;

use App\Data\Repositories\Contracts\PageInterface;
use App\Services\Backend\Features\Pages\ListPagesFeature;
use App\Services\Backend\Features\Pages\DeletePageFeature;
use App\Services\Backend\Features\Pages\ShowPagesEditAddFeature;
use App\Services\Backend\Features\Pages\StorePagesFeature;
use App\Services\Backend\Features\Pages\UpdatePagesFeature;
use App\Services\Backend\Features\Pages\ShowPageIndexFeature;
use App\Services\Backend\Features\ShowSingleItemFeature;
use Illuminate\Http\Request;
use Lucid\Units\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->serve(ShowPageIndexFeature::class);
    }

    public function getData(Request $request)
    {
        return $this->serve(ListPagesFeature::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return $this->serve(ShowPagesEditAddFeature::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->serve(StorePagesFeature::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PageInterface $interface,$id)
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
        return $this->serve(ShowPagesEditAddFeature::class);
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
        return $this->serve(UpdatePagesFeature::class);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->serve(DeletePageFeature::class);
    }
}
