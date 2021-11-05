<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class DonationRequestFormRequest extends FormRequest
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
            'patient_name' => 'required|string',
            'patient_age' => 'required|numeric',
            'blood_type_id' => 'required',
            'bags_num' => 'required|numeric',
            'hospital_name' => 'required|string',
            'hospital_address' => 'required|string',
            'city_id' => 'required',
            'patient_phone' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'additional_notes' => 'string',
        ];
    }
}
