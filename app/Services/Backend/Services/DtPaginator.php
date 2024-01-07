<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 6/21/18
 * Time: 3:18 PM
 */

namespace App\Services\Backend\Services;


use Illuminate\Pagination\LengthAwarePaginator;

class DtPaginator extends LengthAwarePaginator
{

    public function __construct(array $items, int $total, int $perPage, ?int $currentPage = null, array $options = [])
    {
        parent::__construct($items, $total, $perPage, $currentPage, $options);
    }

    public function toArray()
    {
        return [
            'draw' => $this->currentPage(),
            'recordsTotal'=>$this->total(),
            'recordsFiltered'=>$this->total(),
            'data'=>$this->items
        ];
    }

}