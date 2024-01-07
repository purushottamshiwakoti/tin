<?php

namespace App\Services\Backend\Features\Flights;

use App\Domains\Attachments\Jobs\SaveAttachmentJob;
use App\Domains\Attachments\Jobs\SaveCoverImageJob;
use App\Domains\Attachments\Jobs\UploadMediaJob;
use App\Flight;
use App\FlightDeparture;
use App\Http\Requests\FlightsRequest;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class UpdateFlightFeature extends Feature
{
    public function handle(Request $request)
    {
        // dd($request->all());
        $id = $request->input('id');
        $flight = Flight::find($id);
        // dd($flight);

        if (!$flight) {
            // Flight with the given ID not found, handle error here.
            return redirect('admin/flights')->with('error', 'Flight not found');
        }

        $input = $request->all();
        // dd($input);
        $flight->overview_description = $input['overview_description'];
        $flight->from = $input['from'];
        $flight->to = $input['to'];
        $flight->flight_deals_description = $input['flight_deals_description'];
        $flight->flight_deals_title = $input['flight_deals_title'];
        $flight->book_flight_description = $input['book_flight_description'];

        $flight->seo_title     = $input['seo_title'];
        $flight->seo_keywords     = $input['seo_keywords'];
        $flight->seo_description     = $input['seo_description'];
        
        // $flight->category = $input['category'];
        if (isset($input['category']) && is_array($input['category'])) {
        foreach ($input['category'] as $c) {
            // dd(($c));
            if (count($input['category']) == 1) {
                $flight->category = $c;
            } else {
                $flight->category = "both";
            }
        }
    }
        $flight->slug = $input['slug'];
        $flight->starting_price = $input['starting_price'];
        $flight->sort_order = $input['sort_order'];


        if (!empty($input['publish'])) {
            $flight->publish = $input['publish'];
        } else {
            $flight->publish = 0;
        }

        if (!empty($input['flight_deals'])) {
            $flightDeals = [];
            foreach ($input['flight_deals'] as $d) {
                $flightDeal = [
                    'airline_name' => $d['airline_name'],
                    'flight_date' => $d['flight_date'],
                    'duration' => $d['duration'],
                    'transits' => $d['transits'],
                    'cost' => $d['cost']
                ];
                $flightDeals[] = $flightDeal;
            }
        } else {
            $flightDeals = [];
        }

        $flight->flight_deals = json_encode($flightDeals);

        if (!empty($input['faq'])) {
            $faqs = [];
            foreach ($input['faq'] as $f) {
                $faq = [
                    'question' => $f['question'],
                    'answer' => $f['answer'],
                ];
                $faqs[] = $faq;
            }
        } else {
            $faqs = [];
        }

        $flight->faqs = json_encode($faqs);
        // dump($flight);
        $flight->update();
        // dd($flight);
        FlightDeparture::where('flight_id', $flight->id)->delete();
        if (!empty($input['flight_deals'])) {
            // $flightDeals = [];
            foreach ($input['flight_deals'] as $d) {
                $flightDeparture = new FlightDeparture;
                $flightDeparture->flight_id = $flight->id;
                $flightDeparture->airline_name = $d['airline_name'];
                $flightDeparture->duration = $d['duration'];
                $flightDeparture->transits = $d['transits'];
                $flightDeparture->price = $d['cost'];
                $flightDeparture->start_date = $d['flight_date'];
                $flightDeparture->save();
            }
        }
        if ($request->hasFile('banner_image')) {
            $attachment = $this->run(new UploadMediaJob($request->file('banner_image')));
            $this->run(new SaveCoverImageJob($flight, $attachment));
        }

        return redirect('admin/flights')->with('success', 'Successfully updated flight details');
    }
}
