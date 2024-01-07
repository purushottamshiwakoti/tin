<?php

namespace App\Services\Backend\Http\Controllers;

use App\Domains\Attachments\Jobs\SaveAttachmentJob;
use App\Domains\Attachments\Jobs\UploadMediaJob;
use App\Flight;
use App\Services\Backend\Features\Flights\UpdateFlightFeature;
use Lucid\Units\Controller;
use App\Http\Requests\FlightsRequest;
use App\Services\Backend\Features\Flights\StoreFlightFeature;
use Illuminate\Http\Request; // Import the correct Request class from Illuminate\Http namespace
use Lucid\Bus\ServesFeatures;

class FlightsController extends Controller
{

    public function index()
    {
        $flights = Flight::orderBy('id', 'DESC')->paginate(7);
        return view('backend::flights.index')->with('flights', $flights);
    }
    public function create()
    {
        return view('backend::flights.edit-add');
    }
    public function store(Request $request)
    {
        // dd($this);
        return $this->serve(StoreFlightFeature::class);
        $request->validated();
        // $input = $request->all();
        // dd($input);
        // $image = $request->file('banner_image');


        // dd($image);
        $flight = new Flight;
        $flight->overview_description = $input['overview_description'];
        $flight->from = $input['from'];
        $flight->to = $input['to'];
        $flight->book_flight_description     = $input['book_flight_description'];
        $flight->category     = $input['category'];
        $flight->slug     = $input['slug'];
        $flight->starting_price     = $input['starting_price'];
        $flight->sort_order = $input['sort_order'];
        if (!empty($input['publish'])) {
            $flight->publish = $input['publish'];
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
        };
        $flight->faqs = json_encode($faqs);
        $flight->save();
        $attachment = $this->run(new UploadMediaJob($request->file('banner_image')));
        $this->run(new SaveAttachmentJob($flight, $attachment));
        return redirect('admin/flights')->with('success', 'Successfully added flight details');
    }

    public function view($id)
    {
        $flight = Flight::where('id', $id)->first();
        return view('backend::flights.view')->with('flight', $flight);
    }

    public function destroy($id)
    {
        Flight::where('id', $id)->delete();
        return redirect('admin/flights')->with('success', 'Successfully deleted flight details');
    }
    public function edit($id)
    {
        $flight = Flight::where('id', $id)->first();
        return view('backend::flights.edit-add')->with('flight', $flight);
    }

    public function update(Request $request, $id)
    {
        // dd($id);
        return $this->serve(UpdateFlightFeature::class);
        // dd($request->all());
        $input = $request->all();
       
        $flight = Flight::find($id);

        $flight->overview_description = $input['overview_description'];
        $flight->from = $input['from'];
        $flight->to = $input['to'];
        $flight->book_flight_description = $input['book_flight_description'];
        if (count($input['category']) == 2) {
        } else {
            $flight->category = $input['category'];
        }
        $flight->slug = $input['slug'];
        $flight->starting_price = $input['starting_price'];


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

        $flight->save();

        return redirect('admin/flights')->with('success', 'Successfully updated flight details');
    }

    public function search(Request $request)
    {
        $query = $request->get('q');

        $flights = Flight::where('from', 'LIKE', '%' . $query . '%')
            ->orWhere('to', 'LIKE', '%' . $query . '%')
            ->get();

        return response()->json($flights);
    }
}
