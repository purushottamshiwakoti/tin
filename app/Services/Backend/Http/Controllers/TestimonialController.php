<?php
namespace App\Services\Backend\Http\Controllers;

use App\Data\Repositories\Contracts\TestimonialInterface;
use App\Domains\Testimonials\Jobs\StoreTestimonialJob;
use App\Domains\Testimonials\Jobs\UpdateTestimonialJob;
use App\Services\Backend\Features\Testimonials\DeleteTestimonialFeature;
use App\Services\Backend\Features\Testimonials\ListTestimonialFeature;
use App\Services\Backend\Features\Testimonials\ShowTestimonialEditAddFeature;
use App\Services\Backend\Features\Testimonials\ShowTestimonialIndexFeature;
use App\Services\Backend\Features\Testimonials\StoreTestimonialFeature;
use App\Services\Backend\Features\Testimonials\UpdateTestimonialFeature;
use Illuminate\Http\Request;
use Lucid\Units\Controller;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return $this->serve(ShowTestimonialIndexFeature::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->serve(ShowTestimonialEditAddFeature::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        return $this->serve(StoreTestimonialFeature::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TestimonialInterface $interface,$id)
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
        return $this->serve(ShowTestimonialEditAddFeature::class);

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
        return $this->serve(UpdateTestimonialFeature::class);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->serve(DeleteTestimonialFeature::class);
    }



    /**
     * @param Request $request
     * @return mixed
     */
    public function getData()
    {
        return $this->serve(ListTestimonialFeature::class);
    }
}
