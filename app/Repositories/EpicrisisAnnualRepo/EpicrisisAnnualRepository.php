<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 29.06.18
 * Time: 16:49
 */

namespace App\Repositories\EpicrisisAnnualRepo;

use App\Models\EpicrisisAnnual;

class EpicrisisAnnualRepository implements IEpicrisisAnnualRepository
{

    public function getAllEpicrisisAnnualOfPatient($patientId)
    {
        return EpicrisisAnnual::where('patient_id', $patientId)->get();
    }

    public function getEpicrisisAnnualById($epicrisisAnnualId)
    {
        return EpicrisisAnnual::find($epicrisisAnnualId);
    }

    public function saveEpicrisisAnnual(array $data, $patientId)
    {
        $newAnnualEpicrisis = new EpicrisisAnnual();
        $newAnnualEpicrisis->patient_id = $patientId;
        $newAnnualEpicrisis->epicrisisDate = $data['epicrisisDate'];
        $newAnnualEpicrisis->causeOfObservation = $data['causeOfObservation'];
        $newAnnualEpicrisis->mainDiagnosis = $data['mainDiagnosis'];
        $newAnnualEpicrisis->concomitantDiagnoses = $data['concomitantDiagnoses'];
        $newAnnualEpicrisis->numberOfAggravations = $data['numberOfAggravations'];
        $newAnnualEpicrisis->carryingOutTreatment = $data['carryingOutTreatment'];
        $newAnnualEpicrisis->disabilityGroup = $data['disabilityGroup'];
        $newAnnualEpicrisis->sanatoriumAndSpaTreatment = $data['sanatoriumAndSpaTreatment'];
        $newAnnualEpicrisis->save();
    }

    public function updateEpicrisisAnnual(array $data, $epicrisisAnnualId)
    {
        $annualEpicrisis = EpicrisisAnnual::find($epicrisisAnnualId);
        $annualEpicrisis->epicrisisDate = $data['epicrisisDate'];
        $annualEpicrisis->causeOfObservation = $data['causeOfObservation'];
        $annualEpicrisis->mainDiagnosis = $data['mainDiagnosis'];
        $annualEpicrisis->concomitantDiagnoses = $data['concomitantDiagnoses'];
        $annualEpicrisis->numberOfAggravations = $data['numberOfAggravations'];
        $annualEpicrisis->carryingOutTreatment = $data['carryingOutTreatment'];
        $annualEpicrisis->disabilityGroup = $data['disabilityGroup'];
        $annualEpicrisis->sanatoriumAndSpaTreatment = $data['sanatoriumAndSpaTreatment'];
        $annualEpicrisis->save();
    }

    public function deleteEpicrisisAnnual($epicrisisAnnualId)
    {
        $annualEpicrisis = EpicrisisAnnual::find($epicrisisAnnualId);
        $annualEpicrisis->delete();
    }
}