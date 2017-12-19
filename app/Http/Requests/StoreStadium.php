<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStadium extends FormRequest
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
            'sector_number' => 'required|integer',
            'rows_number' => 'required|integer',
            'places_number' => 'required|integer'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Stadium name is required',
            'sector_number.required'  => 'Sectors numbers is required',
            'rows_number.required'  => 'Rows numbers is required',
            'places_number.required'  => 'Places numbers is required',
            'sector_number.integer' => 'Sectors number must be integer',
            'rows_number.integer' => 'Rows number must be integer',
            'places_number.integer' => 'Places number must be integer'
        ];
    }
}
