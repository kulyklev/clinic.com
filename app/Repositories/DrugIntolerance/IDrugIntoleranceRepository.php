<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 29.06.18
 * Time: 16:26
 */

namespace App\Repositories\DrugIntolerance;

interface IDrugIntoleranceRepository{
    public function getAllDrugIntoleranceOfPatient($patientId);

    public function getDrugIntoleranceById($drugIntoleranceId);

    public function saveDrugIntolerance(array $data, $patientId);

    public function updateDrugIntolerance(array $data, $drugIntoleranceId);

    public function deleteDrugIntolerance($drugIntoleranceId);
}