<?php

namespace App\Services\Website\Features;

use Lucid\Units\Feature;
use Illuminate\Http\Request;
use App\Domains\Trips\Jobs\GetAllTripJob;
use App\Domains\Blog\Jobs\GetNepalPostJob;
use App\Domains\Blog\Jobs\GetPostsByScopeJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Pages\Jobs\GetScopedPagesJob;
use App\Domains\Trips\Jobs\GetScopedTripsJob;
use App\Domains\Hotels\Jobs\GetHotelPlacesJob;
use App\Domains\Trips\Jobs\GetTotalTripReview;
use App\Domains\Search\Jobs\GetFlightPlacesJob;
use App\Domains\Trips\Jobs\GetTripTravelStyleJob;
use App\Domains\Trips\Jobs\GetSingleTripBySlugJob;
use App\Domains\Lastminutedeal\Jobs\GetHotDealsJob;
use App\Domains\Sliders\Jobs\GetPublishedSliderJob;
use App\Domains\Trips\Jobs\GetDepartureArchivesJob;
use App\Domains\Backend\Jobs\GetScopedRepositoryJob;
use App\Domains\Activities\Jobs\GetNepalActivitiyJob;
use App\Domains\Trips\Jobs\GetScopedFixedDepartureJob;
use App\Domains\Activities\Jobs\GetScopedActivitiesJob;
use App\Domains\Testimonials\Jobs\GetAllTestimonialJob;
use App\Domains\TravelStyles\Jobs\GetAllTravelStyleJob;
use App\Domains\Trips\Jobs\GetDepartureAvailabilityJob;
use App\Domains\Destinations\Jobs\GetAllDestinationsJob;
use App\Domains\Trips\Jobs\GetTotalTripReviewRatingValue;
use App\Domains\FixedDepartures\Jobs\GetAvailableMonthsJob;
use App\Data\Repositories\Contracts\FixedDepartureInterface;
use App\Domains\Trips\Jobs\GetAustraliAndNewZealandTripsJob;
use App\Domains\Trips\Jobs\GetScopedUpcomingFixedDepartureJob;
use Carbon\Carbon;

class ShowHomePageFeature extends Feature
{
    public function handle(Request $request)
    {

        $data['sliders'] = $this->run(GetPublishedSliderJob::class);
        $data['activities'] = $this->run(new GetScopedActivitiesJob(['published', 'featured']));
        $data['nepalActivity'] = $this->run(new GetScopedActivitiesJob(['published','firstFeatured']));
        $data['nepalPosts'] = $this->run(new GetScopedPagesJob(['NepalHomeFeatured']));
        $data['firstActivity'] = $this->run(new GetScopedActivitiesJob(['published', 'firstFeatured']));
        $data['secondActivity'] = $this->run(new GetScopedActivitiesJob(['published', 'secondFeatured']));
        $data['thirdActivity'] = $this->run(new GetScopedActivitiesJob(['published', 'thirdFeatured']));
        $data['featuredTrips'] = $this->run(new GetAllTripJob());
        
        // $data['hotDeals'] = $this->run(new GetScopedFixedDepartureJob(['published','active','lastminute']));
        $data['hotDeals'] = $this->run(new GetScopedUpcomingFixedDepartureJob(Carbon::now()));
        $data['popular'] = $this->run(new GetScopedTripsJob(['published','SpecialDeals']));
        $data['homeFeatured'] = $this->run(new GetScopedTripsJob(['published','HomeFeatured']));
        $data['posts'] = $this->run(new GetPostsByScopeJob(['Published', 'HomeFeatured', 'Latest']));
        $data['pages'] = $this->run(new GetScopedPagesJob(['Published', 'HomeFeatured', 'Latest']));
        $data['topCountries'] = $this->run(new GetAllDestinationsJob(['published', 'Latest']));
        $data['testimonial'] = $this->run(new GetAllTestimonialJob(['published']));
        $data['flightPlaces'] = $this->run(GetFlightPlacesJob::class);
        $data['hotelPlaces'] = $this->run(GetHotelPlacesJob::class);
        $data['reviews'] = $this->run(GetTotalTripReview::class);
        $data['ratingValue'] = $this->run(GetTotalTripReviewRatingValue::class);
       
        $data['tripStyle'] = $this->run(new GetAllTravelStyleJob(['published']));

        $data['departure_archives'] = makeDepartureArchives($this->run(new GetDepartureArchivesJob()));

        return $this->run(new RespondWithViewJob('website::home', $data));
    }

    
}