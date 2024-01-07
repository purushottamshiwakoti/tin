<?php
namespace App\Services\Backend\Http\Controllers;

use App\Data\Repositories\Contracts\EnquiryInterface;
use App\Services\Backend\Features\ListItemsFeature;
use App\Services\Backend\Features\ShowIndexPageFeature;
use App\Services\Backend\Features\ShowSingleItemFeature;
use Lucid\Units\Controller;

class EnquiryController extends Controller
{
    protected $interface;
    public function __construct(EnquiryInterface $interface)
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

    public function show($id)
    {
        return $this->serve(ShowSingleItemFeature::class,['interface'=>$this->interface,'id'=>$id]);
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->serve(ListItemsFeature::class,['interface'=>$this->interface]);
    }

}
