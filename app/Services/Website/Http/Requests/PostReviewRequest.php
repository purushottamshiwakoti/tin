<?php

namespace App\Services\Website\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostReviewRequest extends FormRequest
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
            'full_name'=>'required',
            'email'=>'required',
//            'g-recaptcha-response'=>'required',
            'title'=>'required',
            'review'=>'required'

        ];
    }
}
