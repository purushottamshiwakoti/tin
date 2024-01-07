<?php
namespace App\Domains\Customers\Jobs;

use App\Data\Repositories\Contracts\CustomerInterface;
use Lucid\Units\Job;

class GetSingleCustomerJob extends Job
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
    public function handle(CustomerInterface $customer)
    {
        return $customer->find($this->id);
    }
}
