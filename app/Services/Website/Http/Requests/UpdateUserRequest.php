<?php

namespace App\Services\Website\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'image' => 'nullable|image',
            'first_name'=>'required|string|max:255',
            'last_name'=>'required|string|max:255',
            'email'=>'required|email|unique:customers,email,'.$this->user()->id,
            'date_of_birth'=>'required|date',
            'gender'=>'required|in:male,female,other',
            'mobile_number'=>'required|digits:10',
            'country'=>'required|string|max:255',
            'address'=>'required|string'
        ];
    }
}
