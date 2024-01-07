<?php

namespace App\Services\Website\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLandingInqueryRequest extends FormRequest
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
            'first_name'=>'required',
            'last_name'=>'required',
            'nationality'=>'required',
            'gender'=>'required',
            'address'=>'required',
            'state'=>'required',
            'postal_code'=>'required|integer',
            'email'=>'sometimes|email',
            'country'=>'required',
//            'arrival_date'=>'required|date_format:Y-m-d',
            'number_of_person'=>'required|integer',
            'g-recaptcha-response'=>'required'
        ];
    }
}
