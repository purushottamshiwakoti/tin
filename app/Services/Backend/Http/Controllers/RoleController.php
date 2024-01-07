<?php
namespace App\Services\Backend\Http\Controllers;

use App\Data\Repositories\Contracts\RoleInterface;
use App\Domains\Roles\Jobs\DeleteRoleJob;
use App\Services\Backend\Features\Roles\DeleteRolesFeature;
use App\Services\Backend\Features\Roles\ListRolesFeature;
use App\Services\Backend\Features\Roles\ShowRolesEditAddFeature;
use App\Services\Backend\Features\Roles\ShowRolesIndexPageFeature;
use App\Services\Backend\Features\Roles\StoreRolesFeature;
use App\Services\Backend\Features\Roles\UpdateRolesFeature;
use App\Services\Backend\Features\ShowSingleItemFeature;
use App\Services\Backend\Features\Users\ListUsersFeature;
use Illuminate\Http\Request;
use Lucid\Units\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->serve(ShowRolesIndexPageFeature::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->serve(ShowRolesEditAddFeature::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->serve(StoreRolesFeature::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(RoleInterface $interface,$id)
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
        return $this->serve(ShowRolesEditAddFeature::class);
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
        return $this->serve(UpdateRolesFeature::class);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->serve(DeleteRolesFeature::class);
    }

    public function getData()
    {
        return $this->serve(ListRolesFeature::class);
    }
}
