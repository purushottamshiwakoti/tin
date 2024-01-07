<?php
namespace App\Services\Website\Http\Controllers;

use App\Services\Website\Features\ShowRegionsFeature;
use Illuminate\Http\Request;
use Lucid\Units\Controller;

class RegionController extends Controller
{
    public function index(){
    //    return view('website::trips.region-listing') ;
       return $this->serve(ShowRegionsFeature::class);
    }
    
}
