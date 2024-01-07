<?php

namespace App\Services\Backend\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTripRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required',
            'trip_code'=>'required|unique:trips,trip_code,'.$this->trip,
            'destination_id'=>'required|exists:destinations,id',
            'activity_tripable_id'=>'required_without:region_tripable_id',
            'region_tripable_id'=>'required_without:activity_tripable_id',
        ];
    }
}
