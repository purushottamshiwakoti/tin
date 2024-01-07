<?php
namespace App\Domains\Notifications\Jobs;

use App\Data\Repositories\Contracts\NotificationInterface;
use Lucid\Units\Job;

class StoreNotificationJob extends Job
{

    /**
     * @var array
     */
    private $title;
    private $message;
    private $url;

    /**
     * StoreNotificationJob constructor.
     * @param array $data
     */
    public function __construct($title,$message = '',$url)
    {
        $this->title = $title;
        $this->message = $message;
        $this->url = $url;
    }

    /**
     * @param NotificationInterface $notification
     * @return mixed
     */
    public function handle(NotificationInterface $notification)
    {
        $data = [
            'title'=>$this->title,
            'message'=>$this->message,
            'url'=>$this->url
        ];
        return $notification->fillAndSave($data);
    }
}
