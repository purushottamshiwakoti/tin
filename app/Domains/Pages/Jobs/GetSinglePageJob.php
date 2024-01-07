<?php
namespace App\Domains\Pages\Jobs;

use App\Data\Repositories\Contracts\PageInterface;
use Lucid\Units\Job;

class GetSinglePageJob extends Job
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
     * Execute the job.
     *
     * @return void
     */
    public function handle(PageInterface $page)
    {
        return $page->find($this->id);
    }
}
