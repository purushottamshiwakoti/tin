<?php

namespace App\Listeners\Website;

use App\Events\Website\PostRated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendPostRatedMailToAdmin
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
     * @param  PostRated  $event
     * @return void
     */
    public function handle(PostRated $event)
    {
        $rating = $event->rating;
        Mail::send('website::mails.rating-requested',['rating'=>$rating],function($mailable) use($rating){
//            $mailable->to($booking->customer->pluck('first_name','email')->toArray())
            // $mailable->to(setting('extras.admin_email'))
            $mailable->to(setting('contact_email'))
            ->cc(setting('contact_email'))
                ->subject('Post Rating By User '.setting('site_name').'-'.$rating->id);
        });
    }
}