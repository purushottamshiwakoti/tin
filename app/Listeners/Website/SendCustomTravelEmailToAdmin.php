<?php

namespace App\Listeners\Website;

use App\Events\Website\CustomTravelRequested;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendCustomTravelEmailToAdmin
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
     * @param  CustomTravelRequested  $event
     * @return void
     */
    public function handle(CustomTravelRequested $event)
    {
        $tripRequest = $event->tripRequest;
        Mail::send('website::mails.custom-trip-requested',['tripRequest'=>$tripRequest],function($mailable) use($tripRequest){
            $mailable->to([$tripRequest->email=>$tripRequest->first_name.' '.$tripRequest->last_name])
                ->cc(setting('mail'))
                ->subject('Private Trip Request '.setting('site_name').'-'.$tripRequest->id);
        });

        Mail::send('website::mails.custom-trip-requested-admin',['tripRequest'=>$tripRequest],function($mailable) use($tripRequest){
            $mailable->to(setting('mail'))
                ->subject('Private Trip Request '.setting('site_name').'-'.$tripRequest->id);
        });
    }
}
