<?php

/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 6/25/18
 * Time: 2:59 PM
 */

namespace App\Data\Repositories\Eloquent;

use App\Data\Models\Destination;
use App\Data\Models\TravelStyle;
use App\Data\Models\Trip;
use App\Data\Models\TripsTravelStylePivot;
use App\Data\Repositories\Contracts\TripInterface;
use App\Data\Repositories\Repository;
use Illuminate\Support\Facades\DB;

class TripRepository extends Repository implements TripInterface
{

    public function __construct(Trip $model)
    {
        parent::__construct($model);
    }


  public function getAllPaginateTrip()
  {
      return $this->model->published()->paginate(10);
  }

  public function getTripsAsOption()
  {
    return $this->model->published()->get()->pluck('title','id');
  }

  public function getActivitiesByTrip($slug)
  {
     
      $trips = $this->model->whereHas('activity',  function ($q)  use ($slug) {
        $q->where('slug', '=', $slug);
    })->paginate(10);
    
      return $trips;

  }
   public function getDestinationByTrip($slug)
  {
     
      $trips = $this->model->whereHas('destination',  function ($q)  use ($slug) {
        $q->where('slug', '=', $slug);
    })->paginate(10);
    
      return $trips;

  }



    /**
     * @param int $id
     * @return mixed
     */
    public function findSingleTrip(int $id)
    {
        return $this->model->with(['fixedDepartures', 'itinerary', 'extraValues', 'tripNotes', 'alternateItinerary', 'alternateNotes','travelStyles'])->find($id);
    }
    public function getAllTrip()
    {
        return $this->model->with('travelStyles')->where('publish', 1)->where('publish_types','like','%Featured%')->get();
    }


    public function getOtherPackages($trip)
    {
        return $this->model->where('publish', 1)->where('id', '!=', $trip->id)->with('travelStyles')->orderBy('created_at', 'desc')->take('6')->get();
    }

 
    /**
     * @param array $param
     * @return bool
     */
    public function storeTrip($param = [])
    {
        $result = false;
        $data = $this->addTripableId($param);
        DB::transaction(function () use ($data, &$result) {
            $trip = $this->fillAndSave($data);
            if (isset($data['itinerary'])) {
                $trip->itinerary()->create($data['itinerary']);
            }
            if (isset($data['fixed_departures']) && $data['has_departure']) {
                $departures = array_filter(array_map('array_filter', $data['fixed_departures']));
                $trip->fixedDepartures()->createMany($departures);
            }
            if (isset($data['extra_info'])) {
                $extraInfos = array_filter(array_map('array_filter', $data['extra_info']), function ($arr) {
                    return isset($arr['key']) && isset($arr['value']) && trim(str_replace('&nbsp;', '', strip_tags($arr['value']))) != '';
                });
                $trip->extraValues()->createMany($extraInfos);
            }

            if(isset($data['trip_notes']))
            {
                $this->syncExtraFieldsRelation($trip,$data,'trip_notes','notes','tripNotes');
            }
            // if(isset($data['alternate_itinerary']))
            // {

            //     $this->syncExtraFieldsRelation($trip,$data,'alternate_itinerary');
            // }

            // if(isset($data['alternate_notes']))
            // {
            //     $this->syncExtraFieldsRelation($trip,$data,'alternate_notes');
            // }

            if(isset($data['travelStyles']))
            {
                // TripsTravelStylePivot::where('trip_id', $trip->id)->delete();


                foreach ($data['travelStyles'] as $travelStyles) {
                    $data = new TripsTravelStylePivot();
                    $data->trip_id =$trip->id;
                    $data->travel_style_id = $travelStyles;
                    $data->save();
                }
            }
            $result = $trip;
        });
        return $result;
    }

