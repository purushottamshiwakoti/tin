<?php

namespace App\Services\Website\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomTravelRequest extends FormRequest
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
            'first_name'=>'required|string|max:255',
            'last_name'=>'required|string|max:255',
            'email'=>'required|email',
            'phone_number'=>'required|digits:10',
            'passenger_count'=>'required',
            'group_type' => 'required',
            'start_date'=>'required|date',
            'days_count'=>'required|numeric',
            'activities'=>'required',
            'activities.*'=>'required|string|max:255',
            'children_present'=>'nullable',
            'description' => 'required|string',
            'request_type' => 'required|string|max:255'
        ];
    }
}
