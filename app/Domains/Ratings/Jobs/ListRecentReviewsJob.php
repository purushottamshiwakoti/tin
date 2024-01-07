<?php
namespace App\Domains\Ratings\Jobs;

use App\Data\Repositories\Contracts\RatingInterface;
use Lucid\Units\Job;

class ListRecentReviewsJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(RatingInterface $rating)
    {
        return $rating->getByScope(['published','latest']);
    }
}
