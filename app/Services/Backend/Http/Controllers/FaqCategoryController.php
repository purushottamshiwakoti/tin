<?php
namespace App\Services\Backend\Http\Controllers;

use Lucid\Units\Controller;
use Illuminate\Http\Request;
use App\Services\Backend\Features\StoreFaqCategoryFeature;
use App\Services\Backend\Features\ListFaqCategoriesFeature;
use App\Services\Backend\Features\Faqs\DeleteFaqCategoryFeature;
use App\Services\Backend\Features\ShowFaqCategoryIndexPageFeature;

class FaqCategoryController extends Controller
{

    public function index()
    {
        return $this->serve(ShowFaqCategoryIndexPageFeature::class);
    }

    public function store(Request $request)
    {
        return $this->serve(StoreFaqCategoryFeature::class);
    }

    public function show($id)
    {

    }

    public function update(Request $request,$id)
    {
        return $this->serve(StoreFaqCategoryFeature::class);
    }

    public function destroy($id)
    {
        return $this->serve(DeleteFaqCategoryFeature::class);

    }

    public function getData(Request $request)
    {
        return $this->serve(ListFaqCategoriesFeature::class);
    }
}
