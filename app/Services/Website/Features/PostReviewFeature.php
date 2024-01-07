<?php
namespace App\Services\Website\Features;

use App\Data\Repositories\Contracts\RatingInterface;
use App\Domains\Backend\Jobs\StoreRepositoryJob;
use App\Services\Website\Http\Requests\PostReviewRequest;
use App\Events\Website\PostRated;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class PostReviewFeature extends Feature
{
    public function handle(Request $request,RatingInterface $rating)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'review' => 'required|string',
            'rating' => 'required_if:title,review|numeric|max:5'
        ]);
        $data = $request->except('_token');
        $data['rating_value'] = $request->rating?:0;
        $data['ratable_id'] = $request->trip;

        if($data['title']=='comment'){
            $data['ratable_type'] = 'post';

        }else{
            $data['ratable_type'] = 'trip';

        }
               

        // dd($data['rating_value']);
        $rating = $this->run(new StoreRepositoryJob($rating,$data));

        if(!$rating)
        {
            $response = ['message'=>'Something went wrong!!','alert-type'=>'error'];
        }else{
            // dd($rating);
            //send mail to admin
            event(new PostRated($rating));
            $response = ['message'=>'Successfully posted for moderation.','alert-type'=>'success'];
        }
        return redirect()->back()->with($response);
    }
}