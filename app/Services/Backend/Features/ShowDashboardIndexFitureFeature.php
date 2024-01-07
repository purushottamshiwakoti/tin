<?php
namespace App\Services\Backend\Features;

use App\Domains\Dashboard\Jobs\GetCountsForDashboardJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Ratings\Jobs\ListRecentReviewsJob;
use App\Domains\Trips\Jobs\GetScopedFixedDepartureJob;
use App\Domains\Trips\Jobs\ListTripsByBookingCountJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ShowDashboardIndexFitureFeature extends Feature
{
    public function handle(Request $request)
    {

        $data['counts'] = json_decode(json_encode($this->run(GetCountsForDashboardJob::class)));
        $data['popularTrips']=$this->run(ListTripsByBookingCountJob::class);
        $data['hotDeals'] = $this->run(new GetScopedFixedDepartureJob(['published','active']));
        $data['recentReviews'] = $this->run(new ListRecentReviewsJob());
        return $this->run(new RespondWithViewJob('backend::dashboard.index',$data));
    }
}
