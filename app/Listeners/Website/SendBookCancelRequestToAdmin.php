<?php

namespace App\Listeners\Website;

use App\Events\Website\BookCancelRequested;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendBookCancelRequestToAdmin
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
        Mail::send('website::mails.book-cancel-requested',['booking'=>$booking],function($mailable) use($booking){
//            $mailable->to($booking->customer->pluck('first_name','email')->toArray())
            $mailable->to(setting('contact_email'))
                ->cc('nbinkunwar@gmail.com')
                ->subject('Cancel Booking Requested '.setting('site_name').'-'.$booking->id);
        });
    }
}
