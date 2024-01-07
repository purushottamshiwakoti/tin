<?php
namespace App\Domains\Subscribers\Jobs;

use App\Data\Repositories\Contracts\SubscriberInterface;
use Lucid\Units\Job;

class StoreSubscriberJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data;
    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * @param SubscriberInterface $subscriber
     * @return mixed
     */
    public function handle(SubscriberInterface $subscriber)
    {
        if(!$modelData = $subscriber->findOne('email',$this->data['email']))
        {
            $modelData = $subscriber->fillAndSave($this->data);
        }
        return $modelData;
    }
}
