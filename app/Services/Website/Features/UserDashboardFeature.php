<?php
namespace App\Services\Website\Features;

use App\Data\Models\Booking;
use App\Data\Models\Rating;
use App\Domains\Customers\Jobs\GetSingleCustomerJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class UserDashboardFeature extends Feature
{
    public function handle(Request $request)
    {
        // $data['customer'] = $this->run(new GetSingleCustomerJob($request->user));
        // dd($data['customer']);
        $booking=Booking::where('customer_id',auth('customer')->user()->id)->count();
        $rating=Rating::where('ratable_id',auth('customer')->user()->id)->where('ratable_type','trip')->count();
       
        // return $this->run(new RespondWithViewJob('website::user.dashboard'));
        return view('website::user.dashboard',compact('booking','rating'));
    }
}
