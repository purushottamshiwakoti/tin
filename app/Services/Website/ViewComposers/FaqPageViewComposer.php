<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 8/27/18
 * Time: 2:22 PM
 */

namespace App\Services\Website\ViewComposers;


use App\Domains\CustomFields\Jobs\GetCustomFieldsJob;
use App\Domains\Faqs\Jobs\GetFaqPageJob;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\View\View;
use Lucid\Foundation\JobDispatcherTrait;
use Lucid\Bus\UnitDispatcher;

class FaqPageViewComposer
{

    use UnitDispatcher,DispatchesJobs;

    public function compose(View $view)
    {
        // $view->with('faqCategories',$this->run(new GetCustomFieldsJob('faq-category')));
        $view->with('faqs',$this->run(new GetFaqPageJob('faq')));
    }
}