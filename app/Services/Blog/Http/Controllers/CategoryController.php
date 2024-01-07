<?php
namespace App\Services\Blog\Http\Controllers;

use App\Data\Repositories\Contracts\CategoryInterface;
use App\Services\Backend\Features\ShowSingleItemFeature;
use App\Services\Blog\Features\DeleteCategoryFeature;
use App\Services\Blog\Features\ListCategoriesFeature;
use App\Services\Blog\Features\ShowCategoryAddUpdateFeature;
use App\Services\Blog\Features\ShowCategoryIndexFeature;
use App\Services\Blog\Features\StoreCategoryFeature;
use App\Services\Blog\Features\UpdateCategoryFeature;
use Illuminate\Http\Request;
use Lucid\Units\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->serve(ShowCategoryIndexFeature::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->serve(ShowCategoryAddUpdateFeature::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->serve(StoreCategoryFeature::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryInterface $interface,$id)
    {
        return $this->serve(ShowSingleItemFeature::class,['interface'=>$interface,'id'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->serve(ShowCategoryAddUpdateFeature::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->serve(UpdateCategoryFeature::class);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->serve(DeleteCategoryFeature::class);
    }

    public function getData()
    {
        return $this->serve(ListCategoriesFeature::class);
    }
}
