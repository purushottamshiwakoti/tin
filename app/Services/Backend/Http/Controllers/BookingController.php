<?php
namespace App\Services\Backend\Http\Controllers;

use App\Data\Models\Booking;
use App\Data\Repositories\Contracts\BookingInterface;
use App\Services\Backend\Features\ApproveBookingCancellationFeature;
use App\Services\Backend\Features\ListItemsFeature;
use App\Services\Backend\Features\ShowIndexPageFeature;
use App\Services\Backend\Features\ShowItemEditAddFeature;
use App\Services\Backend\Features\ShowSingleItemFeature;
use App\Services\Backend\Features\UpdateItemFeature;
use App\Services\Bookings\Features\ExportBookingsFeature;
use Illuminate\Http\Request;
use Lucid\Units\Controller;

class BookingController extends Controller
{

    protected $interface;
    public function __construct(BookingInterface $booking)
    {
        $this->interface = $booking;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return view('backend::bookings.pdf',['bookings'=>Booking::all()]);
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
    public function destroy($id)
    {
        //
    }

    public function cancel($id,$passengers)
    {
        return $this->serve(ApproveBookingCancellationFeature::class,['id'=>$id,'passengers'=>$passengers]);
    }

    public function getData(Request $request)
    {
        if($request->get('should_export') == 1)
        {
            return $this->serve(ExportBookingsFeature::class);
        }
        return $this->serve(ListItemsFeature::class,['interface'=>$this->interface]);
    }

    public function export()
    {
        return $this->serve(ExportBookingsFeature::class);
    }
}
