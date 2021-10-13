<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ProfileFormUpdateRequest extends FormRequest
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
            'name' => 'filled',
            'email' => 'filled|email',
            'd_o_b' => 'filled|date',
            'blood_type_id' => 'filled',
            'last_donation_date' => 'filled|date',
            'city_id' => 'filled',
            'mobile_num' => 'filled'
        ];
    }
}
