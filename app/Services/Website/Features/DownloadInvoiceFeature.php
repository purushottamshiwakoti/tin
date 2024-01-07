<?php
namespace App\Services\Website\Features;

use App\Data\Models\Booking;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class DownloadInvoiceFeature extends Feature
{
    public function handle(Request $request)
    {
        $bookingId = $request->booking;
        $booking = Booking::where('id',$bookingId)->where('customer_id',auth()->user()->id)->first();
        if(!$booking)
        {
            abort(404);
        }

        $pdf = \PDF::loadView('website::resources.tax-invoice',['booking'=>$booking]);

        return $pdf->stream('taxinvoice'.$booking->trip_name.$booking->created_at->format('d-my'.'.pdf'));

    }
}
