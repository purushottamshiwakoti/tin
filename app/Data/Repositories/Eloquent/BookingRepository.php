<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/13/18
 * Time: 11:11 AM
 */

namespace App\Data\Repositories\Eloquent;


use App\Data\Models\Activity;
use App\Data\Models\Booking;
use App\Data\Models\Trip;
use App\Data\Repositories\Contracts\BookingInterface;
use App\Data\Repositories\Repository;
use App\Events\Website\BookingCompleted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class BookingRepository extends Repository implements BookingInterface
{

    public function __construct(Booking $model)
    {
        parent::__construct($model);
    }


    /**
     * @param $data
     * @return bool
     */
    public function storeBooking($data)
    {
        $result = false;
        DB::transaction(function () use ($data, &$result){
            $booking  = $this->fillAndSave($data);
            
            // $passengers = $this->checkHasLead($data['passengers']);
            // $booking->passengers()->createMany($passengers);
            if(isset($data['passengers']))
            {
                $passengers = $this->checkHasLead($data['passengers']);
                $booking->passengers()->delete();
                $booking->passengers()->createMany($passengers);
            }
            $result = $booking;
            try{
                // event( new BookingCompleted($booking));
            }
            catch (\Exception $e)
            {
                
            }
        });

        return $result;

    }

    /**
     * @param $passengers
     * @return mixed
     */
    protected function checkHasLead($passengers)
    {
        if(!in_array(1,array_column($passengers,'is_lead')))
        {
            $passengers[0]['is_lead'] = 1;
        }
        return $passengers;
    }

    /**
     * @param $id
     * @param $data
     * @return bool
     */

    public function updateBooking($id, $data)
    {
        $result = false;
        DB::transaction(function () use ($id,$data, &$result){
            $booking  = $this->update($id,$data);
            if(isset($data['passengers']))
            {
                $passengers = $this->checkHasLead($data['passengers']);
                $booking->passengers()->delete();
                $booking->passengers()->createMany($passengers);
            }

            if(isset($data['add_on']))
            {
                $booking->addOns()->delete();
                foreach ($data['add_on'] as $key => $add_on)
                {
                    $booking->addOns()->create(['title'=>$key,'key'=>$add_on,'value'=>$add_on]);
                }
            }

            if(isset($data['booking_extensions']))
            {
//                $booking->bookingExtensions()->delete();
                foreach ($data['booking_extensions'] as $extension)
                {
                    $trip = Trip::find($extension);
                    if($trip)
                    {
                        $booking->bookingExtensions()->create(['trip_id'=>$trip->id,'title'=>$trip->title,'price'=>$trip->price]);
                    }
                }
            }
            $result = $booking;
        });
        return $result;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function approveCancellation($id)
    {
        $booking = $this->model->findOrFail($id);
        $booking->fill(['cancelled_at'=>now()])->save();
        return $booking;
    }

    /**
     * @param $attributes
     * @param int $items
     * @param string $orderBy
     * @param string $orderType
     * @return mixed
     * @throws \Exception
     */
    public function getDatatablePaginated($attributes, $items = 10, $orderBy = 'created_at', $orderType = 'desc')
    {
        $from = request()->get('from');
        $to = request()->get('to');

        $query = $this->model->with('customer','departure','passengers','addOns','trip');
        if($from)
        {
            $to = $to?$to:now()->format('Y-m-d');
            $to = $to.' 23:59:00';
            $dateRange = [$from,$to];
            $query = $query->whereBetween('created_at',$dateRange);
        }
        if(request()->get('only_departure') == 'true')
        {
            $query = $query->whereHas('trip',function ($q){
               return $q->where('has_departure',1);
            });
        }

        if(request()->get('abandoned') != 'true')
        {
            // $query = $query->whereHas('transaction',function ($q){
            //     return $q->whereNotNull('status');
            // });
        }
        return datatables()->eloquent($query)
            ->filterColumn('trip_code',function ($query,$keyword){
                $query->orWhereHas('trip',function ($qr){
                    return $qr->where('trip_code','like',"%" . request()->get('search.value') . "%");
                })->orWhereHas('departure',function ($qrs){
                    return $qrs->where('trip_code','like',"%" . request()->get('search.value') . "%");
                });
            })
            ->addColumn('trip_code',function ($booking){
            return isset($booking->departure)?optional($booking->departure)->trip_code:optional($booking->trip)->trip_code;
        })->make(true)->original;
    }
}