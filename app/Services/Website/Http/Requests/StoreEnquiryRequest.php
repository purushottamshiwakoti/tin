<?php

namespace App\Services\Website\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEnquiryRequest extends FormRequest
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
            'name'=>'required|string|max:255',
            'email'=>'sometimes|email',
            'subject'=>'required',
            'message'=>'required',
            'issue'=>'required|string|max:255',
            // 'g-recaptcha-response'=>'required'
        ];
    }
}
