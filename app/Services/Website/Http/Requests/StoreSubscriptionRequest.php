<?php

namespace App\Services\Website\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubscriptionRequest extends FormRequest
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
            'email'=>'required|email|unique:subscribers,email|max:255',
            'first_name'=>'required_if:subscribe_pop,1|string|max:255',
            'last_name'=>'required_if:subscribe_pop,1|string|max:255',
            'agree'=>'required_if:subscribe_pop,1'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required_if' => 'First name field is required.',
            'last_name.required_if' => 'Last name field is required',
            'agree.required_if' => 'You must agree to our terms and conditions',
        ];
    }
}
