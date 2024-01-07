<?php
namespace App\Domains\Customers\Jobs;

use App\Data\Repositories\Contracts\CustomerInterface;
use Lucid\Units\Job;

class UpdateCustomerJob extends Job
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
    public function handle(CustomerInterface $customer)
    {
        return $customer->update($this->id,$this->data);
    }
}
