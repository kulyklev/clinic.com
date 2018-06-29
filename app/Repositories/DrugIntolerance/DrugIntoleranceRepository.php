<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 29.06.18
 * Time: 16:26
 */

namespace App\Repositories\DrugIntolerance;

use App\Models\DrugIntolerance;

class DrugIntoleranceRepository implements IDrugIntoleranceRepository
{

    public function getAllDrugIntoleranceOfPatient($patientId)
    {
        return DrugIntolerance::where('patient_id', $patientId)->get();
    }

    public function getDrugIntoleranceById($drugIntoleranceId)
    {
        return DrugIntolerance::find($drugIntoleranceId);
    }

    public function saveDrugIntolerance(array $data, $patientId)
    {
        $newDrugIntolerance = new DrugIntolerance();
        $newDrugIntolerance->patient_id = $patientId;
        $newDrugIntolerance->drugName = $data['drugName'];
        $newDrugIntolerance->save();
    }

    public function updateDrugIntolerance(array $data, $drugIntoleranceId)
    {
        $drugIntolerance = DrugIntolerance::find($drugIntoleranceId);
        $drugIntolerance->drugName = $data['drugName'];
        $drugIntolerance->save();
    }

    public function deleteDrugIntolerance($drugIntoleranceId)
    {
        $drug = DrugIntolerance::find($drugIntoleranceId);
        $drug->delete();
    }
}