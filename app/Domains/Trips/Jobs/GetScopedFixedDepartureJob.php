<?php
namespace App\Domains\Trips\Jobs;

use App\Data\Repositories\Contracts\FixedDepartureInterface;
use Lucid\Units\Job;

class GetScopedFixedDepartureJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $scopes;
    public function __construct($scopes = [])
    {
        $this->scopes = $scopes;
    }

    /**
     * @param FixedDepartureInterface $departure
     * @return mixed
     */
    public function handle(FixedDepartureInterface $departure)
    {
        // dd($departure->getByScope($this->scopes));
        return $departure->getByScope($this->scopes);
    }
}
