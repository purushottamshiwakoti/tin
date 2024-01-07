<?php

namespace App\Listeners\Website;

use App\Events\Website\BookingCompleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendBookingRequestEmailToCustomer
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
        $pdf = \PDF::loadView('website::resources.tax-invoice',['booking'=>$booking]);

        $pdfString = $pdf->output();

        $travellerInfo = \PDF::loadView('website::resources.traveller-info',['booking'=>$booking]);


        $travellerInfoString = $travellerInfo->output();



        Mail::send('website::mails.trip-book',['booking'=>$booking],function($mailable) use($booking ,$pdfString , $travellerInfoString ){
            $customer = $booking->customer;
            $mailable->to([$customer->email=>$customer->name])
                ->from(setting('mail'))
                // ->bcc('nabinkunwar4@gmail.com')
                ->subject($booking->customer->name.' '.setting('site_name').' '.$booking->trip_code.' '.$booking->id)
            ->attachData($pdfString,'invoice.pdf')
            ->attachData($travellerInfoString,'Traveller Info.pdf')
           ->attach (public_path('website/resources/Privacy-Policy.pdf'),['as'=>'Privacy Policy.pdf'])
            ->attach(public_path('website/resources/Updated-Terms-and-Conditions.pdf'),['as'=>'Terms and Conditions.pdf']);
        });
    }
}
