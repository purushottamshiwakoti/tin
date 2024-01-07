<?php
namespace App\Domains\CustomFields\Jobs;

use App\Data\Repositories\Contracts\CustomFieldInterface;
use Lucid\Units\Job;

class GetCustomFieldsJob extends Job
{
    private $type;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($type='default')
    {
        $this->type = $type;
    }

    /**
     * @param CustomFieldInterface $customField
     * @return mixed
     */
    public function handle(CustomFieldInterface $customField)
    {
        return $customField->getByAttributes(['type'=>$this->type]);
    }
}
