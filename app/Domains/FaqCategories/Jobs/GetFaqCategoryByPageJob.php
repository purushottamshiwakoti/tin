<?php
namespace App\Domains\FaqCategories\Jobs;

use App\Data\Repositories\Contracts\CustomFieldInterface;
use Lucid\Units\Job;

class GetFaqCategoryByPageJob extends Job
{
    private $page_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($page_id)
    {
        $this->page_id = $page_id;
    }

    /**
     * @param CustomFieldInterface $customField
     * @return mixed
     */
    public function handle(CustomFieldInterface $customField)
    {
        return $customField->findOneByExtra(json_encode(["page_id"=>"$this->page_id"]));
    }
}
