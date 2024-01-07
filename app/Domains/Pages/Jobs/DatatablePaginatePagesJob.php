<?php
namespace App\Domains\Pages\Jobs;

use App\Data\Repositories\Contracts\PageInterface;
use Lucid\Units\Job;

class DatatablePaginatePagesJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */

    private $search;
    private $limit;
    public function __construct($search = [],$limit = 20)
    {
        $this->search = $search;
        $this->limit = $limit;
    }

    /**
     * @param PageInterface $page
     * @return mixed
     */
    public function handle(PageInterface $page)
    {
        return $page->getDatatablePaginated($this->search,$this->limit);
    }
}
