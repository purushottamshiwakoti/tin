<?php
namespace App\Domains\Bookings\Jobs;

use App\Exports\BookingExport;
use Illuminate\Support\Facades\Input;
use Lucid\Units\Job;
use Maatwebsite\Excel\Excel;

class ExportBookingJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data;
    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * @param Excel $excel
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function handle(Excel $excel)
    {
        $type = request()->get('ex-type');
        if($type == 'pdf')
        {
            $pdf = \PDF::loadView('backend::bookings.pdf',['bookings'=>json_decode(json_encode($this->data))])
                ->setPaper('a4', 'landscape');
            return $pdf->download('trip-bookings-'.now()->format('Y-m-d-H-i-s').'.pdf');
        }else{
            return $excel->download(new BookingExport($this->data),'trip-bookings-'.now()->format('Y-m-d-H-i-s').'.xlsx');
        }


    }
}
