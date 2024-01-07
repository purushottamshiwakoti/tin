<?php
namespace App\Services\Backend\Http\Controllers;

use App\Data\Repositories\Contracts\TeamInterface;
use App\Services\Backend\Features\ShowSingleItemFeature;
use App\Services\Backend\Features\Teams\DeleteTeamFeature;
use App\Services\Backend\Features\Teams\ListTeamFeature;
use App\Services\Backend\Features\Teams\ShowTeamEditAddFeature;
use App\Services\Backend\Features\Teams\ShowTeamIndexFeature;
use App\Services\Backend\Features\Teams\StoreTeamFeature;
use App\Services\Backend\Features\Teams\UpdateTeamFeature;
use Illuminate\Http\Request;
use Lucid\Units\Controller;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return $this->serve(ShowTeamIndexFeature::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->serve(ShowTeamEditAddFeature::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->serve(StoreTeamFeature::class);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TeamInterface $interface,$id)
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
        return $this->serve(ShowTeamEditAddFeature::class);

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
        return $this->serve(UpdateTeamFeature::class);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->serve(DeleteTeamFeature::class);
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function getData()
    {
        return $this->serve(ListTeamFeature::class);
    }
}
