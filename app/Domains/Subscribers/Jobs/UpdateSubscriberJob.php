<?php
namespace App\Domains\Subscribers\Jobs;

use App\Data\Repositories\Contracts\SubscriberInterface;
use Lucid\Units\Job;

class UpdateSubscriberJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data;
    private $id;
    public function __construct($id,$data = [])
    {
        $this->id = $id;
        $this->data = $data;
    }

    /**
     * @param SubscriberInterface $subscriberInterface
     * @return bool
     */
    public function handle(SubscriberInterface $subscriberInterface)
    {
        $result = $subscriberInterface->update($this->id,$this->data);
        return $result;
    }
}
