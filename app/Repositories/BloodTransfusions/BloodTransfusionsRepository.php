<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 28.06.18
 * Time: 22:03
 */

namespace App\Repositories\BloodTransfusions;

use App\Models\BloodTransfusion;

class BloodTransfusionsRepository implements IBloodTransfusionsRepository
{

    public function getAllBloodTransfusionsOfPatient($patientId)
    {
        return BloodTransfusion::where('patient_id', $patientId)->get();
    }

    public function getBloodTransfusionById($bloodTransfusionId)
    {
        return BloodTransfusion::find($bloodTransfusionId);
    }

    public function saveBloodTransfusion(array $data, $patientId)
    {
        $newBloodTransfusion = new BloodTransfusion();
        $newBloodTransfusion->patient_id = $patientId;
        $newBloodTransfusion->transfusionDate = $data['transfusionDate'];
        $newBloodTransfusion->volume = $data['volume'];
        $newBloodTransfusion->save();
    }

    public function updateBloodTransfusion(array $data, $bloodTransfusionId)
    {
        $bloodTransfusion = BloodTransfusion::find($bloodTransfusionId);
        $bloodTransfusion->transfusionDate = $data['transfusionDate'];
        $bloodTransfusion->volume = $data['volume'];
        $bloodTransfusion->save();
    }

    public function deleteBloodTransfusion($bloodTransfusionId)
    {
        $bloodTransfusion = BloodTransfusion::find($bloodTransfusionId);
        $bloodTransfusion->delete();
    }
}