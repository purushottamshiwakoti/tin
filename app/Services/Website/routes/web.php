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

use App\Events\Website\BookingCompleted;
use App\Services\Website\Http\Controllers\HomeController;
use App\Services\Website\Http\Controllers\PageController;
use App\Services\Website\Http\Controllers\FlightController;
use App\Services\Website\Http\Controllers\RegionController;

Route::get('allupcomingtrip', 'HomeController@allUpcomingTrip')->name('ajax.upcomingTrip');
Route::get('allplantrips', 'HomeController@allPlanTrips')->name('ajax.plantrips');
Route::get('tripdata', 'TripController@getTripSearch')->name('ajax.tripdata');
Route::get('/flights', [FlightController::class, 'index'])->name('flights');
Route::get('/flights/booking/{flight}/{departure}', [FlightController::class, 'getBookFlights'])->name('flights.book');
Route::post('/flights/booking/{flight}/{departure}', [FlightController::class, 'postBookFlights'])->name('flights.post');
Route::get('/flights-detail/{slug}', [FlightController::class, 'detail'])->name('flight.detail');
// Route::get('auth/google', 'GoogleController@redirectToGoogle');
// Route::get('auth/google/callback', 'GoogleController@handleGoogleCallback');
Route::get('/regions',[RegionController::class, 'index'])->name('regions');
Route::get('/destinations', [HomeController::class, 'destinations'])->name('destinations');
Route::get('/destinations/{country}', [HomeController::class,'getDestination']);
Route::get('/destinations/{country}/{activity}', [HomeController::class,'getRegions'])->name('destination.region');
Route::get('/destinations/{country}/{activity}/{slug}', [HomeController::class,'getRegionDetail'])->name('destination.region-detail');
Route::group(['as' => 'website.', 'middleware' => ['guard.customer']], function () {

    Route::group(['middleware' => ['auth.customer']], function () {
        // user
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        Route::get('/change/password', 'DashboardController@changepassword')->name('dashboard.change.password');
        Route::get('/user/booking', 'DashboardController@booking')->name('user.booking');
        Route::get('/user/profile', 'DashboardController@profile')->name('user.profile');
        Route::get('/user/setting', 'DashboardController@setting')->name('user.setting');
        Route::get('/user/review', 'DashboardController@review')->name('user.review');
        Route::get('/user/wishlist', 'DashboardController@wishlist')->name('user.wishlist');
        Route::post('/user/{id}', 'DashboardController@editProfile')->name('edit');
        Route::post('/user/change/password/{id}', 'DashboardController@updatePassword')->name('change.password');
    });

    Route::group(['middleware' => ['guard.customer']], function () {

        Route::get('blog/search', 'BlogController@blogSearch')->name('blog.search');

        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('reset-password/{token}', [App\Services\Website\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('reset_password');
        Route::post('reset-password', [App\Services\Website\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');


        Route::get('/guest/wishlist', 'HomeController@listWishilst')->name('guest.wishlist');

        // end  

        // The controllers live in src/Services/Website/Http/Controllers
        // Route::get('/', 'UserController@index');
        Auth::routes();
        Route::get('email-verification/error', 'Auth\RegisterController@getVerificationError')->name('email-verification.error');
        Route::get('email-verification/check/{token}', 'Auth\RegisterController@getVerification')->name('email-verification.check');

        Route::get('ruploads/{path}', 'ImageController@show')->where('path', '.*');
        Route::get('/', 'HomeController@index')->name('home');
        // Route::get('destination', 'TripController@getAllDestination')->name('destination');
        Route::get('destination/{destination}', 'TripController@getDestination')->name('destination');
    Route::get('activities/{activity}', 'TripController@getActivity')->name('activities.detail');
        Route::get('activities/', 'TripController@getAllActivities');
        Route::get('regions/{region}', 'TripController@getRegion')->name('regions.detail');



        Route::group(['prefix' => 'blog'], function () {
            Route::get('/', 'BlogController@index')->name('blog.index');
            Route::get('category/{category}', 'BlogController@getCategory')->name('blog.category');
            Route::get('archive/{archive}', 'BlogController@getArchive')->name('blog.archive');
            Route::get('tag/{tag}', 'BlogController@getByTag')->name('blog.tag');
            Route::get('{post}', 'BlogController@getPost')->name('blog.detail');
        });

        Route::get('/pages', 'PageController@index')->name('pages.index');
        Route::post('subscribe', 'SubscriptionController@store')->name('subscribe.post');
        Route::post('flight/book', 'FlightController@postBooking')->name('flight.book');
        Route::get('everest-basecamp-in-may', 'HomeController@getPage')->name('page');
        Route::get('booking-success', 'CheckoutController@success')->name('checkout.success');
        Route::get('{trip}', 'TripController@getTrip')->name('trips.detail');
        Route::get('{trip}/notes', 'TripController@getNotes')->name('trips.note');
        Route::get('{trip}/alternate-itinerary', 'TripController@getAlternateItinerary')->name('trips.alternate_itinerary');
        Route::get('trips/search', 'TripController@search')->name('trips.search');

        Route::post('favourite/trips', 'TripController@makeFav')->name('trips.favourite.store');
        Route::get('favourite/trips', 'TripController@getWishlist')->name('trips.favourite.get');
        Route::get('pages/{slug}', 'HomeController@getPage')->name('page');

        Route::post('contact', 'HomeController@postContact')->name('contact.post');
        Route::post('landing/inquiry', 'HomeController@postLandingInquiry')->name('landing.post');
        Route::post('rating/{trip}', 'HomeController@postReview')->name('review.post');
        Route::post('/update/rating/', 'HomeController@updateRating')->name('update.rating');
        Route::post('/delete/rating/', 'HomeController@deleteRating')->name('delete.rating');
        Route::post('travel-style/request', 'HomeController@postCustomTravelRequest')->name('travel-style.request.post');

        Route::get('contact/mail', function () {
            $enquiry = \App\Data\Models\Enquiry::first();
            return view('website::mails.contact-us-customer', compact('enquiry'));
        });
        Route::get('book/mail', function () {
            //        $booking = \App\Data\Models\FlightBooking::first();
            //        return view('website::mails.flight-booked',compact('booking'));

            //         $booking = \App\Data\Models\Booking::find(77)?:\App\Data\Models\Booking::first();
            //        $pdf = \PDF::loadView('website::resources.tax-invoice',['booking'=>$booking]);
            ////            ->setPaper('a4', 'portrait');
            //        return $pdf->download('trip-bookings.pdf');
            //
            // $booking = \App\Data\Models\Booking::first();
            // event(new BookingCompleted($booking));
            //        return view('website::mails.trip-book-requested-customer',compact('booking'));
            //         return view('website::resources.tax-invoice',compact('booking'));
        });
        //    Route::get('book/user',function ()
        //  {
        //        $customer = \App\Data\Models\Customer::first();
        //        $tripRequest = \App\Data\Models\CustomRequest::first();
        //    $customer = \App\Data\Models\Customer::first();
        //    event(new \'App\Events\Website\BookingCompleted($booking));
        //  return view('website::mails.auto-register',['email'=>$customer->email,'customer'=>$customer,'password'=>'asdfsadf']);
        //        return view('website::mails.custom-trip-requested',['tripRequest'=>$tripRequest]);
        //        return view('website::mails.reset',['customer'=>$customer,'email'=>'sd','token'=>'sd']);
        //    return view('website::mails.subscribed',['subscriber'=>\App\Data\Models\Subscriber::first()]);
        //    });
        //    Route::get('book/inquiry',function ()
        //    {
        //        $inquiry = \App\Data\Models\LandingInquiry::first();
        //        return view('website::mails.landing-inquiry',['inquiry'=>$inquiry]);
        //    });
        //    Route::get('book/cancel',function ()
        //    {
        //        $booking = \App\Data\Models\Booking::find(77);
        ////        event(new \'App\Events\Website\BookingCompleted($booking));
        ////        return view('website::mails.book-cancel-acknowledge-customer',['booking'=>$booking]);
        //        return view('website::mails.book-cancel-approved',['booking'=>$booking]);
        //    });
        ////
        //    Route::get('book/rating',function ()
        //    {
        //        $rating = \App\Data\Models\Rating::first();
        ////        event(new \'App\Events\Website\BookingCompleted($booking));
        //        return view('website::mails.rating-approved',['rating'=>$rating]);
        //    });

        Route::resource('user', 'UserController')->middleware('auth.customer');

        Route::post('user/booking/cancel/{booking}', 'BookingController@cancel')->middleware('auth.customer')->name('booking.cancel');
        Route::get('user/booking/invoice/download/{booking}', 'BookingController@downloadInvoice')->middleware('auth.customer')->name('booking.invoice.download');

        Route::get('checkout/verify/{gateway}', 'CheckoutController@verify')->name('checkout.verify');
        Route::get('checkout/cancel/{gateway}', 'CheckoutController@cancel')->name('checkout.cancel');
        Route::get('booking/{trip}/{departure}', 'BookingController@initBook')->name('book.init');
        Route::post('booking/{trip}/{departure}', 'BookingController@intoSession')->name('book.into-session');
        Route::put('booking/t/{booking}', 'BookingController@updateIntoSession')->name('booking.update-session');

        Route::resource('booking', 'BookingController');
        //    Route::get('booking/features/{trip}/{departure}','BookingController@createFeature')->name('booking.features');
        Route::get('booking/t/features/{booking}', 'BookingController@createFeature')->name('booking.features');
        Route::put('booking/t/features/{booking}', 'BookingController@storeFeatures')->name('booking.store-features');
        Route::get('booking/t/review/{booking}', 'BookingController@review')->name('booking.review');
        Route::put('booking/t/confirm/{booking}', 'BookingController@confirm')->name('booking.confirm');
        Route::get('booking/t/success/{booking}', 'BookingController@success')->name('booking.success');


        Route::post('trip/booking', 'BookingController@booking')->name('trip.booking');
        Route::post('flight/booking', 'FlightController@booking')->name('flight.booking');
        Route::post('car/hire/', 'CarController@booking')->name('car.booking');
        Route::post('hotel/booking/', 'HotelController@booking')->name('hotel.booking');

        Route::get('{destination}/{activity}', 'TripController@getDestinationActivity')->name('destination-activities.detail');
    });
});
