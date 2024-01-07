<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/13/18
 * Time: 11:11 AM
 */

namespace App\Data\Repositories\Contracts;


interface BookingInterface
{

    public function storeBooking($data);

    public function updateBooking($id,$data);

    public function approveCancellation($id);
}