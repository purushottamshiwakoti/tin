<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 3/28/19
 * Time: 11:40 AM
 */

namespace App\Data\Repositories\Eloquent;


use App\Data\Models\Transaction;
use App\Data\Repositories\Contracts\TransactionInterface;
use App\Data\Repositories\Repository;

class TransactionRepository extends Repository implements TransactionInterface
{


    public function __construct(Transaction $model)
    {
        parent::__construct($model);
    }


    public function getOneTransactionByCond($gateway,$transaction_id)
    {
        return $this->model->where('gateway',$gateway)->where('transaction_id',$transaction_id)->first();
    }
}