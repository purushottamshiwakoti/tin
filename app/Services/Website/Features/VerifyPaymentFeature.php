<?php
namespace App\Services\Website\Features;

use App\Data\Services\Payments\PaymentService;
use App\Domains\Bookings\Jobs\UpdateBookingStatusJob;
use App\Domains\Notifications\Jobs\StoreNotificationJob;
use App\Events\Website\BookingCompleted;
use Illuminate\Http\JsonResponse;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class VerifyPaymentFeature extends Feature
{

    public function handle(Request $request,PaymentService $payment)
    {
        $gateway = $request->gateway;
        $accessCode = $request->get('paymentId');
        $payerId = $request->get('PayerID');
        $transaction = $payment->getTransaction($gateway,$accessCode);
        $booking = $transaction->payable;
        if(!$payment->getDetail($transaction,$gateway,$payerId))
        {
            return new JsonResponse(['message'=>'error']);
//            return redirect()->to('/')->with(['message'=>'Something went wrong!','alert-type'=>'error']);
        }
//        $payment = new PaymentService();
        $booking  = $this->run(new UpdateBookingStatusJob($booking->id));
        event(new BookingCompleted($booking));
        $this->run(new StoreNotificationJob('Trip Booking','Trip booking request for '.$booking->trip_name.' '.$booking->start_date,'bookings/'.$booking->id));
        session()->flash('booking_success',true);
        return new JsonResponse(['message'=>'success']);
//        return redirect()->route('website.checkout.success')->with(['message'=>'Transaction Successfull.','alert-type'=>'success','booking_success'=>true]);
    }


}
