<?php
namespace App\Services\Backend\Features;

use App\Domains\CustomFields\Jobs\DatatablePaginateCustomFieldJob;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ListFaqCategoriesFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = $this->run(new DatatablePaginateCustomFieldJob('faq-category'));
        return $this->run(new RespondWithJsonJob($data));
    }
}
