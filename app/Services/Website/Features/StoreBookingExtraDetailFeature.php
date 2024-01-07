<?php
namespace App\Services\Website\Features;

use App\Domains\Website\Jobs\UpdateBookingJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class StoreBookingExtraDetailFeature extends Feature
{
    public function handle(Request $request)
    {
        $id = Crypt::decrypt($request->booking);
        $data = $request->except('_token');
        $data['user_id'] =optional(Auth::user())->id;
        $booking = $this->run(new UpdateBookingJob($id,$data));
        if(!$booking)
        {
            return redirect()->back()->with(['message'=>'Something went wrong!','alert_type'=>'error']);
        }
// dd($booking);
        return redirect()->route('website.booking.review',['booking'=>Crypt::encrypt($booking->id)]);

    }
}