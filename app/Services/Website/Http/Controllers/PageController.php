<?php
namespace App\Services\Website\Http\Controllers;

use Lucid\Units\Controller;
use App\Services\Website\Features\ShowPagesListFeature;

class PageController extends Controller
{

    public function index()
    {
        return $this->serve(ShowPagesListFeature::class);
    }
}
