<?php
namespace App\Domains\Menus\Jobs;

use App\Data\Repositories\Contracts\MenuInterface;
use Lucid\Units\Job;

class DeleteMenuJob extends Job
{
    private $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(MenuInterface $menuInterface)
    {
        return $menuInterface->remove($this->id);
        
    }
}
