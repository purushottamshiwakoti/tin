<?php
namespace App\Services\Bookings\Features;

use App\Data\Repositories\Contracts\BookingInterface;
use App\Domains\Backend\Jobs\DatatablePaginateJob;
use App\Domains\Backend\Jobs\MakeDatatableSearchFieldsJob;
use App\Domains\Bookings\Jobs\ExportBookingJob;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ExportBookingsFeature extends Feature
{
    protected $interface;

    public function handle(Request $request,BookingInterface $booking)
    {
        $searchData = $this->run(new MakeDatatableSearchFieldsJob($request->all()));
        $data = $this->run(new DatatablePaginateJob($booking,$searchData,$request->get('length')));
        return $this->run(new ExportBookingJob($data['data']));

    }
}
