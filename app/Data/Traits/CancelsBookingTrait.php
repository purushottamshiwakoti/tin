<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 9/25/18
 * Time: 3:30 PM
 */

namespace App\Data\Traits;


use App\Data\Models\Booking;
use App\Data\Models\ExtraValue;
use App\Data\Models\Passenger;
use App\Domains\Notifications\Jobs\StoreNotificationJob;
use App\Events\Website\BookCancelRequested;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Lucid\Bus\UnitDispatcher;
use Lucid\Foundation\JobDispatcherTrait;

trait CancelsBookingTrait
{

    use DispatchesJobs,UnitDispatcher;
    /**
     * @param $bookingId
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancel($bookingId,Request $request)
    {
        $this->validateRequest($request);
        $booking = Booking::where('cancelled_at',null)->where('id',$bookingId)->where('customer_id',auth()->user()->id)->first();
        if(!$booking)
        {
            abort(404);
        }
        $cancel_remarks = $request->get('customer_remarks');
        $passenger_ids = $request->get('passenger_ids');
        $ids = explode(',',$passenger_ids);
//        $data = $this->getPayload($request);
//        if($booking->fill($data)->save())

        if($this->bulkCancel($bookingId,$ids))
        {
            $booking->cancelRequests()->save(new ExtraValue(['key'=>'customer_remarks','value'=>$cancel_remarks,'type'=>'cancel_requests']));
            $this->run(new StoreNotificationJob('Booking Cancellation Requested','Booking Cancellation Requested for'.$booking->trip_name,'bookings/'.$booking->id));
            event(new BookCancelRequested($booking));
            return $this->respondCancelled();
        }
        return $this->respondError();
    }

    protected function bulkCancel($bookingId,$ids)
    {
        $res =  Passenger::whereIn('id',$ids)->where('booking_id',$bookingId)->update(['cancel_requested_at'=>now()]);
        return $res;
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function respondCancelled()
    {
        return redirect()->back()->with(['messages'=>'Successful. You have issued cancellation request.','alert-type'=>'success']);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function respondError()
    {
        return redirect()->back()->with(['messages'=>'Something went wrong.','alert-type'=>'error']);
    }


    /**
     * @param $request
     * @return array
     */
    protected function getPayload($request)
    {
        $data = $request->only('customer_remarks');
        $attributes = array_merge($data,[
            'cancel_requested_at'=>now(),
        ]);
        return $attributes;
    }

    /**
     * @param $request
     */
    protected function validateRequest($request)
    {
        $this->validate($request, [
            'customer_remarks' => 'required|max:255',
        ]);
    }
}