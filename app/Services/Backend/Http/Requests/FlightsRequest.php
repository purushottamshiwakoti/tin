<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlightsRequest extends FormRequest
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
            'overview_description' => 'required',
            'from' => 'required',
            'to' => 'required',
            'banner_image' => 'required',
            'slug' => 'required',
            'starting_price' => 'required',
            'category'=>'required',
        ];
    }
}
