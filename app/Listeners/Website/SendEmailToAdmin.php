<?php

namespace App\Listeners\Website;

use App\Events\Website\BookingCompleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailToAdmin
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
     * @param  BookingCompleted  $event
     * @return void
     */
    public function handle(BookingCompleted $event)
    {
        $booking = $event->booking;
        // Mail::send('website::mails.flight-book-requested',['booking'=>$booking],function($mailable) use($booking){
        //     $mailable->to([$booking->passengers->email=>$booking->passengers->first_name])
        //         ->cc(setting('extras.admin_email'))
        //         ->cc('nabinkunwar4@gmail.com')
        //        ->cc('senbinam@gmail.com')
        //        ->cc('festival.bhetu@gmail.com')
        //        ->cc('utsav_bhetu@hotmail.com')
        //         ->subject('Booking Confirmation '.setting('site_name').'-'.$booking->id);
        // });

        Mail::send('website::mails.trip-book',['booking'=>$booking],function($mailable) use($booking){
            $customer = $booking->customer;
            $mailable->to([$customer->email=>$customer->name])
                ->from(setting('mail'))
                // ->bcc('nabinkunwar4@gmail.com')
                ->subject($booking->customer->name.' '.setting('site_name').' '.$booking->trip_code.' '.$booking->id);
            // ->attachData($pdfString,'invoice.pdf')
            // ->attachData($travellerInfoString,'Traveller Info.pdf')
//            ->attach(public_asset('website/resources/Privacy-Policy.pdf'),['as'=>'Privacy Policy.pdf'])
            // ->attach(public_asset('website/resources/Updated-Terms-and-Conditions.pdf'),['as'=>'Terms and Conditions.pdf']);
        });
    }
}