    /**
     * @param $trip
     * @param array $data
     * @param string $field
     * @param string|null $type
     * @param string|null $relation
     * @throws \Exception
     */
    protected function syncExtraFieldsRelation($trip, array $data, string $field, string $type = null, string $relation = null)
    {
        $type = $type ?? $field;
        $extraValues = array_filter(array_map('array_filter', $data[$field]), function ($arr) {
            return isset($arr['key']) && isset($arr['value']) && trim(str_replace('&nbsp;', '', strip_tags($arr['value']))) != '';
        });

        $relation = $relation ?? $field;
        if (!$trip->has($relation)) {
            throw new \Exception('Relation ' . $relation . ' not defined');
        }

        $previousValues = array_column($extraValues, 'id');
        if (count($previousValues)) {
            $trip->{$relation}()->whereNotIn('id', array_column($extraValues, 'id'))->delete();
        }
        foreach ($extraValues as $extraValue) {
            if (trim(strip_tags($extraValue['value']))) {
                $extraValue['type'] = $type;
                if (isset($extraValue['id']) && $extraValue['id']) {
                    $trip->{$relation}()->where('id', $extraValue['id'])->update($extraValue);
                } else {
                    $extraValue['slug'] = str_replace(' ', '-', rtrim(strtolower($extraValue['key'])));
                    if (!$trip->{$relation}->where('slug', $extraValue['slug'])->count()) {
                        $trip->{$relation}()->create($extraValue);
                    }
                }
            }
        }
    }


    /**
     * @param $id
     * @param array $param
     * @return bool
     */
    public function updateTrip($id, $param = [])
    {
        $result = false;
        $data = $this->addTripableId($param);
        $newData = $data;
        DB::transaction(function () use ($id, $data, &$result ,$newData) {
            $trip = $this->update($id, $data);
            $itinerary = $trip->itinerary;
            if (isset($newData['itinerary'])) {
                $itinerary->fill($newData['itinerary'])->save();
            }

            if (isset($newData['fixed_departures']) && $newData['has_departure']) {
                $departures = array_filter(array_map('array_filter', $newData['fixed_departures']));
                $trip->fixedDepartures()->whereNotIn('id', array_column($departures, 'id'))->delete();

                foreach ($departures as $departure) {
                    if (isset($departure['start_date'])) {
                        if (isset($departure['id']) && $departure['id']) {
                            $trip->fixedDepartures()->where('id', $departure['id'])->update($departure);
                        } else {

                            $trip->fixedDepartures()->create($departure);
                        }
                    }
                }
            }

            // if (isset($data['extra_info'])) {
            //     $this->syncExtraFieldsRelation($trip, $data, 'extra_info', 'default', 'extraValues');
            // }

            if (isset($newData['travelStyles'])) {
                TripsTravelStylePivot::where('trip_id', $id)->delete();


                foreach ($newData['travelStyles'] as $travelStyles) {
                    $data = new TripsTravelStylePivot();
                    $data->trip_id = $id;
                    $data->travel_style_id = $travelStyles;
                    $data->save();
                }
            }

            if(isset($newData['trip_notes']))
            {
                $this->syncExtraFieldsRelation($trip,$newData,'trip_notes','notes','tripNotes');
            }
            // if(isset($data['alternate_itinerary']))
            // {
            //     $this->syncExtraFieldsRelation($trip,$data,'alternate_itinerary');
            // }
            // if(isset($data['alternate_notes']))
            // {
            //     $this->syncExtraFieldsRelation($trip,$data,'alternate_notes');
            // }
            $result = $trip;
        });
        return $result;
    }

        /**
     * @param $id
     * @param object $trip
     * @return bool
     */

    public function deleteTrip($id , $trip)
    {
        $tripData = $trip->findById($id);
        $result = $trip->remove($id);
        if($result)
        {
            $tripData->fixedDepartures()->delete();
        }
        return $result;   
    }

    /**
     * @param array $data
     * @return array
     */
    protected function addTripableId($data = [])
    {
        $data['tripable_id'] = $data[$data['tripable_type'] . '_tripable_id'];
        return $data;
    }


