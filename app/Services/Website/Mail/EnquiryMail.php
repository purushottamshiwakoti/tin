<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/27/18
 * Time: 2:22 PM
 */

namespace App\Services\Website\Mail;


use App\Data\Models\Enquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnquiryMail extends Mailable
{

    use Queueable,SerializesModels;

    public function __construct(Enquiry $enquiry)
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
        return $this->subject($this->enquiry->subject)
            ->view('website::mails.contact',['enquiry'=>$this->enquiry]);
    }

}