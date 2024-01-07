<?php
namespace App\Domains\Subscribers\Jobs;


use App\Data\Repositories\Contracts\SubscriberInterface;

use Lucid\Units\Job;

class GetSingleSubscriberJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @param SubscriberInterface $destination
     * @return mixed
     */
    public function handle(SubscriberInterface $subscriberInterface)
    {
        return $subscriberInterface->find($this->id);
    }
}
