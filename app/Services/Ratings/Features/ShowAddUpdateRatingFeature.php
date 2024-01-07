<?php
namespace App\Services\Ratings\Features;

use App\Data\Repositories\Contracts\RatingInterface;
use App\Domains\Backend\Jobs\GetSingleRepositoryJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Trips\Jobs\GetScopedTripsJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ShowAddUpdateRatingFeature extends Feature
{
    public function handle(Request $request,RatingInterface $rating)
    {
        $data = [];
        $data['rating'] = null;
        $data['trips'] = $this->run(new GetScopedTripsJob(['Published']));
        if($ratingId = $request->rating)
        {
            if(!$data['rating'] = $this->run(new GetSingleRepositoryJob($rating,$ratingId)))
            {
                throw new NotFoundHttpException();
            }
        }

        return $this->run(new RespondWithViewJob('ratings::edit-add',$data));

    }
}
