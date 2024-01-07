<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 6/20/18
 * Time: 12:03 PM
 */

namespace App\Services\Backend\Providers;

use App\Foundation\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $models = [
            'User',
            'Page',
            'Media',
            'Attachment',
            'Destination',
            'Activity',
            'Region',
            'Trip',
            'Itinerary',
            'Faq',
            'Slider',
            'Role',
            'Customer',
            'FixedDeparture',
            'Booking',
            'Subscriber',
            'BookingExtension',
            
            'Rating',
            'Offer',
            'Category',
            'Post',
            'Enquiry',
            'FlightBooking',
            'Menu',
            'CustomField',
            'Notification',
            'ExtraValue',
            'LastMinuteDeal',
            'LandingInquiry',
            'Transaction',
            'TripBooking',
            'TravelStyle',
            'TripsTravelStylePivot',
            'Team',
            'Testimonial',
            'Blog',
            'Place',
            'Hotel'
        ];

        foreach ($models as $model)
        {
            $this->app->bind("App\Data\Repositories\Contracts\\".$model."Interface",
                "App\Data\Repositories\Eloquent\\".$model."Repository");
        }

        $this->app->bind("App\Data\Services\Payments\PayableInterface",
            "App\Data\Repositories\Eloquent\BookingRepository");
    }
}