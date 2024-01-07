<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],

        'App\Events\Website\BookingCompleted' => [
           'App\Listeners\Website\SendEmailToAdmin',
            'App\Listeners\Website\SendBookingRequestEmailToCustomer',
        ],
        'App\Events\Website\FlightBookingCompleted' => [
            'App\Listeners\Website\SendFlightEmail',
            'App\Listeners\Website\SendFlightEmailToAdmin',
        ],
         'App\Events\Website\HotelBookingCompleted' => [
            'App\Listeners\Website\SendHotelEmail',
            'App\Listeners\Website\SendHotelEmailToAdmin',
        ],
        'App\Events\Website\CustomTravelRequested' => [
            'App\Listeners\Website\SendCustomTravelEmailToAdmin',
        ],
        'App\Events\Website\BookCancelRequested' => [
            'App\Listeners\Website\SendBookCancelRequestToAdmin',
            'App\Listeners\Website\SendBookCancelRequestToCustomer',
        ],
        'App\Events\Website\BookCancelApproved' => [
            'App\Listeners\Website\SendBookCancelApprovedToCustomer',
        ],
        'App\Events\Website\PostRated' => [
            'App\Listeners\Website\SendPostRatedMailToAdmin',
        ],
        'App\Events\Website\RatingApproved' => [
            'App\Listeners\Website\SendRatingApprovedMailToCustomer',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}