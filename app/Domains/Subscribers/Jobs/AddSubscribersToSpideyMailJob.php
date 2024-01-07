<?php
namespace App\Domains\Subscribers\Jobs;

use App\Data\Services\DataExportInterface;
use Lucid\Units\Job;

class AddSubscribersToSpideyMailJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(DataExportInterface $dataExport)
    {
        $info = [
            'email'=>$this->data->email
        ];
        $subscriber = $dataExport->exportOne($info);
        return $subscriber;
    }
}
