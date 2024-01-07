<?php
namespace App\Services\FixedDepartures\Features;

use App\Domains\FixedDepartures\Jobs\RemoveDealJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class RemoveDealFeature extends Feature
{
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function handle(Request $request)
    {
        $departure = $this->run(new RemoveDealJob($this->id));
        if(!$departure)
        {
            $result = ['message'=>'Something went wrong','alert-type'=>'error'];
        }else{
            $result = ['message'=>'Successful','alert-type'=>'success'];
        }

        return redirect()->back()->with($result);
    }
}
