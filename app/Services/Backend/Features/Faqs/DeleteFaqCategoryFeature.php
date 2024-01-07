<?php
namespace App\Services\Backend\Features\Faqs;


use Lucid\Units\Feature;
use Illuminate\Http\Request;
use App\Domains\Faqs\Jobs\DeleteFaqCategoryJob;

class DeleteFaqCategoryFeature extends Feature
{
    public function handle(Request $request)
    {
        $result = $this->run(new DeleteFaqCategoryJob($request->faq_category));
        return $result;
    }
}
