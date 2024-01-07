<?php
namespace App\Services\Website\Http\Controllers;

use Lucid\Units\Controller;
use Illuminate\Http\Request;
use App\Services\Website\Features\ShowReviewFeature;
use App\Services\Website\Features\EditProfileFeature;
use App\Services\Website\Features\GetWishListFeature;
use App\Services\Website\Features\ShowBookingFeature;
use App\Services\Website\Features\ShowChangePassword;
use App\Services\Website\Features\ShowProfileFeature;
use App\Services\Website\Features\ShowSettingFeature;
use App\Services\Website\Features\ShowWishListFeature;
use App\Services\Website\Features\UserDashboardFeature;
use App\Services\Website\Features\ChangePasswordFeature;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
// dd('here');
        // return view('website::user.master');
        return $this->serve(UserDashboardFeature::class);
    }

    public function changepassword()
    {
        return $this->serve(ShowChangePassword::class);
    }

    public function booking()
    {
        return $this->serve(ShowBookingFeature::class);
    }
    
    public function profile()
    {
        return $this->serve(ShowProfileFeature::class);
    } 
    
    public function setting()
    {
        return $this->serve(ShowSettingFeature::class);
    }
    
    public function review()
    {
        return $this->serve(ShowReviewFeature::class);
    }

    public function wishlist()
    {
        return $this->serve(ShowWishListFeature::class);
    }

     public function editProfile(Request $request,$id)
    {
        return $this->serve(EditProfileFeature::class);
    }
    
    public function updatePassword(Request $request,$id)
    {
    //   dd($id);
        return $this->serve(ChangePasswordFeature::class);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}