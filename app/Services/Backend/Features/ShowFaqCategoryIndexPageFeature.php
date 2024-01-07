<?php
namespace App\Services\Backend\Features;

use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Pages\Jobs\GetAllPagesJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ShowFaqCategoryIndexPageFeature extends Feature
{
    public function handle(Request $request)
    {
        $data['pages'] = $this->run(GetAllPagesJob::class);
//        print_r($data['pages']);exit;
        return $this->run(new RespondWithViewJob('backend::faqs.categories.index',$data));
    }
}
