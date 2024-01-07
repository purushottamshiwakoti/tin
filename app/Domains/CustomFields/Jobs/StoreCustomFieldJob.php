<?php
namespace App\Domains\CustomFields\Jobs;

use App\Data\Repositories\Contracts\CustomFieldInterface;
use Lucid\Units\Job;

class StoreCustomFieldJob extends Job
{

    private $type;
    private $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($type = 'default',$data = [])
    {
        $this->type = $type;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CustomFieldInterface $customField)
    {
        $this->data['type'] = $this->type;
        return $customField->fillAndSave($this->data);
    }
}
