<?php
namespace App\Services\Website\Http\Controllers;

use App\Services\Website\Features\StoreSubscibersFeature;
use Illuminate\Http\Request;
use Lucid\Units\Controller;

class SubscriptionController extends Controller
{

    public function store(Request $request)
    {
        // dd('here');
        return $this->serve(StoreSubscibersFeature::class);
    }
}
