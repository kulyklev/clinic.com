<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateEpicrisisAnnual extends FormRequest
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
            'epicrisisDate' => 'required',
            'causeOfObservation' => 'required',
            'mainDiagnosis' => 'required',
            'concomitantDiagnoses' => 'required',
            'numberOfAggravations' => 'required',
            'carryingOutTreatment' => 'required',
            'disabilityGroup' => 'required',
            'sanatoriumAndSpaTreatment' => 'required',
        ];
    }
}
