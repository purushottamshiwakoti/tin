<?php
namespace App\Services\Website\Http\Controllers;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\ServerFactory;
use Lucid\Units\Controller;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

class ImageController extends Controller
{

    public function show(Filesystem $filesystem,Request $request,$path)
    {
        $referer = $request->header('referer');
//        if(!str_contains($referer,[url('/'),'facebook.com']))
//        {
//            abort(404);
//        }
    //   dd($filesystem);   
        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory(app('request')),
            'source' => 'uploads/original',
            // 'driver' => 'imagick',

            // 'cache' => 'uploads/original',
            'cache' => $filesystem->getDriver(),
            'cache_path_prefix' => '.cache',
            'base_url' => 'img',
        ]);
        try{
//            ImageOptimizer::optimize(storage_path('../public/uploads/original/'.$path));
        }catch (\Exception $e)
        {
//            print_r($e->getMessage());
            //handle exception
        }
// dd($path);
        return $server->outputImage($path, request()->all());
    }
}
