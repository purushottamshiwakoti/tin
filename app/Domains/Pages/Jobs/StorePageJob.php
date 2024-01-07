<?php
namespace App\Domains\Pages\Jobs;

use App\Data\Repositories\Contracts\PageInterface;
use Lucid\Units\Job;

class StorePageJob extends Job
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
     * Execute the job.
     *
     * @return void
     */
    public function handle(PageInterface $page)
    {
        $result = $page->fillAndSave($this->data);
        if(isset($this->data['related_pages']))
        {
            $page->syncPages($result,$this->data['related_pages']);
        }

        if(isset($this->data['featured_trips']))
        {
            $page->syncTrips($result,$this->data['featured_trips']);
        }

        return $result;
    }
}
