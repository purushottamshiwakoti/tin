<?php
namespace App\Services\Backend\Features;

use App\Data\Models\Passenger;
use App\Data\Repositories\Contracts\BookingInterface;
use App\Events\Website\BookCancelApproved;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ApproveBookingCancellationFeature extends Feature
{
    private $id;
    private $passengers;
    public function __construct($id,$passengers)
    {
        $this->id = $id;
        $this->passengers = $passengers;
    }

    public function handle(Request $request,BookingInterface $booking)
    {
        $passengers = json_decode($this->passengers,1);
        if(!is_array($passengers))
        {
            abort(400);
        }
        $booking= $booking->find($this->id);
        $cancelled = Passenger::whereIn('id',$passengers)->where('booking_id',$this->id)->update(['cancelled_at'=>now()]);
        if($cancelled)
        {
            event(new BookCancelApproved($booking));
            return redirect()->back()->with(['messages'=>'Successful.','alert-type'=>'success']);

        }
        return redirect()->back()->with(['messages'=>'Something went wrong.','alert-type'=>'error']);
    }
}
