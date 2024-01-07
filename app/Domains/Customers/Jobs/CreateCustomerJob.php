<?php
namespace App\Domains\Customers\Jobs;

use App\Data\Repositories\Contracts\CustomerInterface;
use App\Services\Website\Notifications\CustomerAccountCreated;
use Illuminate\Notifications\Notifiable;
use Lucid\Units\Job;


class CreateCustomerJob extends Job
{
    use Notifiable;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data;
    private $email;
    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * @param CustomerInterface $customer
     * @return mixed
     */
    public function handle(CustomerInterface $customer)
    {

        $this->data['password'] = random_password(8);
//        $this->data['password'] = 'password';
        $this->email = $this->data['email'];
        $modelData = $customer->findByEmail($this->email);
        $this->data['deleted_at']='';
        if(!$modelData)
        {
            $modelData = $customer->createOrFindCustomer($this->data);
            $this->notify(new CustomerAccountCreated($this->email,$modelData,$this->data['password']));
        }

        return $modelData;
    }
}
