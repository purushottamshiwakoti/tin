<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/10/18
 * Time: 3:48 PM
 */

namespace App\Data\Repositories\Contracts;


interface CustomerInterface
{

    public function createOrFindCustomer($data);

    public function findByEmail($email);
    public function update($id,$data);

}