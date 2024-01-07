<?php
namespace App\Services\Website\Features;

use Lucid\Units\Feature;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use App\Events\Website\BookingCompleted;
use App\Data\Services\Payments\PaymentService;
use App\Domains\Bookings\Jobs\ConfirmBookingJob;
use App\Domains\Subscribers\Jobs\StoreSubscriberJob;
use App\Services\Website\Http\Requests\ConfirmBookingRequest;
use App\Domains\Bookings\Jobs\ValidateUpdateBookingSessionJob;
use App\Mail\BookingCompletedMail;

class ConfirmBookingFeature extends Feature
{

    public function handle(ConfirmBookingRequest $request,PaymentService $payment)
    {
//        $payment = new PaymentService();
        $this->run(new ValidateUpdateBookingSessionJob(Crypt::decrypt($request->booking)));
        $booking = $this->run(new ConfirmBookingJob(Crypt::decrypt($request->booking)));
        if($request->get('subscribe') == 1)
        {
            $this->run(new StoreSubscriberJob($booking->passengers->first()->toArray()));
        }
        if(!$booking)
        {
            return new JsonResponse(['message'=>'something went wrong']);
//            return redirect()->back()->with(['message'=>'Something went wrong!','alert-type'=>'error']);
        }
        session()->forget('booking_data');

        // $data = $payment->makePayment($booking,'paypal');
        
        // print_r($data);exit;
        // return new JsonResponse($data);
        event(new BookingCompleted($booking));
//        $this->run(new StoreNotificationJob('Trip Booking','Trip booking request for '.$booking->trip_name.' '.$booking->start_date,'bookings/'.$booking->id));
        $result = ['message'=>'Booking successful!!','alert-type'=>'success'];

        return redirect()->route('website.booking.success',$request->booking)->with($result);

    }
}