<?php
namespace App\Domains\Faqs\Jobs;


use Lucid\Units\Job;
use App\Data\Repositories\Contracts\CustomFieldInterface;

class DeleteFaqCategoryJob extends Job
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
    public function handle(CustomFieldInterface $customFieldInterface)
    {
        return $customFieldInterface->remove($this->id);
    }
}
