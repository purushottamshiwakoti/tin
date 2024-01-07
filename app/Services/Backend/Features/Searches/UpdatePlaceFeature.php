<?php
namespace App\Services\Backend\Features\Searches;

use App\Domains\Search\Jobs\UpdatePlaceJob;
use App\Domains\Search\Jobs\UpdateSearchJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class UpdatePlaceFeature extends Feature
{
    public function handle(Request $request)
    {

        $searchId = $request->search;
      
        $search = $this->run(new UpdatePlaceJob($searchId,$request->except('_token')));
        
        if(!$search)
        {
            $result = ['message'=>'Something went wrong','alert-type'=>'error'];
            return redirect()->back()->with($result);
        }
        return redirect()->route('admin.searches.index');

    }
}