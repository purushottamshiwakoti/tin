<?php

namespace App\Listeners\Website;

use App\Events\Website\BookCancelRequested;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendBookCancelRequestToCustomer
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
     * @param  BookCancelRequested  $event
     * @return void
     */
    public function handle(BookCancelRequested $event)
    {
        $booking = $event->booking;
        Mail::send('website::mails.book-cancel-acknowledge-customer',['booking'=>$booking],function($mailable) use($booking){
            $customer = $booking->customer;
            $mailable->to([$customer->email=>$customer->name])
//            $mailable->to(setting('extras.admin_email'))
                ->cc(setting('contact_email'))
                ->subject('Cancel Booking Request Acknowledged '.setting('site_name').'-'.$booking->id);
        });
    }
}
