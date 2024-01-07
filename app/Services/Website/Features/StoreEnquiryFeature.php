<?php
namespace App\Services\Website\Features;

use App\Data\Repositories\Contracts\EnquiryInterface;
use App\Data\Traits\RepoStoresTrait;
use App\Services\Website\Http\Requests\StoreEnquiryRequest;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class StoreEnquiryFeature extends Feature
{
    use RepoStoresTrait;
    public $redirectUrl='pages/contact';
    // public function handle(StoreEnquiryRequest $request,EnquiryInterface $enquiry)
    // {
    //     print_r($request->all());exit;
    //     return $this->store($request,$enquiry);
    // }

    public function handle(StoreEnquiryRequest $request,EnquiryInterface $enquiry)
    {
        return $this->store($request,$enquiry);
    }
}
