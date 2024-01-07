<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/26/18
 * Time: 3:29 PM
 */

namespace App\Services\Website\ViewComposers;

use Illuminate\View\View;
use Lucid\Bus\UnitDispatcher;
use Lucid\Foundation\JobDispatcherTrait;
use App\Domains\Blog\Jobs\GetAllPostsJob;
use App\Domains\Blog\Jobs\GetPostTagsJob;
use App\Domains\Blog\Jobs\GetNepalPostJob;
use App\Domains\Blog\Jobs\GetArchiveListJob;
use App\Domains\Trips\Jobs\GetScopedTripsJob;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Domains\Categories\Jobs\GetAllCategoriesJob;

class BlogSidebarViewComposer
{

    use DispatchesJobs,UnitDispatcher;

    public function compose(View $view)
    {
        $view->with('posts',$this->run(new GetAllPostsJob()));
        $view->with('categories',$this->run(new GetAllCategoriesJob()));
        $view->with('archives',$this->run(new GetArchiveListJob()));
        $view->with('tags',$this->run(new GetPostTagsJob()));
        $view->with('nepalPostsBlog',$this->run(new GetNepalPostJob('nepal')));
        // $view->with('popularTrips',$this->run(new GetScopedTripsJob(['published','popular'])));
    }
}