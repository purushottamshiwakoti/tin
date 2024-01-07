<?php
namespace App\Services\Website\Features;

use App\Data\Models\Booking;

use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ShowChangePassword extends Feature
{
    public function handle(Request $request)
    {
      
        return view('website::user.dashboard-change-password');
       
    }
}