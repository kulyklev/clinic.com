<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 29.06.18
 * Time: 22:02
 */

namespace App\Repositories\FinalDiagnoses;

use App\Models\FinalDiagnosis;

class FinalDiagnosesRepository implements IFinalDiagnosesRepository
{

    public function getAllFinalDiagnosesOfPatient($patientId)
    {
        return FinalDiagnosis::where('patient_id', $patientId)->get();
    }

    public function getFinalDiagnosisById($finalDiagnosisId)
    {
        return FinalDiagnosis::find($finalDiagnosisId);
    }

    public function saveFinalDiagnosis(array $data, $patientId)
    {
        $newFinalDiagnosis = new FinalDiagnosis();
        $newFinalDiagnosis->patient_id = $patientId;
        $newFinalDiagnosis->dateOfTreatment = $data['dateOfTreatment'];
        $newFinalDiagnosis->finalDiagnosis = $data['finalDiagnosis'];
        $newFinalDiagnosis->firstTimeDiagnosed = $data['firstTimeDiagnosed'];
        $newFinalDiagnosis->firstTimeDiagnosedOnProphylaxis = $data['firstTimeDiagnosedOnProphylaxis'];
        $newFinalDiagnosis->doctor = $data['doctor'];
        $newFinalDiagnosis->save();
    }

    public function updateFinalDiagnosis(array $data, $finalDiagnosisId)
    {
        $finalDiagnosis = FinalDiagnosis::find($finalDiagnosisId);
        $finalDiagnosis->dateOfTreatment = $data['dateOfTreatment'];
        $finalDiagnosis->finalDiagnosis = $data['finalDiagnosis'];
        $finalDiagnosis->firstTimeDiagnosed = $data['firstTimeDiagnosed'];
        $finalDiagnosis->firstTimeDiagnosedOnProphylaxis = $data['firstTimeDiagnosedOnProphylaxis'];
        $finalDiagnosis->doctor = $data['doctor'];
        $finalDiagnosis->save();
    }

    public function deleteFinalDiagnosis($finalDiagnosisId)
    {
        $finalDiagnosis = FinalDiagnosis::find($finalDiagnosisId);
        $finalDiagnosis->delete();
    }
}