<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/12/18
 * Time: 2:54 PM
 */

namespace App\Data\Repositories\Eloquent;


use App\Data\Models\FixedDeparture;
use App\Data\Repositories\Contracts\FixedDepartureInterface;
use App\Data\Repositories\Repository;
use Carbon\Carbon;
use Request;
use Illuminate\Support\Facades\Input;

class FixedDepartureRepository extends Repository implements FixedDepartureInterface
{

    public function __construct(FixedDeparture $model)
    {
        parent::__construct($model);
    }


 

    /**
     * @return array
     */
    public function getDepartureAvailabilities()
    {
        $availabilities = $this->model->all()->pluck('availability');
        $items = [];
        $availabilities->map(function ($item) use (&$items){
            if(is_array($item))
            {
                $items = array_flatten($item);
            }else{
                $items[] = $item;
            }

        });

        return array_unique($items);
    }

    public function getDepartureArchives()
    {
        
        $date = today()->format('Y-m-d');
       return $this->model->where('start_date','>=',$date)
       ->select('start_date')->groupBy('start_date')
       ->orderBy('start_date','desc')->get();

    }

    public function getDepartureUpcomingTrip($data){

        $date = $data['date'];
       
        if(isset($data['id']))
        {
            $id = $data['id'];
        }
        $date = Carbon::createFromFormat('F-Y',$date);
        $date  = $date->format('Y-m');

        if(!empty($id))
        {
            $upcomingTrip = $this->model->where('start_date','>',$date.'%')
            ->where(['publish'=>'1','trip_id'=>$id])->orderBy('start_date','ASC')->paginate(10);

        }else{

            $upcomingTrip = $this->model->where('start_date','>',$date.'%')
            ->where(['publish'=>'1'])
            ->orderBy('start_date','ASC')->paginate(10);
        }
        return $upcomingTrip;
    }

    public function getUpcomingFixedDepartureTrip($date)
    {
        $upcomingTrip = $this->model->with('trip')->where('start_date','>',$date)
            ->where(['publish'=>'1'])
            ->orderBy('start_date','ASC')->limit(4)->get();
        return $upcomingTrip;
        
    }

    public function update($id, $attributes)
    {
        $departure = parent::update($id, $attributes);
        $deal = $departure->lastminutedeal;
        if(!$deal)
        {
            if(isset($attributes['deal_price']))
            {
                return $departure->lastminutedeal()->create($attributes);
            }

        }
        if(isset($attributes['deal_price'])) {
            return $deal->fill($attributes)->save();
        }
        return $departure;
    }

    public function find($id, $relations = null)
    {
        if($id == 'new')
        {
            $instance = $this->getInstance();
            $instance->fill(Request::all());
            return $instance;
        }
        $result = $this->findBy($this->model->getKeyName(), $id, $relations);
        return $result;
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
        $query = $this->model->with('trip','lastminutedeal')->orderBy($orderBy,$orderType);
        return datatables()->eloquent($query)->make(true)->original;
    }

    public function findOrNew($id, $trip)
    {
        if($id == 'new')
        {
            $instance = $this->getInstance();
            $data = Request::all();
            $data['price'] = $trip->price;
            $data['id'] = 'new';
            $instance->fill($data);
            return $instance;
        }
        $result = $this->findBy($this->model->getKeyName(), $id);
        return $result;
    }


   
}