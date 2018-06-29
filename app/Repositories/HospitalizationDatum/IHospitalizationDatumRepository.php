<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 29.06.18
 * Time: 22:24
 */

namespace App\Repositories\HospitalizationDatum;


interface IHospitalizationDatumRepository{
    public function getAllHospitalizationDatumOfPatient($patientId);

    public function getHospitalizationDataById($hospitalizationDataId);

    public function saveHospitalizationData(array $data, $patientId);

    public function updateHospitalizationData(array $data, $hospitalizationDataId);

    public function deleteHospitalizationData($hospitalizationDataId);
}