    /**
     * @param $attributes
     * @param $query
     * @param array $relationQuery
     * @param string $operator
     * @param string $type
     * @return mixed
     */
    public function searchTrips($attributes, $q, $filters = [], $operator = 'like', $type = 'or')
    {

        $query = $this->model->select('*');
        $method = 'where';

        if (strtoupper($type) === 'OR') {
            $method = 'orWhere';
        }
        if (strtolower($operator) == 'like') {
            $q = '%' . $q . '%';
        }

        $query->where(function ($qs) use ($attributes, $q, $method, $operator) {
            foreach ($attributes as $key => $value) {
                $explodeAttr = explode('.', $value);
                if (count($explodeAttr) == 2) {
                    $att = $explodeAttr[1];
                    $qs->orWhereHas($explodeAttr[0], function ($qe) use ($att, $q) {
                        return $qe->where($att, 'like', $q);
                    });
                } else {
                    $qs->$method($value, $operator, $q);
                }
            }
        });

        $query->orWhere(function ($qs) use ($q) {
            return $qs->orWhereHas('activity', function ($qn) use ($q) {
                return $qn->where('title', 'like', $q);
            });
        });

        $query->orWhere(function ($qs) use ($q) {
            $qs->orWhereHas('region', function ($qn) use ($q) {
                return $qn->whereHas('activity', function ($qn) use ($q) {
                    return $qn->where('title', 'like', $q);
                })->orWhere('title', 'like', $q);
            });
        });
        // dd(isset($filters['activity_id']));
        if (isset($filters['activity_id'])) {
            $activities = explode(',', $filters['activity_id']);
            $query->activityFiltered($activities);
        }
        if (isset($filters['destination'])) {
            $query->where('destination_id', $filters['destination']);
        }

        if(isset($filters['price']))
        {
            $query->priceFiltered(explode(',',$filters['price']));
        }

        if (isset($filters['sort-type'])) {
            $sortoption = explode('::', $filters['sort-type']);
            if (count($sortoption) > 1) {
                $query->orderBy($sortoption[0], $sortoption[1]);
            }
        }

        if(isset($filters['duration']))
        {
            $duration = explode(',',$filters['duration']);
            $query->durationFiltered($duration);
        }

        if (isset($filters['style'])) {

            $ts = $filters['style'];
            $query->whereHas('travelStyles',  function ($q)  use ($ts) {
                $q->where('slug', '=', $ts);
            });
        }
        //        DB::enableQueryLog();
        $result = $query->published()->paginate(10);
        // dd($result);
        //        dd(DB::getQueryLog());
        return $result;
    }

    /**
     * @param $ids
     * @return mixed
     */
    public function getTripByIds($ids)
    {

        $query = $this->model->select('*');
        foreach ($ids as $id) {
            $query->orWhere('id', $id);
        }
        return $query->published()->get();
    }

 

    /**
     * @param $type
     * @param $id
     * @return mixed
     */
    public function getHotDealsByTripableType($type, $id)
    {
        return $this->model->where('tripable_type', $type)->where('tripable_id', $id)
            ->orWhereHas('region', function ($qs) use ($id) {
                return $qs->where('activity_id', $id);
            })
            ->hasdeal()->get();
    }

    public function getTripByDestinationAndActivity($destination,$activity)
    {
        $trips = $this->model->whereHas('destination',  function ($q)  use ($destination) {
            $q->where('slug', '=', $destination);
        })->whereHas('activity',  function ($q)  use ($activity) {
            $q->where('slug', '=', $activity);
        })->paginate(10);
        
          return $trips;
    }


    public function getAjaxTrip($data)
    {
        $modelQuery = $this->model->where(['publish' => 1])->where(function ($query) use ($data) {

            if (isset($data['activity'])) {
                $a = $data['activity'];
                $query->whereHas('activity', function ($q) use ($a) {
                    is_array($a) ? $q->whereIn('slug', $a) : $q->where('slug', $a);
                });
            }
        });
     
        return $modelQuery->paginate(12);
    }
}