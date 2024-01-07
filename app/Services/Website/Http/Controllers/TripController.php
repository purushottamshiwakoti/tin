<?php
namespace App\Services\Website\Http\Controllers;

use Lucid\Units\Controller;
use Illuminate\Http\Request;
use App\Domains\Trips\Jobs\GetFavTripByCustomerIdJob;
use App\Services\Website\Features\GetWishListFeature;
use App\Services\Website\Features\SearchTripsFeature;
use App\Services\Website\Features\ShowActivityFeature;
use App\Services\Website\Features\PostTripBookingFeature;
use App\Services\Website\Features\ShowTripNotesPageFeature;
use App\Services\Website\Features\ShowTripDetailPageFeature;
use App\Services\Website\Features\StoreFavouriteTripFeature;
use App\Services\Website\Features\ShowDestinationPageFeature;
use App\Services\Website\Features\ShowRegionDetailPageFeature;
use App\Services\Website\Features\GetFavTripByCustomerIdFeature;
use App\Services\Website\Features\ShowActivityDetailPageFeature;
use App\Services\Website\Features\ShowAlternateItineraryPageFeature;
use App\Services\Website\Features\ShowDestinationActivityDetailPageFeature;

class TripController extends Controller
{

    /**
     * @param Request $request
     * @return mixed
     */
    // public function getAllDestination(Request $request)
    // {
    //     return $this->serve(ShowDestinationPageFeature::class);
    // }


    
    public function getDestination(Request $request)
    {
        return $this->serve(ShowDestinationPageFeature::class);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getActivity(Request $request)
    {
        return $this->serve(ShowActivityDetailPageFeature::class);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getDestinationActivity(Request $request)
    {
        return $this->serve(ShowDestinationActivityDetailPageFeature::class);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getRegion(Request $request)
    {

        return $this->serve(ShowRegionDetailPageFeature::class);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getTrip(Request $request)
    {
        return $this->serve(ShowTripDetailPageFeature::class);
    }

    /**
     * Show Trip Notes
     *
     * @param Request $request
     * @return mixed
     */
    public function getNotes(Request $request)
    {
        return $this->serve(ShowTripNotesPageFeature::class);
    }

    /**
     * Show Alternate Itinerary Page
     *
     * @param Request $request
     * @return mixed
     */
    public function getAlternateItinerary(Request $request)
    {
        return $this->serve(ShowAlternateItineraryPageFeature::class);
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function makeFav(Request $request)
    {
        return $this->serve(StoreFavouriteTripFeature::class);
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function getWishlist(Request $request)
    {
        return $this->serve(GetWishListFeature::class);
    }

        /**
     * @param Request $request
     * @return mixed
     */
    public function getSpecificCustomerWishlist(Request $request)
    {
        return $this->serve(GetFavTripByCustomerIdFeature::class);
    }

    

    /**
     * @param Request $request
     * @return mixed
     */
    public function search(Request $request)
    {
        // dd($request->all());
        // dd('herer');
        return $this->serve(SearchTripsFeature::class);
    }

    public function getTripSearch(Request $request)
    {
        // dd('here');
        return $this->serve(SearchTripsFeature::class);
    }
    public function getAllActivities(){
       return $this->serve(ShowActivityFeature::class);
        
    }


   


}
