<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 29.06.18
 * Time: 22:24
 */

namespace App\Repositories\HospitalizationDatum;

use App\Models\HospitalizationData;

class HospitalizationDatumRepository implements IHospitalizationDatumRepository
{

    public function getAllHospitalizationDatumOfPatient($patientId)
    {
        return HospitalizationData::where('patient_id', $patientId)->get();
    }

    public function getHospitalizationDataById($hospitalizationDataId)
    {
        return HospitalizationData::find($hospitalizationDataId);
    }

    public function saveHospitalizationData(array $data, $patientId)
    {
        $newHospitalizationData = new HospitalizationData();
        $newHospitalizationData->patient_id = $patientId;
        $newHospitalizationData->hospitalizationDate = $data['hospitalizationDate'];
        $newHospitalizationData->medicalFacilityName = $data['medicalFacilityName'];
        $newHospitalizationData->departmentName = $data['departmentName'];
        $newHospitalizationData->finalDiagnosis = $data['finalDiagnosis'];
        $newHospitalizationData->save();
    }

    public function updateHospitalizationData(array $data, $hospitalizationDataId)
    {
        $hospitalizationData = HospitalizationData::find($hospitalizationDataId);
        $hospitalizationData->hospitalizationDate = $data['hospitalizationDate'];
        $hospitalizationData->medicalFacilityName = $data['medicalFacilityName'];
        $hospitalizationData->departmentName = $data['departmentName'];
        $hospitalizationData->finalDiagnosis = $data['finalDiagnosis'];
        $hospitalizationData->save();
    }

    public function deleteHospitalizationData($hospitalizationDataId)
    {
        $hospitalizationData = HospitalizationData::find($hospitalizationDataId);
        $hospitalizationData->delete();
    }
}