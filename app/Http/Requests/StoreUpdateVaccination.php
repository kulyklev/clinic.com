<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateVaccination extends FormRequest
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
            'vaccinationName' => 'required',
            'vaccinationType' => 'required',
            'vaccinationDate' => 'required',
            'age' => 'required',
            'dose' => 'required',
            'series' => 'required',
            'nameOfTheDrug' => 'required',
            'methodOfInput' => 'required',
        ];
    }
}
