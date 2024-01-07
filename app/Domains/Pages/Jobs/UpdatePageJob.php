<?php
namespace App\Domains\Pages\Jobs;

use App\Data\Repositories\Contracts\PageInterface;
use Lucid\Units\Job;

class UpdatePageJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $id;
    private $data;
    public function __construct($id,$data = [])
    {
        $this->id = $id;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(PageInterface $page)
    {
        $result = $page->update($this->id,$this->data);
        $page->syncPages($result,isset($this->data['related_pages'])?$this->data['related_pages']:[]);
        $page->syncTrips($result,isset($this->data['featured_trips'])?$this->data['featured_trips']:[]);
        return $result;
    }
}
