<?php

namespace App\Services\Website\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePassengersRequest extends FormRequest
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
            'passengers.*.title'=>'required',
            'passengers.*.first_name'=>'required|max:255',
            'passengers.*.last_name'=>'required',
            'passengers.*.email'=>'required|email',
            'passengers.*.date_of_birth' => 'required|date',
            'passengers.*.address'=>'required|max:255',
            'passengers.*.state'=>'required|max:255',
            'passengers.*.zip_code'=>'required|max:10',
            'passengers.*.gender'=>'required',
            'passengers.*.country'=>'required|string|max:255',
            'passengers.*.mobile_number'=>'required|numeric|digits_between:8,16',
        ];
    }


    public function messages()
    {
        $messages = [];

        foreach ($this->get('passengers') as $key => $val)
        {

            $messages["passengers.$key.title.required"] = "Passengers title is required.";

            $messages["passengers.$key.first_name.required"] = "Passengers first name is required.";
            $messages["passengers.$key.first_name.max"] = "Passengers first name cannot be greater than 255 character.";

            $messages["passengers.$key.last_name.required"] = "Passengers last name is required.";
            $messages["passengers.$key.last_name.max"] = "Passengers last name cannot be greater than 255 character.";

            $messages["passengers.$key.email.required"] = "Passengers email is required.";
            $messages["passengers.$key.email.max"] = "Passengers email cannot be greater than 255 character.";

            
            $messages["passengers.$key.date_of_birth.required"] = "Passengers date of birth is required.";
            $messages["passengers.$key.date_of_birth.date"] = "Passengers date of birth must be of type date.";

            $messages["passengers.$key.address.required"] = "Passengers address is required.";
            $messages["passengers.$key.address.max"] = "Passengers address cannot be greater than 255 character.";

            $messages["passengers.$key.state.required"] = "Passengers state is required.";
            $messages["passengers.$key.state.max"] = "Passengers state cannot be greater than 255 character.";

            $messages["passengers.$key.zip_code.required"] = "Passengers zip code is required.";
            $messages["passengers.$key.zip_code.max"] = "Passengers zip code cannot be greater than 10 character.";

            $messages["passengers.$key.gender.required"] = "Passengers gender is required.";

            $messages["passengers.$key.country.required"] = "Passengers country is required.";
            $messages["passengers.$key.country.string"] = "Passengers country must be in string format";
            $messages["passengers.$key.country.max"] = "Passengers country name cannot be greater than 255 character.";

            $messages["passengers.$key.mobile_number.required"] = "Passengers mobile number is required.";
            $messages["passengers.$key.mobile_number.digits_between"] = "Passengers mobile number must be between 8 to 16 digits.";
            $messages["passengers.$key.mobile_number.numeric"] = "Passengers mobile number must be in digits.";

        }

        return $messages;
    }
}