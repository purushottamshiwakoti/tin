<?php
namespace App\Domains\Dashboard\Jobs;

use App\Data\Repositories\Contracts\BookingInterface;
use App\Data\Repositories\Contracts\CustomerInterface;
use App\Data\Repositories\Contracts\FlightBookingInterface;
use App\Data\Repositories\Contracts\SubscriberInterface;
use Lucid\Units\Job;

class GetCountsForDashboardJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param CustomerInterface $customer
     * @param BookingInterface $booking
     * @param SubscriberInterface $subscriber
     * @param FlightBookingInterface $flightBooking
     * @return array
     */
    public function handle(CustomerInterface $customer,BookingInterface $booking,SubscriberInterface $subscriber,FlightBookingInterface $flightBooking)
    {
        return [
            'customers'=>$customer->all()->count(),
            'trips'=>$booking->all()->count(),
            'subscribers'=>$subscriber->all()->count(),
            'flights'=>$flightBooking->all()->count(),
        ];

    }
}
