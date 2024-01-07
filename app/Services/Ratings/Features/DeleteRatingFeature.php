<?php
namespace App\Services\Ratings\Features;

use App\Data\Repositories\Contracts\RatingInterface;
use App\Domains\Backend\Jobs\RemoveRepositoryJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class DeleteRatingFeature extends Feature
{
    public function handle(Request $request,RatingInterface $rating)
    {

        return $this->run(new RemoveRepositoryJob($rating,$request->rating));
    }
}
