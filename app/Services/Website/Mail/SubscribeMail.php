<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/27/18
 * Time: 2:22 PM
 */

namespace App\Services\Website\Mail;


use App\Data\Models\Enquiry;
use App\Data\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscribeMail extends Mailable
{

    use Queueable,SerializesModels;

    public function __construct(Subscriber $subscriber)
    {
        $this->subscriber = $subscriber;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Travel Adventure Nepal- Subscription Successful')
            ->view('website::mails.subscribed',['subscriber'=>$this->subscriber]);
    }

}