<?php
namespace App\Domains\CustomFields\Jobs;

use App\Data\Repositories\Contracts\CustomFieldInterface;
use Lucid\Units\Job;

class DatatablePaginateCustomFieldJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $type;
    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * @param CustomFieldInterface $customField
     * @return mixed
     */
    public function handle(CustomFieldInterface $customField)
    {
        return $customField->getDatatablePaginated(['type'=>$this->type]);
    }
}
