<?php
namespace App\Domains\CustomFields\Jobs;

use App\Data\Repositories\Contracts\CustomFieldInterface;
use Lucid\Units\Job;

class UpdateCustomFieldJob extends Job
{
    private $type;
    private $data;
    private $id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($type = 'default',$data = [],$id)
    {
        $this->type = $type;
        $this->data = $data;
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CustomFieldInterface $customField)
    {
        $this->data['type'] = $this->type;
        return $customField->update($this->id,$this->data);
    }
}
