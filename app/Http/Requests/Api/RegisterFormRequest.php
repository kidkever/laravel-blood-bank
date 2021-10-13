<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:clients,email',
            'd_o_b' => 'required|date',
            'blood_type_id' => 'required',
            'last_donation_date' => 'required|date',
            'city_id' => 'required',
            'mobile_num' => 'required|unique:clients,mobile_num',
            'password' => 'required|confirmed',
        ];
    }
}
