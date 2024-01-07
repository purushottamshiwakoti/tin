<?php
namespace App\Domains\Trips\Jobs;

use App\Data\Repositories\Contracts\TripInterface;
use Lucid\Units\Job;

class ListTripsByBookingCountJob extends Job
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
     * @param TripInterface $trips
     * @return mixed
     */
    public function handle(TripInterface $trips)
    {
        $ts= $trips->getByScope(['published','byBooking']);

        $totalBook = $ts->sum('bookings_count');
        return $ts->map(function ($item) use($totalBook){
            $item->bookPer = ($item->bookings_count/$totalBook)*100;
            return $item;
        });
    }
}
