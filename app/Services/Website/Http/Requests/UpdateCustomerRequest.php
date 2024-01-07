<?php

namespace App\Services\Website\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            'email'=>'required|email|unique:customers,email,'.$this->user,
            'date_of_birth'=>'required',
            'nationality'=>'required',
            'gender'=>'required',
            'address'=>'required',
            'mobile_number'=>'required',
            'state'=>'required',
            'zip_code'=>'required',
            'country'=>'required',
            'password'=>'sometimes|string|min:6|confirmed|nullable'
        ];
    }
}
