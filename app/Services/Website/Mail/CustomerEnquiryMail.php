<?php


namespace App\Services\Website\Mail;


use App\Data\Models\Enquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerEnquiryMail extends Mailable
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
            ->view('website::mails.contact-us-customer',['enquiry'=>$this->enquiry]);
    }

}