<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePatients extends FormRequest
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
            'surname' => 'required',
            'patronymic' => 'required',
            'gender' => 'required',
            'bdate' => 'required',
            'homePhoneNumber' => 'required',
            'workPhoneNumber' => 'required',
            'address' => 'required',
            'placeOfWorkAndPosition' => 'required',
            'dispensaryGroup' => 'required|boolean'
        ];
    }
}
