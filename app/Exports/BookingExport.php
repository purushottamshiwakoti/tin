<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BookingExport implements FromView
{
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }


    /**
     * @return View
     */
    public function view(): View
    {
        $bookings =json_decode(json_encode($this->data));
        return view('backend::bookings.exports', [
            'bookings' => $bookings
        ]);
    }
}
