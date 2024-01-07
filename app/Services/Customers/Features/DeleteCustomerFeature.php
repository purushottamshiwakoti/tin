<?php
namespace App\Services\Customers\Features;

use App\Domains\Customers\Jobs\DeleteCustomerJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class DeleteCustomerFeature extends Feature
{
    public function handle(Request $request)
    {
        $result = $this->run(new DeleteCustomerJob($request->customer));
        return $result;
    }
}
