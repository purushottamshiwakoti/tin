<?php
namespace App\Services\Backend\Http\Controllers;

use App\Data\Repositories\Contracts\UserInterface;
use App\Services\Backend\Features\ShowSingleItemFeature;
use App\Services\Backend\Features\Users\DeleteUsersFeature;
use App\Services\Backend\Features\Users\ListUsersFeature;
use App\Services\Backend\Features\Users\ShowUserIndexPageFeature;
use App\Services\Backend\Features\Users\ShowUsersEditAddFeature;
use App\Services\Backend\Features\Users\StoreUsersFeature;
use App\Services\Backend\Features\Users\UpdateUsersFeature;
use Illuminate\Http\Request;
use Lucid\Units\Controller;

class UserController extends Controller
{

    protected $interface;
    public function __construct(UserInterface $user)
    {
        $this->interface = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return $this->serve(ShowUserIndexPageFeature::class);
    }

    public function getData(Request $request)
    {
        return $this->serve(ListUsersFeature::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->serve(ShowUsersEditAddFeature::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->serve(StoreUsersFeature::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->serve(ShowSingleItemFeature::class,['interface'=>$this->interface,'id'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->serve(ShowUsersEditAddFeature::class);
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
        return $this->serve(UpdateUsersFeature::class);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->serve(DeleteUsersFeature::class);
    }
}
