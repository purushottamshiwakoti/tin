<?php
namespace App\Services\Website\Features;

use App\Domains\Website\Jobs\UpdateBookingJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class UpdateBookingFeature extends Feature
{
    public function handle(Request $request)
    {
        $id = Crypt::decrypt($request->booking);

        $passengers = $request->get('passengers');
        $data = [
            'user_id'=>optional(Auth::user())->id,
            'passenger_count'=>count($passengers),
            'passengers'=>$passengers
        ];
        $booking = $this->run(new UpdateBookingJob($id,$data));
        if(!$booking)
        {
            return redirect()->back()->with(['message'=>'Something went wrong!','alert_type'=>'error']);
        }

        return redirect()->route('website.booking.review',['booking'=>Crypt::encrypt($booking->id)]);
    }
}
