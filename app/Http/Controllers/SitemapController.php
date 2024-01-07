<?php

namespace App\Http\Controllers;

use App\Data\Models\Activity;
use App\Data\Models\Booking;
use App\Data\Models\Category;
use App\Data\Models\Destination;
use App\Data\Models\Faq;
use App\Data\Models\Offer;
use App\Data\Models\Page;
use App\Data\Models\Post;
use App\Data\Models\Region;
use App\Data\Models\Slider;
use App\Data\Models\Subscriber;
use App\Data\Models\Teams;
use App\Data\Models\TravelStyle;
use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;
use App\Data\Models\Trip;
use Spatie\Sitemap\Tags\Url;


class SitemapController extends Controller
{
    public function index()
    {
        set_time_limit(30000);

        $tripsitmap = Sitemap::create();

        $tripsitmap->add(
            Url::create("https://www.traveladventurenepal.com.au/")
                ->setPriority(1)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        );

        Trip::get()->each(function (Trip $trip) use ($tripsitmap) {
            $tripsitmap->add(
                Url::create($trip->slug)
                    ->setPriority(0.9)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            );
        });
        Page::get()->each(function (Page $page) use ($tripsitmap) {
            $tripsitmap->add(
                Url::create('/pages/' . $page->slug)
                    ->setPriority(0.9)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            );
        });
        Activity::get()->each(function (Activity $activity) use ($tripsitmap) {
            $tripsitmap->add(
                Url::create('/activities/' . $activity->slug)
                    ->setPriority(0.9)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            );
        });
        // Offer::get()->each(function (Offer $offer) use ($tripsitmap) {
        //     $tripsitmap->add(
        //         Url::create($offer->id)
        //             ->setPriority(0.8)
        //             ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        //     );
        // });
        // TravelStyle::get()->each(function (TravelStyle $travelStyle) use ($tripsitmap) {
        //     $tripsitmap->add(
        //         Url::create($travelStyle->slug)
        //             ->setPriority(0.9)
        //             ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        //     );
        // });
        // Teams::get()->each(function (Teams $teams) use ($tripsitmap) {
        //     $tripsitmap->add(
        //         Url::create($teams->slug)
        //             ->setPriority(0.8)
        //             ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        //     );
        // });
        // Booking::get()->each(function (Booking $booking) use ($tripsitmap) {
        //     $tripsitmap->add(
        //         Url::create($booking->id)
        //             ->setPriority(0.8)
        //             ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        //     );
        // });
        // Subscriber::get()->each(function (Subscriber $subscriber) use ($tripsitmap) {
        //     $tripsitmap->add(
        //         Url::create($subscriber->id)
        //             ->setPriority(0.8)
        //             ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        //     );
        // });
        // Slider::get()->each(function (Slider $slider) use ($tripsitmap) {
        //     $tripsitmap->add(
        //         Url::create($slider->slug)
        //             ->setPriority(0.8)
        //             ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        //     );
        // });
        // Destination::get()->each(function (Destination $destination) use ($tripsitmap) {
        //     $tripsitmap->add(
        //         Url::create($destination->slug)
        //             ->setPriority(0.8)
        //             ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        //     );
        // });
        Region::get()->each(function (Region $region) use ($tripsitmap) {
            $tripsitmap->add(
                Url::create('/regions/' . $region->slug)
                    ->setPriority(0.9)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            );
        });
        // Category::get()->each(function (Category $category) use ($tripsitmap) {
        //     $tripsitmap->add(
        //         Url::create("/category/".$category->slug)
        //             ->setPriority(0.8)
        //             ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        //     );
        // });
        Post::get()->each(function (Post $post) use ($tripsitmap) {
            $tripsitmap->add(
                Url::create("/blog/" . $post->slug)
                    ->setPriority(0.8)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            );
        });

        // Faq::get()->each(function (Faq $faq) use ($tripsitmap) {
        //     $tripsitmap->add(
        //         Url::create($faq->id)
        //             ->setPriority(0.8)
        //             ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        //     );
        // });

        $tripsitmap->writeToFile(public_path('sitemap.xml'));
        return redirect()->back()->with("success", "Sitemap renewed successfully!!");
    }
}
