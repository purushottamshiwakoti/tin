<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/10/18
 * Time: 3:49 PM
 */

namespace App\Data\Repositories\Eloquent;


use App\Data\Models\Customer;
use App\Data\Repositories\Contracts\CustomerInterface;
use App\Data\Repositories\Repository;
use App\Services\Website\Notifications\CustomerAccountCreated;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class CustomerRepository extends Repository implements CustomerInterface
{
    use Notifiable;

    public function __construct(Customer $model)
    {
        parent::__construct($model);
    }

    public function createOrFindCustomer($data)
    {
        $customerData = $this->model->withTrashed()->where('email',$data['email'])->first();
        if($customerData)
        {
            if($customerData->deleted_at){
                $customerData->fill($data)->save();
                return $customerData;
            }
            return $customerData;
        }
        $customerData = $this->fillAndSave($data);
        return $customerData;
    }

    /**
     * @param $email
     * @return mixed
     */
    public function findByEmail($email)
    {
        return $this->model->where('email',$email)->first();
    }

    public function remove($id)
    {
        try{
            DB::beginTransaction();
            $customer = $this->find($id);
//            $customer->passengers()->delete();
//            $customer->bookings()->delete();
            $customer->delete();
            $result = '1';
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            $result = false;
        }
        return $result;
    }
}