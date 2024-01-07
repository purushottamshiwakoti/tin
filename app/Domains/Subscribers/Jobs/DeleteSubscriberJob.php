<?php
namespace App\Domains\Subscribers\Jobs;

use App\Data\Repositories\Contracts\SubscriberInterface;
use Lucid\Units\Job;

class DeleteSubscriberJob extends Job
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
     * @return mixed
     */
    public function handle(SubscriberInterface $subscriberInterface)
    {
        return $subscriberInterface->remove($this->id);
    }
}
