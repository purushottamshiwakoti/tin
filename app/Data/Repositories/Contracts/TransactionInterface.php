<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 3/28/19
 * Time: 11:40 AM
 */

namespace App\Data\Repositories\Contracts;


interface TransactionInterface
{


    public function getOneTransactionByCond($gateway,$transaction_id);
}