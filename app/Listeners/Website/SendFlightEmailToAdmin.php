<?php

namespace App\Listeners\Website;

use App\Events\Website\FlightBookingCompleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendFlightEmailToAdmin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  FlightBookingCompleted  $event
     * @return void
     */
    public function handle(FlightBookingCompleted $event)
    {
        $booking = $event->booking;
        Mail::send('website::mails.flight-booked-admin',['booking'=>$booking],function($mailable) use($booking){
            $mailable->to(setting('contact_email'))
              
                ->subject('Flight Booking Request');
        });
    }
}