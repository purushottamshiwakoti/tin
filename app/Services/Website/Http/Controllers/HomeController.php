<?php
namespace App\Services\Website\Http\Controllers;

use App\Data\Models\Rating;
use App\Data\Models\Region;
use Lucid\Units\Controller;
use Illuminate\Http\Request;
use App\Data\Models\Activity;
use App\Data\Models\Destination;
use App\Domains\Trips\Jobs\GetAjaxTripJob;
use App\Domains\Trips\Jobs\SearchTripsJob;
use App\Services\Website\Features\PostReviewFeature;
use App\Services\Website\Features\SearchBlogFeature;
use App\Domains\Trips\Jobs\GetScopedFixedDepartureJob;
use App\Services\Website\Features\ShowHomePageFeature;
use App\Services\Website\Features\StoreEnquiryFeature;
use App\Services\Website\Features\StoreInquiryFeature;
use App\Domains\Trips\Jobs\GetDepartureUpcomingTripJob;
use App\Services\Website\Features\ShowPageDetailFeature;
use App\Services\Website\Features\ShowDestinationFeature;
use App\Services\Website\Features\StoreLandingInquiryFeature;
use App\Services\Website\Features\StoreCustomTravelRequestFeature;
use App\Services\Website\Features\ShowDestinationDetailPageFeature;

class HomeController extends Controller
{

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        return $this->serve(ShowHomePageFeature::class);
    }

    /**
     * @param Request $request
     * @param $page
     * @return mixed
     */
    public function getPage(Request $request,$slug = null)
    {
        // echo $slug;exit;    
        if(!$slug)
        {
            $request->route()->setParameter('slug', $request->segment(1));
        }
        return $this->serve(ShowPageDetailFeature::class);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function postContact(Request $request)
    {
        // dd($request->all());

        return $this->serve(StoreEnquiryFeature::class);

    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function postLandingInquiry(Request $request)
    {
        return $this->serve(StoreLandingInquiryFeature::class);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function postReview(Request $request)
    {
        // dd($request->all());
        return $this->serve(PostReviewFeature::class);
    }

    public function updateRating(Request $request)
    {
        Rating::where('id',$request->rating_id)->update($request->except('_token','rating_id'));
        return redirect()->back()->with(['message'=>'Rating updated successfully','alert-type'=>'success']);
        
    }

    public function deleteRating(Request $request)
    {

        Rating::where('id',$request->rating_id)->delete();
        return redirect()->back()->with(['message'=>'Rating deleted successfully','alert-type'=>'success']);
    }

    /**
     * @param Request $request
     * @return mixed
     */

    public function postCustomTravelRequest(Request $request)
    {
        // dd('here');
        return $this->serve(StoreCustomTravelRequestFeature::class);
    }

    public function allUpcomingTrip(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        // dd($data);
        
        $result = $this->serve(GetDepartureUpcomingTripJob::class,['data'=>$data]);

        return view('website::partials.upcomingtrip-results')->with('hotDeals', $result);
    }

    public function allPlanTrips(Request $request)
    {
        $data = $request->all();

        $trips = $this->serve(GetAjaxTripJob::class,['data'=>$data]);

        return view('website::partials.plan-alltrip')->with('trips', $trips);
    }

    public function blogSearch(Request $request)
    {
        // dd('test');
        return $this->serve(SearchBlogFeature::class);

    }

    public function listWishilst()
    {
        return view('website::guests.wishlist');
    }
    public function destinations()
    {

        // return view('website::destinations.destination') ;
        return $this->serve(ShowDestinationFeature::class);
    }
    public function getDestination(Request $request,$country){
        // dd($slug);
        $destination=Destination::where('slug',$country)->first();
        $destinations=Destination::all();
        $regions=Region::where('destination_id',$destination->id)->pluck('activity_id');
        $activities=Activity::whereIn('id',$regions)->get();

        // dd($destination->id);
        // if(!$destination){
        //     dd('No destination found');
        // }
        $faqs=$destination->faqs()->get();
    //    dd($activities);
        return view('website::destinations.destination-detail',['destination' => $destination,'faqs' => $faqs,'activities'=>$activities,'destinations'=>$destinations]) ;

        return $this->serve(ShowDestinationDetailPageFeature::class);
    }

    public function getRegions($country,$activity){
        $destination=Destination::where('slug',$country)->first();
       
        $singleActivity=Activity::where('slug',$activity)->first();
       $regions=Region::where('activity_id',$singleActivity->id)->get();
    //    dd($regions);
       $faqs=$destination->faqs()->get();

       return view('website::destinations.destination-region',['destination' => $destination,'faqs' => $faqs,'regions'=>$regions,'activity'=>$activity]) ;
      

    }

    public function getRegionDetail($country,$activity,$slug){
        $destination=Destination::where('slug',$country)->first();
        $faqs=$destination->faqs()->get();
        $region=Region::where('slug',$slug)->first();
        // dd($region->id);
       return view('website::destinations.destination-region-detail',['region'=>$region,'faqs'=>$faqs,'country'=>$country,'activity'=>$activity]) ;

        

    }
    
}