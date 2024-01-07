<?php
namespace App\Domains\Backend\Jobs;

use Lucid\Units\Job;

class OrderItemsJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */

    private $data;
    private $interface;
    public function __construct($interface,$data = [])
    {
        $this->interface = $interface;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->data as $index => $curItem) {
            $item = $this->interface::find($curItem->id);
            $item->item_order = $index + 1;
            $item->save();
        }
    }
}
