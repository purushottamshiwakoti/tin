<?php
namespace App\Services\Website\Features;

use App\Data\Models\Booking;
use App\Data\Models\Rating;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ShowReviewFeature extends Feature
{
    public function handle(Request $request)
    {
    //     $rating=Rating::where('ratable_id',auth('customer')->user()->id)->where('ratable_type','trip')->count();
    //    $ratingList=Rating::where('ratable_id',auth('customer')->user()->id)->where('ratable_type','trip')->paginate(10);
    $rating=auth('customer')->user()->reviews()->count();
    $ratingList=auth('customer')->user()->reviews()->paginate(10);
        return view('website::user.dashboard-reviews',compact('rating','ratingList'));
       
    }
}
