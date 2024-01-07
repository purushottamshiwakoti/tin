<?php
namespace App\Services\Backend\Http\Controllers;

use App\Data\Repositories\Contracts\CustomerInterface;
use App\Services\Backend\Features\ListItemsFeature;
use App\Services\Backend\Features\ShowIndexPageFeature;
use App\Services\Backend\Features\ShowSingleItemFeature;
use App\Services\Customers\Features\DeleteCustomerFeature;
use Illuminate\Http\Request;
use Lucid\Units\Controller;

class CustomerController extends Controller
{

    private $interface;
    public function __construct(CustomerInterface $interface)
    {
        $this->interface = $interface;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->serve(DeleteCustomerFeature::class);

    }

    public function getData(Request $request)
    {
        return $this->serve(ListItemsFeature::class,['interface'=>$this->interface]);
    }
}
