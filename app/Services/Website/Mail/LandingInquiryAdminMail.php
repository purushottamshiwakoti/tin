<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 2/28/19
 * Time: 12:58 PM
 */

namespace App\Services\Website\Mail;


use App\Data\Models\LandingInquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LandingInquiryAdminMail extends Mailable
{
    use Queueable,SerializesModels;

    public function __construct(LandingInquiry $enquiry)
    {
        $this->enquiry = $enquiry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->bcc('nbinkunwar@gmail.com')
            ->subject("Everest promotional enquiry")
            ->view('website::mails.landing-inquiry-admin',['inquiry'=>$this->enquiry]);
    }

}