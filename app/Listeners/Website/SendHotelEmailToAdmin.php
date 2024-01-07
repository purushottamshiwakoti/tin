<?php

namespace App\Listeners\Website;

use App\Events\Website\FlightBookingCompleted;
use App\Events\Website\HotelBookingCompleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendHotelEmailToAdmin
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
    public function handle(HotelBookingCompleted $event)
    {
        $booking = $event->booking;
        Mail::send('website::mails.hotel-booked-admin',['booking'=>$booking],function($mailable) use($booking){
            $mailable->to(setting('mail'))
              
                ->subject('Hotel Booking Request');
        });
    }
}