<?php
namespace App\Domains\Faqs\Jobs;

use App\Data\Repositories\Contracts\CustomFieldInterface;
use App\Data\Repositories\Contracts\FaqInterface;
use Lucid\Units\Job;

class GetFaqPageJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function handle(FaqInterface $faqInterface)
    {
        return $faqInterface->getData();
    }

}
