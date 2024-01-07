<?php
namespace App\Services\Blog\Http\Controllers;

use App\Data\Repositories\Contracts\PostInterface;
use App\Services\Backend\Features\ShowSingleItemFeature;
use App\Services\Blog\Features\DeletePostFeature;
use App\Services\Blog\Features\ListPostsFeature;
use App\Services\Blog\Features\ShowPostAddUpdateFeature;
use App\Services\Blog\Features\ShowPostIndexFeature;
use App\Services\Blog\Features\StorePostFeature;
use App\Services\Blog\Features\UpdatePostFeature;
use App\Services\Blog\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use Lucid\Units\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->serve(ShowPostIndexFeature::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->serve(ShowPostAddUpdateFeature::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->serve(StorePostFeature::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PostInterface $interface,$id)
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
        return $this->serve(ShowPostAddUpdateFeature::class);
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
        return $this->serve(UpdatePostFeature::class);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->serve(DeletePostFeature::class);
    }

    public function getData()
    {
        return $this->serve(ListPostsFeature::class);
    }
}
