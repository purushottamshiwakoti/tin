<?php

use App\Data\Models\User;
use App\Http\Controllers\SitemapController;
use Spatie\Sitemap\SitemapGenerator;
use Illuminate\Support\Facades\Artisan;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/seed', function () {
//     \Artisan::call('db:seed');
// });


Route::get("/sitemap", [SitemapController::class, 'index'])->name("sitemap");

// Route::get('/run-migration', function () {
//     Artisan::call("migrate --path='/database/migrations/2023_10_13_092558_add_seo_columns_to_flights.php'");
//     return "Migration completed!";
// });

// Clear full application all kind of cache:
Route::get('/clear-all-cache', function() {
    Artisan::call('optimize:clear');
    return 'Application all kind of cache has been cleared';
});
// Clear application cache:
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return 'Application cache has been cleared';
});
//Clear route cache:
Route::get('/route-cache', function() {
	Artisan::call('route:cache');
    return 'Routes cache has been cleared';
});
//Clear config cache:
Route::get('/config-cache', function() {
 	Artisan::call('config:cache');
 	return 'Config cache has been cleared';
});
// Clear view cache:
Route::get('/view-clear', function() {
    Artisan::call('view:clear');
    return 'View cache has been cleared';
});
