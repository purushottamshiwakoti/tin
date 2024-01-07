<?php
namespace App\Services\Backend\Features\Searches;

use App\Domains\Search\Jobs\StorePlaceJob;
use App\Domains\Search\Jobs\StoreSearchJob;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class StorePlaceFeature extends Feature
{
    public function handle(Request $request)
    {

       
        $search = $this->run(new StorePlaceJob($request->all()));
        if($search)
        {
            return redirect()->route('admin.searches.index');
        }
        $result = ['message'=>'Something went wrong','alert-type'=>'error'];
        return redirect()->back()->with($result);

    }
}