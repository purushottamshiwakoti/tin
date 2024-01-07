<?php
namespace App\Services\Website\Features;

use App\Data\Repositories\Contracts\LandingInquiryInterface;
use App\Data\Traits\RepoStoresTrait;
use App\Services\Website\Http\Requests\StoreLandingInqueryRequest;
use Lucid\Units\Feature;

class StoreLandingInquiryFeature extends Feature
{
    use RepoStoresTrait;
    public $redirectUrl = 'everest-basecamp-in-may';
    public function handle(StoreLandingInqueryRequest $request, LandingInquiryInterface $landingInquiry)
    {
//        print_r($request->all());exit;
        return $this->store($request,$landingInquiry);
    }
}
