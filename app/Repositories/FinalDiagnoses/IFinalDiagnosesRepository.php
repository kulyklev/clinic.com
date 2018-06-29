<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 29.06.18
 * Time: 22:03
 */

namespace App\Repositories\FinalDiagnoses;

interface IFinalDiagnosesRepository{
    public function getAllFinalDiagnosesOfPatient($patientId);

    public function getFinalDiagnosisById($finalDiagnosisId);

    public function saveFinalDiagnosis(array $data, $patientId);

    public function updateFinalDiagnosis(array $data, $finalDiagnosisId);

    public function deleteFinalDiagnosis($finalDiagnosisId);
}