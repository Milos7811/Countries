<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCountryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'           => 'required|string',
            'code'           => 'required|string|max:2',
            'full_name'      => 'required|string',
            'iso3'           => 'required|string|max:3',
            'number'         => 'required|integer',
            'continent_code' => 'required|string|max:2',
        ];
    }
}
