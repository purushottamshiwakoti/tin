<?php
namespace App\Services\Website\Http\Controllers;

use App\Services\Website\Features\SearchBlogFeature;
use App\Services\Website\Features\ShowArchivePageFeature;
use App\Services\Website\Features\ShowBlogTagPageFeature;
use App\Services\Website\Features\ShowCategoryPostsPageFeature;
use App\Services\Website\Features\ShowPostDetailPageFeature;
use App\Services\Website\Features\ShowPostsPageFeature;
use Illuminate\Http\Request;
use Lucid\Units\Controller;

class BlogController extends Controller
{

    public function index()
    {
    //    dd(ShowPostsPageFeature::class);
        return $this->serve(ShowPostsPageFeature::class);
    }

    public function getPost(Request $request)
    {
        
        return $this->serve(ShowPostDetailPageFeature::class);

    }

    public function getCategory(Request $request)
    {
        return $this->serve(ShowCategoryPostsPageFeature::class);

    }

    public function getArchive(Request $request)
    {

        return $this->serve(ShowArchivePageFeature::class);
    }

    public function getByTag(Request $request)
    {

        return $this->serve(ShowBlogTagPageFeature::class);
    }

    public function blogSearch(Request $request)
    {

 
        
       return $this->serve(SearchBlogFeature::class);

    }
}
