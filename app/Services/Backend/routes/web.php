<?php

/*
|--------------------------------------------------------------------------
| Service - Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for this service.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Services\Backend\Http\Controllers\FlightsController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {


    // The controllers live in src/Services/Backend/Http/Controllers
    // Route::get('/', 'UserController@index');

    Route::get('/', function () {
        return redirect()->route('admin.login');
    });
    Route::post('trips/check/trip-code', 'TripController@checkTripCode')->name('check.trip-code');

    Auth::routes();
    Route::group(['middleware' => ['auth', 'backend.permissions']], function () {

        Route::get('/flights', [FlightsController::class, 'index'])->name('flights.index');
        Route::get('/flights/view/{id}', [FlightsController::class, 'view'])->name('flights.view');
        Route::get('/flights/destroy/{id}', [FlightsController::class, 'destroy'])->name('flights.destroy');
        Route::get('/flights/edit/{id}', [FlightsController::class, 'edit'])->name('flights.edit');
        Route::get('/flights-create', [FlightsController::class, 'create'])->name('flights.create');
        Route::post('/flights-store', [FlightsController::class, 'store'])->name('flights.store');
        Route::post('/flights-update/{id}', [FlightsController::class, 'update'])->name('flights.update');

        Route::resource('settings', 'SettingController');

        Route::get('teams/get-data', 'TeamController@getData')->name('teams.get-data');
        Route::resource('teams', 'TeamController');

        Route::get('testimonials/get-data', 'TestimonialController@getData')->name('testimonials.get-data');
        Route::resource('testimonials', 'TestimonialController');

        Route::get('searches/get-data', 'PlaceController@getData')->name('searches.get-data');
        Route::resource('searches', 'PlaceController');

        Route::get('users/get-data', 'UserController@getData')->name('users.get-data');
        Route::resource('users', 'UserController');

        Route::get('roles/get-data', 'RoleController@getData')->name('roles.get-data');
        Route::resource('roles', 'RoleController');

        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        Route::get('pages/get-data', 'PageController@getData')->name('pages.get-data');
        Route::resource('pages', 'PageController');

        Route::get('destinations/get-data', 'DestinationController@getData')->name('destinations.get-data');
        Route::resource('destinations', 'DestinationController');

        Route::get('activities/get-data', 'ActivityController@getData')->name('activities.get-data');
        Route::resource('activities', 'ActivityController');

        Route::get('travelstyles/get-data', 'TravelStyleController@getData')->name('travelstyles.get-data');
        Route::resource('travelstyles', 'TravelStyleController');

        Route::get('regions/get-data', 'RegionController@getData')->name('regions.get-data');
        Route::resource('regions', 'RegionController');

        Route::post('trips/{trip}/iterinary/order', 'MenuItemController@order')->name('menus.menu-items.order');

        Route::get('trips/get-data', 'TripController@getData')->name('trips.get-data');
        Route::resource('trips', 'TripController');

        Route::get('sliders/get-data', 'SliderController@getData')->name('sliders.get-data');
        Route::resource('sliders', 'SliderController');

        Route::get('menus/get-data', 'MenuController@getData')->name('menus.get-data');
        Route::resource('menus', 'MenuController');

        Route::post('menus/{menu}/menu-items/order', 'MenuItemController@order')->name('menus.menu-items.order');
        Route::resource('menus.menu-items', 'MenuItemController');

        Route::get('faqs/get-data', 'FaqController@getData')->name('faqs.get-data');
        Route::resource('faqs', 'FaqController');

        Route::get('faq-categories/get-data', 'FaqCategoryController@getData')->name('faqs.get-data');
        Route::resource('faq-categories', 'FaqCategoryController');

        Route::get('offers/get-data', 'OfferController@getData')->name('offers.get-data');
        Route::resource('offers', 'OfferController');

        Route::get('ratings/get-data', 'RatingController@getData')->name('ratings.get-data');
        Route::resource('ratings', 'RatingController');

        Route::get('subscribers/get-data', 'SubscriberController@getData')->name('subscribers.get-data');
        Route::resource('subscribers', 'SubscriberController');

        Route::get('enquiries/get-data', 'EnquiryController@getData')->name('enquiries.get-data');
        Route::resource('enquiries', 'EnquiryController');

        Route::get('landing-inquiry/get-data', 'LandingInquiryController@getData')->name('landing-inquiry.get-data');
        Route::resource('landing-inquiry', 'LandingInquiryController');

        Route::get('bookings/get-data', 'BookingController@getData')->name('bookings.get-data');
        Route::get('bookings/export', 'BookingController@export')->name('bookings.export');
        Route::get('bookings/cancel/{booking}/{ids}', 'BookingController@cancel')->name('bookings.cancel');
        Route::resource('bookings', 'BookingController');

        Route::get('fixed-departures/get-data', 'FixedDepartureController@getData')->name('fixed-departures.get-data');
        Route::resource('fixed-departures', 'FixedDepartureController');

        Route::get('flight-bookings/get-data', 'FlightBookingController@getData')->name('flight-bookings.get-data');
        Route::resource('flight-bookings', 'FlightBookingController');

        Route::get('hotels/get-data', 'HotelController@getData')->name('hotels.get-data');
        Route::resource('hotels', 'HotelController');


        Route::get('posts/get-data', 'PostController@getData')->name('posts.get-data');
        Route::resource('posts', 'PostController');

        Route::get('categories/get-data', 'CategoryController@getData')->name('categories.get-data');
        Route::resource('categories', 'CategoryController');

        Route::get('customers/get-data', 'CustomerController@getData')->name('customers.get-data');
        Route::resource('customers', 'CustomerController');


        Route::resource('attachments', 'AttachmentController');
        Route::post('upload', 'UploadController@upload')->name('image.upload');
    });
});
