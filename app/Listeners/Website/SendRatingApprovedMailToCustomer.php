<?php

namespace App\Listeners\Website;

use App\Events\Website\RatingApproved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendRatingApprovedMailToCustomer
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
     * @param  RatingApproved  $event
     * @return void
     */
    public function handle(RatingApproved $event)
    {
        $rating = $event->rating;
        Mail::send('website::mails.rating-approved',['rating'=>$rating],function($mailable) use($rating){
            $mailable->to($rating->email)
            ->cc(setting('contact_email'))
                ->subject('Rating Approved By Admin '.setting('site_name').'-'.$rating->id);
        });
    }
}
