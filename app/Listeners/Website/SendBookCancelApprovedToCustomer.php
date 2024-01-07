<?php

namespace App\Listeners\Website;

use App\Events\Website\BookCancelApproved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendBookCancelApprovedToCustomer
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
     * @param  BookCancelApproved  $event
     * @return void
     */
    public function handle(BookCancelApproved $event)
    {
        $booking = $event->booking;
        $customer = $booking->customer;
        Mail::send('website::mails.book-cancel-approved',['booking'=>$booking],function($mailable) use($booking,$customer){
//            $mailable->to($booking->customer->pluck('first_name','email')->toArray())
            $mailable->to([$customer->email=>$customer->first_name])
                ->cc(setting('contact_email'))
                ->subject('Cancel Booking Request Approved '.setting('site_name').'-'.$booking->id);
        });
    }
}
