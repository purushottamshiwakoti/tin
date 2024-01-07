<?php

namespace App\Services\Website\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class CustomerAccountCreated extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $password;

    public $email;
    public $customer;
    public function __construct($email,$customer,$password)
    {
        $this->password = $password;
        $this->email = $email;
        $this->customer = $customer;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // dd('herer');
        return (new MailMessage)->view('website::mails.auto-register',['email'=>$this->email,'customer'=>$this->customer,'password'=>$this->password])
            // ->cc(setting('extras.admin_email'))
            ->subject("Account Creation Notification");

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    /**
     * @param $callback
     */
    public static function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }
}
