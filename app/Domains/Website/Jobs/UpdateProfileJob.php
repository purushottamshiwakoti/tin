<?php
namespace App\Domains\Website\Jobs;

use App\Data\Repositories\Contracts\BookingInterface;
use App\Data\Repositories\Contracts\CustomerInterface;
use Lucid\Units\Job;

class UpdateProfileJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $id;
    private $input;
    public function __construct($id,$input = [])
    {
        $this->id = $id;
        $this->input = $input;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CustomerInterface $customerInterface)
    {
        // dd($this->id,$this->input);
        return $customerInterface->update($this->id,$this->input);
    }
}
