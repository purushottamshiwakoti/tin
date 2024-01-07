<?php
namespace App\Domains\Bookings\Jobs;

use App\Data\Repositories\Contracts\BookingInterface;
use App\Data\Services\Payments\PayableInterface;
use Lucid\Units\Job;

class UpdateBookingStatusJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @param PayableInterface $booking
     * @return mixed
     */
    public function handle(BookingInterface $booking)
    {
        $data = ['status'=>'complete'];

        return $booking->update($this->id,$data);
    }
}
