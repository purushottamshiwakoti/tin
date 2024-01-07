<?php
namespace App\Services\Website\Http\Controllers;

use Lucid\Units\Controller;
use Illuminate\Http\Request;
use App\Data\Traits\CancelsBookingTrait;
use App\Services\Website\Features\InitBookFeature;
use App\Services\Website\Features\StoreBookingFeature;
use App\Services\Website\Features\UpdateBookingFeature;
use App\Services\Website\Features\BookingSuccessFeature;
use App\Services\Website\Features\ConfirmBookingFeature;
use App\Services\Website\Features\DownloadInvoiceFeature;
use App\Services\Website\Features\ShowBookingReviewFeature;
use App\Services\Website\Features\StoreBookingSessionFeature;
use App\Services\Website\Features\UpdateBookingSessionFeature;
use App\Services\Website\Features\StoreBookingExtraDetailFeature;
use App\Services\Website\Features\ShowBookingCreateFeaturesPageFeature;

class BookingController extends Controller
{
    use CancelsBookingTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        return $this->serve(UpdateBookingFeature::class);
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

    /**
     * @param Request $request
     * @param $trip
     * @param $departure
     * @return mixed
     */

    public function initBook(Request $request,$trip,$departure)
    {
        // session()->forget('booking_data');
        // dd(session('booking_data')); 
        
        return $this->serve(InitBookFeature::class);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function intoSession(Request $request)
    {
        return $this->serve(StoreBookingSessionFeature::class);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function updateIntoSession(Request $request)
    {
        return $this->serve(UpdateBookingSessionFeature::class);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function createFeature(Request $request)
    {
        return $this->serve(ShowBookingCreateFeaturesPageFeature::class);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function storeFeatures(Request $request)
    {
        return $this->serve(StoreBookingExtraDetailFeature::class);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function review(Request $request)
    {
        return $this->serve(ShowBookingReviewFeature::class);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function confirm(Request $request)
    {
        return $this->serve(ConfirmBookingFeature::class);
    }

    public function success(Request $request)
    {
        return $this->serve(BookingSuccessFeature::class);
    }

    public function downloadInvoice(Request $request,$booking)
    {
        return $this->serve(DownloadInvoiceFeature::class);
    }
    public function booking(Request $request)
    {
        // dd('here');
        return $this->serve(StoreBookingFeature::class);
    }

}
